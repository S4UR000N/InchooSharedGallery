<?php

// namespace
namespace app\controller;

class HomeController extends BaseController
{
    public function out()
    {
        $this->render_view("out:home");
    }

    public function in()
    {
        echo "you are loged in";
    }
}
