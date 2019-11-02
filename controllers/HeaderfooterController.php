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
use models\HeaderFooter;

class HeaderfooterController extends Controller
{
    public static $type = [
        'title' => 1,
        'sector' => 3,
        'contact' => 5,
        'requisite' => 6,
    ];
    public function actionEdit()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $params = $app->request->getAllParams();

            $res = false;

            if($params['type'] == 'contact' or $params['type'] == 'requisite'){
                $items = [];
                foreach ($params as $key=>$value){
                    if( $itemId = strstr($key, '_item_title', true)){
                        $items[$itemId]['title'] = $value;
                    }
                    if( $itemId = strstr($key, '_item_value', true)){
                        $items[$itemId]['value'] = $value;
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
                    $res = HeaderFooter::update($id, $itemArr['sort'], $itemArr['active'], $itemArr['title'], $itemArr['value']);
                    if(!$res) break;
                }

                $newItems = [];
                foreach ($params as $key=>$value){
                    if( $itemId = strstr($key, '_item_new_title', true)){
                        $newItems[$itemId]['title'] = $value;
                    }
                    if( $itemId = strstr($key, '_item_new_value', true)){
                        $newItems[$itemId]['value'] = $value;
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
                    if($itemArr['title'] or $itemArr['value']){
                        $res = HeaderFooter::add(self::$type[$params['type']], $itemArr['sort'], $itemArr['active'],
                            $itemArr['title'], $itemArr['value']);
                        if(!$res) break;
                    }
                }

            }elseif($params['type'] == 'title'){
                $res = HeaderFooter::update($params['id'], $params['sort'], 'Y', $params['title'],
                    $params['value']);

            }elseif($params['type'] == 'sector'){
                $items = [];
                foreach ($params as $key=>$value){

                    if( $itemId = strstr($key, '_item_sort', true)){
                        $items[$itemId]['sort'] = $value;
                        if( $picture = $app->request->uploadFile('picture_'.$itemId) ){
                            $items[$itemId]['value'] = $picture;
                        }else{
                            $items[$itemId]['value'] = '';
                        }

                    }
                    if( $itemId = strstr($key, '_item_active', true)){
                        $items[$itemId]['active'] = 'Y';
                    }

                    if( $itemId = strstr($key, '_item_title', true)){
                        $items[$itemId]['title'] = $value;
                    }
                }
                foreach ($items as $id => $itemArr){
                    if($itemArr['active'] != 'Y'){
                        $itemArr['active'] = 'N';
                    }
                    $res = HeaderFooter::update($id, $itemArr['sort'], $itemArr['active'], $itemArr['title'], $itemArr['value']);
                    if(!$res) break;
                }

                $newItems = [];
                foreach ($params as $key=>$value){

                    if( $itemId = strstr($key, '_item_new_sort', true)){
                        $newItems[$itemId]['sort'] = $value;
                        if( $picture = $app->request->uploadFile('picture_'.$itemId) ){
                            $newItems[$itemId]['value'] = $picture;
                        }else{
                            $newItems[$itemId]['value'] = '';
                        }

                    }
                    if( $itemId = strstr($key, '_item_new_active', true)){
                        $newItems[$itemId]['active'] = 'Y';
                    }
                    if( $itemId = strstr($key, '_item_new_title', true)){
                        $newItems[$itemId]['title'] = $value;
                    }
                }
                foreach ($newItems as $id => $itemArr){
                    if($itemArr['active'] != 'Y'){
                        $itemArr['active'] = 'N';
                    }
                    $res = HeaderFooter::add(self::$type[$params['type']], $itemArr['sort'], $itemArr['active'],
                        $itemArr['title'], $itemArr['value']);
                    if(!$res) break;
                }
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

            $result = HeaderFooter::delete($id);
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

            $result = HeaderFooter::changeActive($id, $status);
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