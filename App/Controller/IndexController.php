<?php
/**
 * Created by PhpStorm.
 * User: brane
 * Date: 2018/9/7
 * Time: 14:29
 */

use Core\BaseController;


class IndexController extends BaseController {

    public function IndexAction()
    {
        $db = config('db');


        $this->display('index.index');
    }




}