<?php
/**
 * Created by PhpStorm.
 * User: brane
 * Date: 2018/9/7
 * Time: 14:13
 */


Route::get('/article/{type}/{id}', 'article@detail');

Route::get('/','Index@index');
Route::get('/index','Index@index');
Route::get('/index/index','Index@index');
Route::get('/game/tetris','game@tetris');

Route::get('/404', function(){
    view('404');
});



Route::get('/phpinfo', function(){
    phpinfo();
});