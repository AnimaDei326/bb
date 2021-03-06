<?php

namespace controllers;

use components\Controller;
use models\Admin;
use models\Service;
use components\App;

class ServiceController extends Controller
{

    public function actionEdit()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $params = $app->request->getAllParams();

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
                Service::updateItem($id, $itemArr['sort'], $itemArr['active'], $itemArr['name']);
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
                    Service::addItem($params['id'], $itemArr['sort'], $itemArr['active'], $itemArr['name']);
                }
            }

            $service = new Service($params['id']);
            $service->name = $params['name'];
            $service->sort = $params['sort'];
            $service->active = $params['active'];
            if($service->active){
                $service->active = 'Y';
            }else{
                $service->active = 'N';
            }

            $service->clear_picture = $params['clear_picture'];
            $service->picture = $app->request->uploadFile('picture');


            $service->title = $params['title'];
            $service->subtitle = $params['subtitle'];
            $res = $service->updateService();

            if($res){
                header("Location: /admin/services");
            }else{
                header("Location: /admin/service/".$service->serviceId."/");
            }

        }else{
            header("Location: /user/check");
        }
    }

    public function actionAdd()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $params = $app->request->getAllParams();


            $data = [];

            if( $params['active']){
                $data['active'] = 'Y';
            }else{
                $data['active'] = 'N';
            }
            $data['picture'] = $app->request->uploadFile('picture');
            $data['title'] = $params['title'];
            $data['subtitle'] = $params['subtitle'];
            $data['sort'] = $params['sort'];
            $data['name'] = $params['name'];

            $serviceId = Service::addService($data);

            if($serviceId){

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
                        Service::addItem($serviceId, $itemArr['sort'], $itemArr['active'], $itemArr['name']);
                    }
                }

                header("Location: /admin/services");
            }
            else{
                var_dump($serviceId);
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
            $service = new Service($id);

            $result = $service->changeActive($status);
            if($result){
                echo 'true';
            }else{
                echo $result;
            }

        }else{
            header("Location: /user/check");
        }
    }

    public function actionDeleteService()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');
            $service = new Service($id);
            $result = $service->deleteService();
            if($result){
                echo 'true';
            }else{
                echo $result;
            }

        }else{
            header("Location: /user/check");
        }
    }

    public function actionSwitch_item_active()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');
            $status = $app->request->getParam('status');
            $result = Service::changeItemActive($id, $status);

            if($result){
                echo 'true';
            }else{
                echo $result;
            }

        }else{
            header("Location: /user/check");
        }
    }

    public function actionDeleteItem()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');
            $result = Service::deleteItem($id);
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