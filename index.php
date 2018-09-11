<?php
/**
 * Created by PhpStorm.
 * User: brane
 * Date: 2018/9/7
 * Time: 14:10
 */

define('ROOT_PATH', dirname(__FILE__));

require(ROOT_PATH.'/Core/Gnomail.php');


(new Gnomail())->run();

