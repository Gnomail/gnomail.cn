<?php
/**
 * Created by PhpStorm.
 * User: Gnomail
 * Date: 2018/9/13
 * Time: 17:16
 */

namespace Core;

class view{

    const VIEW_PATH = ROOT_PATH.'/App/View';
    const VIEW_EXT  = '.html';

    public static function display($tpl)
    {
        $tplArr  = explode('.',$tpl);
        $tplPath = implode('/',array_map('ucfirst',$tplArr));
        $tplName = self::VIEW_PATH.'/'.$tplPath.self::VIEW_EXT;

        if(file_exists($tplName))
        {
            echo file_get_contents($tplName);
        }
        else
        {
            echo 'error';
        }

    }

}