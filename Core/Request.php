<?php
/**
 * Created by PhpStorm.
 * User: Gnomail
 * Date: 2018/9/12
 * Time: 10:21
 */

namespace Core;

class Request{

    private static $get  = array();
    private static $post = array();
    private static $requestMethod = array(
        'get',
        'post'
    );

    public static function setParam($method,$param)
    {
        if(in_array($method,self::$requestMethod))
        {
            self::$$method = array_merge(self::$$method,$param);
        }
    }

    public static function getRequest($key)
    {
        if(isset(self::$get[$key]))
        {
            return self::$get[$key];
        }
        else
        if(isset(self::$post[$key]))
        {
            return self::$post[$key];
        }
        else
        {
            return null;
        }

    }

    public static function haha()
    {
        print_r(self::$get);
    }


}