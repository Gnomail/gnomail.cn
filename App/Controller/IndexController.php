<?php
/**
 * Created by PhpStorm.
 * User: brane
 * Date: 2018/9/7
 * Time: 14:29
 */

class IndexController{

    public function IndexAction()
    {

        $arr = array(
            'news',
            '2'
        );

        function haha($a,$b)
        {
            echo $a;
            echo $b;
        }

        $a='';
        foreach($arr as $v)
        {
            $a .= $v.',';
        }
        $a = rtrim($a,',');

        haha($a);
    }




}