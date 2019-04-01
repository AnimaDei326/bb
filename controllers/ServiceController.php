<?php

namespace controllers;

use components\Controller;
use components\Request;
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
            $service->picture = $app->request->uploadFile('picture');
            $service->title = $params['title'];
            $service->subtitle = $params['subtitle'];
            $res = $service->updateService();

            var_dump($res);

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

            $service->changeActive($status);

            echo 'true';

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

            echo 'true';

        }else{
            header("Location: /user/check");
        }
    }

    public function actionDeleteItem()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');
            Service::deleteItem($id);
            echo 'true';

        }else{
            header("Location: /user/check");
        }
    }

}