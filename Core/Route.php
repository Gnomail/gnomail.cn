<?php
/**
 * Created by PhpStorm.
 * User: brane
 * Date: 2018/9/10
 * Time: 11:03
 */

require(ROOT_PATH.'/App/router.php');

class Route{

    CONST DEFAULT_CONTROLLER = 'Index';
    CONST DEFAULT_ACTION     = 'Index';

    CONST PATTERN            = '/\{(\w+)\}/';
    CONST PARAM_PATTERN      = '/(?:\{)(\w+)(?:\})/';


    public static $routerList = array(
        'get'  => [],
        'post' => []
    );

    public static $paramList = array(
        'get'  => [],
        'post' => []
    );


    public static function get($path,$action)
    {
        preg_match_all(self::PARAM_PATTERN,$path, $paramName);

        $path = str_replace('/','\/',preg_replace(self::PATTERN,'(\w+)',$path));
        $path = '/^'.$path.'$/';
        self::$routerList['get'][$path] = $action;
        if(!empty($paramName[1]))
        {
            self::$paramList['get'][$path]  = $paramName[1];
        }
    }

    public static function post($path,$action)
    {
        self::$routerList['post'][$path] = $action;
    }

    public static function match($pathInfo,$method='get')
    {
        $pathArray = array_keys(self::$routerList[$method]);
        $router    = '';
        foreach($pathArray as $path)
        {
            if(preg_match($path,$pathInfo,$paramValue))
            {
                $router = self::$routerList[$method][$path];
                break;
            }
        }
        if(!empty($paramValue))
        {
            unset($paramValue[0]);
        }
        $paramValue = array_values($paramValue);

        $param = array();

        if(!empty(self::$paramList[$method][$path]))
        {
            foreach(self::$paramList[$method][$path] as $k => $v)
            {
                $param[$v] = $paramValue[$k];
            }
        }

        return array(
          'router' => $router,
          'param'  => $param
        );
    }


    public static function notFound()
    {
        echo '404 NOT FOUND';
    }
}