<?php
/**
 * Created by PhpStorm.
 * User: Gnomail
 * Date: 2018/9/13
 * Time: 14:05
 */

namespace Core;

class BaseController{


    protected function getRequest($key)
    {
        return Request::getRequest($key);
    }

    protected function display($tpl)
    {
        View::display($tpl);
    }
}