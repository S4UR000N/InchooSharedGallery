<?php

// namespace
namespace app\controller;

class HomeController extends BaseController
{
    public function out()
    {
        return $this->render_view('out:home', 1);
    }

    public function in()
    {

    }
}
