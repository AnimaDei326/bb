<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 28.04.2019
 * Time: 3:31
 */

namespace controllers;


use components\Controller;
use models\Admin;
use components\App;
use models\About;

class AboutController extends Controller
{
    public static $type = [
        'text' => 1,
        'photo' => 2,
        'partner' => 3,
        'desc' => 4,
    ];
    public function actionEdit()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $params = $app->request->getAllParams();

            $res = false;

            if($params['type'] == 'text'){
                $items = [];
                foreach ($params as $key=>$value){
                    if( $itemId = strstr($key, '_item_name', true)){
                        $items[$itemId]['name'] = $value;
                    }
                    if( $itemId = strstr($key, '_item_sort', true)){
                        $items[$itemId]['sort'] = $value;
                        $items[$itemId]['active'] = 'N';
                    }
                    if( $itemId = strstr($key, '_item_active', true)){
                        $items[$itemId]['active'] = 'Y';
                    }
                }

                foreach ($items as $id => $itemArr){
                    $res = About::update($id, $itemArr['sort'], $itemArr['active'], $itemArr['name']);
                    if(!$res) break;
                }

                $newItems = [];
                foreach ($params as $key=>$value){
                    if( $itemId = strstr($key, '_item_new_name', true)){
                        $newItems[$itemId]['name'] = $value;
                    }
                    if( $itemId = strstr($key, '_item_new_sort', true)){
                        $newItems[$itemId]['sort'] = $value;
                        $newItems[$itemId]['active'] = 'N';
                    }
                    if( $itemId = strstr($key, '_item_new_active', true)){
                        $newItems[$itemId]['active'] = 'Y';
                    }
                }

                foreach ($newItems as $id => $itemArr){
                    if($itemArr['name']){
                        $res = About::add(self::$type[$params['type']], $itemArr['sort'], $itemArr['active'], $itemArr['name']);
                        if(!$res) break;
                    }
                }

            }elseif($params['type'] == 'desc'){
                $res = About::update($params['id'], $params['sort'], 'Y', $params['name']);
            }

            if($res){
                header("Location: /admin/about/".$params['type']);
            }else{
                echo $this->render('/admin/error', [
                    'error' => $res,
                ]);
            }

        }else{
            header("Location: /user/check");
        }
    }

    public function actionDelete()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');

            $result = About::delete($id);
            if($result){
                echo 'true';
            }else{
                echo $result;
            }

        }else{
            header("Location: /user/check");
        }
    }

    public function actionSwitch_active()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');
            $status = $app->request->getParam('status');

            $result = About::changeActive($id, $status);
            if($result){
                echo 'true';
            }else{
                echo $result;
            }

        }else{
            header("Location: /user/check");
        }
    }


}