<?php
/**
 * Created by PhpStorm.
 * User: Gnomail
 * Date: 2018/9/14
 * Time: 18:06
 */

namespace Core;

class MyConfig{

    public static $_config = array();


    public static function initConfig()
    {
        $configPath = ROOT_PATH.'/Config';

        $configList = scandir($configPath);

        $ignoreArr  = array(
            '.',
            '..',
        );


        foreach($configList as $cfg)
        {
            if(!in_array($cfg,$ignoreArr))
            {
                self::$_config = array_merge(self::$_config,include($configPath.'/'.$cfg));
            }
        }
    }

    public static function getConfig($key)
    {
        return isset(self::$_config[$key]) ? self::$_config[$key] : null;
    }

}