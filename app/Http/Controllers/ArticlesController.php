<?php

namespace Corp\Http\Controllers;

use Corp\Category;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\CommetnsRepository;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\SlidersRepository;
use Illuminate\Http\Request;
use Arr;

class ArticlesController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep,ArticlesRepository $a_rep, CommetnsRepository$c_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));
        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
        $this->c_rep = $c_rep;
        $this->bar = 'right';
        $this->template= env('THEME').'.articles';
    }

    public function index($cat_alias = false)
    {
        $this->title = 'Blog';
        $this->keywords = 'String';
        $this->meta_desc = 'String';
        $articles = $this->getArticles($cat_alias);
        $content = view(env('THEME').'.articles_content')->with('articles', $articles)->render();
        $this->vars = Arr::add($this->vars,'content',$content);
        $comments = $this->getComments(config('settings.recent_comments'));
        $portfolios = $this->getPortfolios(config('settings.recent_portfolios'));
        $this->contentRightBar = view(env('THEME').'.articlesBar')->with(['comments'=>$comments,'portfolios'=>$portfolios]);
        return $this->renderOutput();
    }

    public function getComments($take){
        $comments = $this->c_rep->get(['text','name','email','site','article_id','user_id'],$take) ;
        if($comments){
            $comments->load('article','user');
        }
        return $comments;
    }

    public function getPortfolios($take){
        $portfolios = $this->p_rep->get(['title','text','alias','customer','img','filter_alias'],$take);
        return $portfolios;
    }

    public function getArticles($alias = false){

        $where = false;
        if($alias){
            $id = Category::select('id')->where('alias', $alias)->first()->id;
            $where = ['category_id', $id];
        }
        $articles = $this->a_rep->get(['id','title','alias','created_at','img','desc', 'user_id', 'category_id','keywords','meta_desc'], false, true,$where);
        if($articles){
            $articles->load('user','category','comments');
        }
        return $articles;

    }

    public function show($alias = false){
        $article = $this->a_rep->one($alias, ['comments'=>true]);
        if($article){
            $article->img = json_decode($article->img);
        }
        if(isset($article->id)){
            $this->title = $article->title;
            $this->keywords = $article->keywords;
            $this->meta_desc = $article->meta_desc;
        }
        /*$this->title = $article->title;
        $this->keywords = $article->keywords;
        $this->meta_desc = $article->meta_desc;*/
        $content = view(env('THEME').'.article_content')->with('article', $article)->render();
        $this->vars = Arr::add($this->vars,'content', $content);
        $comments = $this->getComments(config('settings.recent_comments'));
        $portfolios = $this->getPortfolios(config('settings.recent_portfolios'));
        $this->contentRightBar = view(env('THEME').'.articlesBar')->with(['comments'=>$comments,'portfolios'=>$portfolios]);
        return $this->renderOutput();
    }
}
