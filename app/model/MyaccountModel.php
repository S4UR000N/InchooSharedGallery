<?php

// namespace
namespace app\model;

class MyaccountModel extends UserModel
{
    public function myaccount(\app\controller\UserController $parentObject)
    {
        //on GET request execute if | on POST request excecute else
        // Regular Render Branch
        if (!\app\extra\Request::requestMethod())
        {
            $parentObject->render_view("in:myaccount", $parentObject->viewData);
        }
        else
        {
            if(array_key_exists('remove_account', $_POST))
            {
                $userRepo = new \app\repository\UserRepository();
                $result = $userRepo->removeAccount($_SESSION['user_id']);
                if($result)
                {
                    session_destroy(); header("location: http://shared-gallery.loc/");
                }
                else
                {
                    $parentObject->viewData['AccountRemovalFailed'] = true;
                    $parentObject->render_view("in:myaccount", $parentObject->viewData);
                }
            }
            else
            {
                // Error Possibilities
                $Error = array(
                    "1" => "All Fields Required!",
                    "2" => "Invalid Passwords!"
                );

                // Error Controller
                $err_data = array();

                // Error Checking
                foreach($_POST as $err)
                {
                    if(!in_array("1", $err_data) && empty($err))
                    {
                        array_push($err_data, "1");
                    }
                }
                if(!empty($_POST['user_change_password']) && $_POST['user_change_password'] !== $_POST['user_confirm_changed_password'])
                {
                    array_push($err_data, "2");
                }

                // Store Errors to View Data
                foreach($err_data as $err)
                {
                    $parentObject->viewData['Error'][] = $Error[$err];
                }

                // if Form not fully correct pass Error Data
                if(!empty($err_data))
                {
                    $parentObject->render_view("in:myaccount", $parentObject->viewData);
                }
                else
                {
                    $userRepo = new \app\repository\UserRepository();
                    $result = $userRepo->changePassword($_SESSION['user_id'], $_POST['user_change_password']);
                    if($result) { $parentObject->viewData['Valid'] = true; }
                    else { $parentObject->viewData['Valid'] = false; }
                    $parentObject->render_view("in:myaccount", $parentObject->viewData);
                }
            }
            $parentObject->render_view("in:myaccount", $parentObject->viewData);
        }
    }
}
    