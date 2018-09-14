<?php
/**
 * Created by PhpStorm.
 * User: Gnomail
 * Date: 2018/9/13
 * Time: 14:24
 */

function __autoload($name)
{
    $file = ROOT_PATH.'/'.$name.'.php';
    if(file_exists($file))
    {
        require_once($file);
        if(class_exists($name,false))
        {
            return true;
        }
        return false;
    }
    return false;
}