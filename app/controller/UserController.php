<?php

// namespace
namespace app\controller;

class UserController extends BaseController
{
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
        echo "logout";
    }
}
