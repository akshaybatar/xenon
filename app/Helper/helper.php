<?php
//namespace App\Helper;

function redirect($url)
{
    header("Location: $url");
    exit();
}

function view($file_path)
{

    $path =  str_replace('\\', DIRECTORY_SEPARATOR, $file_path);

    $path =  str_replace('.', DIRECTORY_SEPARATOR, $path);

    $file = APP_ROOT . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $path . '.php';

    if (file_exists($file)) {

        return require_once($file);
    } else {

        throw new Exception('The File Path is Not found'. $file);
    }
}

function extend($file_path){

   include(APP_ROOT.'/view/'.$file_path);

}
