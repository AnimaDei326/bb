<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 29.01.2019
 * Time: 14:03
 */

namespace components;


class Request
{
    public $controller = 'index';
    public $action = 'index';
    public $nameSpaceController = '\controllers';
    public $id = 0;

    public function init()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $path = explode('/', $uri);

        if(!empty($path[1])){
            $this->controller = $path[1];
        }

        if(count($path) == 3){
            if(!empty($path[2])){
                $this->action = $path[2];
            }
            if($newPath = strpbrk($path[count($path)-1], '?')){
                $this->action = str_replace($newPath, '', $path[count($path)-1]);
            }
        }

//        if(count($path) == 4){
//            $this->controller = $path[1];
//            if(!empty($path[3])){
//                $this->action = $path[3];
//            }
//            if($newPath = strpbrk($path[count($path)-1], '?')){
//                $this->action = str_replace($newPath, '', $path[count($path)-1]);
//            }
//        }

        if(count($path) == 5){
            if(!empty($path[2])){
                $this->action = $path[2];
            }
            if($newPath = strpbrk($path[count($path)-1], '?')){
                $this->action = str_replace($newPath, '', $path[count($path)-1]);
            }
            $this->id = $path[3];
        }


        $this->callController($this->id);
    }

    public function getParam($param){

        return $_REQUEST[$param];

    }

    public function generateName($length){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length)
        {
            $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    }

    public function uploadFile($name){
        $file = $_FILES[$name];
        if(!$file['size']){
            return false;
        }
        $uploadDirectory = './images/';
        $newName = $this->generateName(20);
        $extension = strtolower(substr(strrchr($file['name'], '.'), 1));
        $target = $uploadDirectory . '/' . $newName . '.' . $extension;
        move_uploaded_file($file['tmp_name'], $target);
        return $newName . ".". $extension;
    }

    public function getAllParams(){
        $arResult = [];
        foreach ($_REQUEST as $key => $value){
            $arResult[$key] = $value;
        }
        return $arResult;
    }

    protected function callController($id=null)
    {
        $classController = $this->nameSpaceController . '\\' . ucwords($this->controller) . 'Controller';
        $action = 'action' . ucwords($this->action);

        if(class_exists($classController)){
            $controllerInstance = new $classController;

            if(method_exists($classController, $action)){
                call_user_func_array([$controllerInstance, $action], [$id]);


            }else{
                throw  new \Exception('Error. Not exists calling method');
            }
            //unset($controllerInstance); //для подключения footer'a, он вызывается при уничтожении экземпляра
        }
    }


}