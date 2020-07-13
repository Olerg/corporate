<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\SlidersRepository;
use Illuminate\Http\Request;
use Arr;

class ArticlesController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep,ArticlesRepository $a_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));
        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
        $this->bar = 'right';
        $this->template= env('THEME').'.articles';
    }

    public function index()
    {
        $articles = $this->getArticles();
        $content = view(env('THEME').'.articles_content')->with('articles', $articles)->render();
        $this->vars = Arr::add($this->vars,'content',$content);
        return $this->renderOutput();
    }

    public function getArticles($alias = false){

        $articles = $this->a_rep->get(['id','title','alias','created_at','img','desc', 'user_id', 'category_id'], false, true);
        if($articles){
//            $articles->load('user','category','comments');
        }
        return $articles;

    }
}