<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 16.04.2019
 * Time: 0:38
 */

namespace controllers;

use components\Controller;
use models\Admin;
use components\App;

class IncludeController extends Controller
{

   static $filename = '/views/admin/include.php';


    public function actionEdit()
    {
        if( Admin::helloUser() ){

            $app = App::$app;

            $params = $app->request->getAllParams();

            $data=$params['data'];

            file_put_contents($_SERVER['DOCUMENT_ROOT'] . self::$filename, $data );

            header("Location: /admin/include");

        }else{
            header("Location: /user/check");
        }
    }


}