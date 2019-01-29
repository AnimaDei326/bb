<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 29.01.2019
 * Time: 14:06
 */

namespace components;

use Exception;


abstract class Controller
{
    static $title;

    public $params = [];

    public function render($view, $params = [])
    {

        if(!empty($params) && is_array($params)){
            $this->params = $params;
        }

        $fileView = App::BASE_DIR . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR .  $view . '.php';

        if( file_exists($fileView)){


            ob_start();
            require_once $fileView;
            $viewHtml = ob_get_clean();

            return $viewHtml;


        }else{
            throw new Exception('Шаблон представления не найден'); //сделать 404.php
        }
    }


}