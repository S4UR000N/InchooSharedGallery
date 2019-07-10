<?php

// namespace
namespace app\controller;

class UserController extends BaseController
{
    // View Data
    public $viewData = array();
    protected $get;
    protected $post;
    protected $files;
    protected $server;
    protected $session;

    public function __construct()
    {
        $this->get = new \app\super\Get();
        $this->post = new \app\super\Post();
        $this->files = new \app\super\Files();
        $this->server = new \app\super\Server();
        $this->session = new \app\super\Session();
    }


    public function registration()
    {
        $registrationModel = new \app\model\RegistrationModel();
        $registrationModel->registration($this);
    }

    public function login()
    {
        $loginModel = new \app\model\LoginModel();
        $loginModel->login($this);
    }

    public function logout()
    {
        new \app\model\LogoutModel();
    }

    public function management() {
        $managementModel = new \app\model\ManagementModel();
        $managementModel->management($this);
    }
    public function myaccount() {
        $myaccountModel = new \app\model\MyaccountModel();
        $myaccountModel->myaccount($this);
    }
}
