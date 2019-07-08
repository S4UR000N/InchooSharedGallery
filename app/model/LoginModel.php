<?php

// namespace
namespace app\model;

class LoginModel extends UserModel
{
    public function login(\app\controller\UserController $parentObject)
    {
        if (!\app\extra\Request::requestMethod()) {
            $parentObject->render_view("in:login");
        }
        else
        {
            /// store $post & $session
            $post = \app\extra\Request::post();
            $session = \app\extra\Request::session();
            
            // Final View Data
            $viewData = array(
                'Valid' => array(),
                'Error' => array()
            );

            // Error Possibilities
            $Error = array(
                "1" => "All Fields Required!",
                "2" => "Invalid Email!",
                "3" => "Wrong Email or Password!"
            );

            // Error Controller
            $err_data = array();

            // Error Checking
            foreach($post as $err)
            {
                if(!in_array("1", $err_data) && empty($err))
                {
                    array_push($err_data, "1");
                }
            }

            if(!empty($post['user_email']) && strpos($post['user_email'], '@') === false)
            {
                array_push($err_data, "2");
            }
            else
            {
                if(!empty($post['user_email']))
                {
                    $viewData['Valid']['user_email'] = $post['user_email'];
                }
            }

            if(!empty($viewData['Valid']) && !empty($post['user_password']))
            {
                // open DB connection
                $userRepo = new \app\repository\UserRepository();

                // check if user exists
                $user_email = $post['user_email'];
                $user_password = md5($post['user_password']);
                $user_check = $userRepo->selectOneByEmailAndPassword($user_email, $user_password)->fetch();

                if(!$user_check)
                {
                    array_push($err_data, "3");
                }
            }

            // Store Errors to View Data
            foreach($err_data as $err)
            {
                array_push($viewData['Error'], $Error[$err]);
            }

            // if Form not fully correct pass Valid and Error Data
            if(!empty($err_data))
            {
                $this->render_view("in:login", $viewData);
            }
            // else Set Session and Redirect
            else
            {
                // open DB connection
                $userRepo = new \app\repository\UserRepository();

                // get user id
                $user_email = $post['user_email'];
                $user_password = md5($post['user_password']);
                $user_check = $userRepo->selectOneByEmailAndPassword($user_email, $user_password)->fetch(\PDO::FETCH_ASSOC);

                // Set Session
                $session['user_id'] = $user_check['user_id'];
                $session['user_name'] = $user_check['user_name'];

                // Redirect
                header("location: location: http://shared-gallery.loc/");
            }
        }
    }
}