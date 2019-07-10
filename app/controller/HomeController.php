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
        $this->render_view("in:home");
    }
}
