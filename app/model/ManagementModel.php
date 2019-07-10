<?php

// namespace
namespace app\model;

class ManagementModel extends UserModel
{
    public function management(\app\controller\UserController $parentObject)
    {
        //on GET request execute if | on POST request excecute else
        // Regular Render Branch
        if(!\app\extra\Request::requestMethod())
        {
            $fileRepo = new \app\repository\FileRepository();
            $parentObject->viewData['viewFiles'] = $fileRepo->selectUserFilesUnionOtherFiles();
            $parentObject->render_view("in:management", $parentObject->viewData);
        }
        // Upload File Branch
        if(!empty($_FILES)) {
            $fail = false;
            $fileRepo = new \app\repository\FileRepository();
            $invalid = $fileRepo->validateFile($parentObject->viewData);

            // if true then Upload and Save file or Return fail
            if(!$invalid) {
                // Target dir/file/extension
                $target_dir = "uploads/" . $_SESSION['user_id'];
                $target_file = $target_dir . $_FILES['img_up']['name'];

                // Store File
                if(move_uploaded_file($_FILES['img_up']['tmp_name'], $target_file)) {
                    $file = new \app\model\FileModel();
                    $file->setUserId($_SESSION['user_id']);
                    $file->setFileName($_FILES['img_up']['name']);
                    $parentObject->viewData['uploaded'] = $fileRepo->saveFile($file);

                    $parentObject->viewData['viewFiles'] = $fileRepo->selectUserFilesUnionOtherFiles();
                    $parentObject->render_view("in:management", $parentObject->viewData);
                }
                else {
                    // Return View With Fail Message
                    array_push($parentObject->viewData, "File Upload Failed!");
                    $parentObject->viewData['viewFiles'] = $fileRepo->selectUserFilesUnionOtherFiles();
                    $parentObject->render_view("in:management", $parentObject->viewData);
                }
            }
            // else Send Error Data to View
            else {
                $parentObject->viewData['invalid'] = $invalid;
                $parentObject->viewData['viewFiles'] = $fileRepo->selectUserFilesUnionOtherFiles();
                $parentObject->render_view("in:management", $parentObject->viewData);
            }
        }
        // Delete File Branch
        else if(array_key_exists('file_id', $_POST)) {
            $parentObject->viewData['deleted'] = false;
            $fileRepo = new \app\repository\FileRepository();
            $isDeleted = $fileRepo->deleteFile($_POST['user_id'], $_POST['file_id']);
            if($isDeleted) { $unlink = unlink("uploads/" . $_SESSION['user_id'] . $_POST['file_name']); }
            if($isDeleted > 0 && $unlink) { $this->viewData['deleted'] = true; }

            $parentObject->viewData['viewFiles'] = $fileRepo->selectUserFilesUnionOtherFiles();
            $parentObject->render_view("in:management", $parentObject->viewData);
        }
    }
}