<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\SlidersRepository;
use Illuminate\Http\Request;
use Config;
use Corp\Repositories\PortfoliosRepository;
use Arr;

class IndexController extends SiteController
{
    public function __construct(SlidersRepository $s_rep,PortfoliosRepository $p_rep)
    {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));
        $this->s_rep = $s_rep;
        $this->p_rep = $p_rep;
        $this->bar = 'right';
        $this->template= env('THEME').'.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = $this->getPortfolio();
        $content = view(env('THEME').'.content')->with('portfolios',$portfolios)->render();
        $this->vars = Arr::add($this->vars,'content',$content);

        $sliderItems = $this->getSliders();

        $sliders = view(env('THEME').'.slider')->with('sliders', $sliderItems)->render();
        $this->vars = Arr::add($this->vars,'sliders',$sliders);

        return $this->renderOutput();
    }

    protected function getPortfolio(){
        $portfolio = $this->p_rep->get('*',Config::get('settings.home_port_count'));
        return $portfolio;
    }

    public function getSliders(){
        $sliders = $this->s_rep->get();
        if($sliders->isEmpty()){
            return false;
        }
        $sliders->transform(function ($item, $key){
            $item->img = Config::get('settings.slider_path').'/'.$item->img;
            return $item;
        });
        return $sliders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
