<?php
/**
 * Created by PhpStorm.
 * User: Gnomail
 * Date: 2018/9/14
 * Time: 17:33
 */

use Core\View;
use Core\MyConfig;

function view($tpl)
{
    View::display($tpl);
}

function config($key)
{
    return MyConfig::getConfig($key);
}