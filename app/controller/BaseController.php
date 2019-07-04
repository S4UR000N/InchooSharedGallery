<?php

// namespace
namespace app\controller;

abstract class BaseController
{

/**
 * @param int $int
 * @return string
 *
 * string:
 * go back $int directories from current directory
 */
public function dir_back(int $int)
{
    $path = "";

    //get directories
    $dirs = explode("\\", __DIR__);

    // remove (i) directories
    for($i = 0; $i < $int; $i++)
    {
        array_pop($dirs);
    }

    // build path
    for($i = 0; $i < count($dirs); $i++)
    {
        if($path === "")
        {
            $path .= $dirs[$i];
        }
        else
        {
            $path .= "/" . $dirs[$i];
        }
    }

    // return path
    return $path;
}

//render View, Parameter: 1 => Folder:File, 2 => num of dir lvls to reach "src", 3 => Pass any Data to View
/**
 * @param string $view Folder:File
 * @param int $int dir up to reach app folder
 * @param array $viewData
 * @return mixed
 *
 * mixed: require __DIR_/app/view/Folder(optional)/File.php => arg1 (Folder:File)
 */
public function render_view(string $view, int $int = 0, $viewData = array())
{
    //get base path
    if($int)
    {
        $path = $this->dir_back($int);
    }

    //set full path
    $path .= "/view";
    $render = explode(":", $view);
    foreach($render as $bind)
    {
        $path .=  "/" . $bind;
    }

    $path .= ".php";

    //render view
    return require_once $path;
    }
}