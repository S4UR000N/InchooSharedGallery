<?php

// namespace
namespace app\model;

class UserModel
{
    // properties
    private $user_id;
    private $user_name;
    private $user_email;
    private $user_password;

    // constructor
    public function __construct()
    {
        if(\app\super\Session::isSet()) {
            $session = new \app\super\Session();
            $this->user_id = $session->get('user_id');

            $userRepo = new \app\repository\UserRepository();
            $userData = $userRepo->selectOneById($this->user_id);

            if(!empty($userData))
            {
                $userData = $userData[0];
            }

            $this->user_name = $userData['user_name'];
            $this->user_email = $userData['user_email'];
            $this->user_password = $userData['user_password'];
        }
    }
    //id -> getId
    public function getUserId()
    {
        return $this->user_id;
    }


    //name -> setName, getName
    public function setUserName($name)
    {
        $this->user_name = $name;
    }
    public function getUserName()
    {
        return $this->user_name;
    }


    //email -> setEmail, getEmail
    public function setUserEmail($email)
    {
        $this->user_email = $email;
    }
    public function getUserEmail()
    {
        return $this->user_email;
    }


    //password -> setPassword, getPassword
    public function setUserPassword($password)
    {
        $this->user_password = $password;
    }
    public function getUserPassword()
    {
        return $this->user_password;
    }
}