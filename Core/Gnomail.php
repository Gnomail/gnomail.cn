<?php
/**
 * Created by PhpStorm.
 * User: brane
 * Date: 2018/9/10
 * Time: 10:50
 */

class Gnomail{


    private function router()
    {
        require(ROOT_PATH.'/Core/Route.class.php');

        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);

        $pathInfo      = '/'.trim(explode('?',$_SERVER['REQUEST_URI'])[0],'/');

        $match         = Route::match($pathInfo,$requestMethod);
        unset($match['param'][0]);
        $router        = $match['router'];

        $param         = $match['param'];

        $param         = array_values($param);
        $this->dispatcher($router,$param);
    }

    private function dispatcher($router,$param=array())
    {
        if(empty($router))
        {
            Route::notFound();
        }
        else
        if(is_object($router))
        {
            $router();
        }
        else
        {
            $routerArray = explode('@',$router);

            $controller  = ucfirst(AorB($routerArray[0],Route::DEFAULT_CONTROLLER)).'Controller';
            $action      = ucfirst(AorB($routerArray[1],Route::DEFAULT_ACTION)).'Action';

            $controllerFile = 'App/Controller/'.$controller.'.php';

            try{
                if(file_exists($controllerFile))
                {
                    include_once($controllerFile);
                    if(class_exists($controller,false))
                    {
                        $object = new $controller();
                        if(method_exists($object,$action))
                        {
                            $object->$action($param);
                        }
                        else
                        {
                            throw new Exception('ACTION NOT EXISTS');
                        }
                    }
                    else
                    {
                        throw new Exception('CONTROLLER NOT EXISTS');
                    }
                }
                else
                {
                    throw new Exception('PATH NOT EXISTS');
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }


        }
    }

    public function run()
    {
        include_once(ROOT_PATH.'/Library/Function.php');
        $this->router();
    }




}