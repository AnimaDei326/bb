<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 23.04.2019
 * Time: 1:40
 */

namespace controllers;

use components\Controller;
use models\Admin;
use models\Project;
use components\App;

class ProjectController extends Controller
{
    public function actionDeleteProject()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');
            $project = new Project($id);
            $result = $project->deleteProject();
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
            $project = new Project($id);

            $result = $project->changeActive($status);
            if($result){
                echo 'true';
            }else{
                echo $result;
            }

        }else{
            header("Location: /user/check");
        }
    }

    public function actionEdit()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $params = $app->request->getAllParams();

//            $items = [];
//            foreach ($params as $key=>$value){
//                if( $itemId = strstr($key, '_item_name', true)){
//                    $items[$itemId]['name'] = $value;
//                }
//                if( $itemId = strstr($key, '_item_sort', true)){
//                    $items[$itemId]['sort'] = $value;
//                }
//            }
//
//            foreach ($items as $id => $itemArr){
//                Project::updateItem($id, $itemArr['sort'], 'Y', $itemArr['name']);
//            }
//
//            $newItems = [];
//            foreach ($params as $key=>$value){
//                if( $itemId = strstr($key, '_new_item_name', true)){
//                    $newItems[$itemId]['name'] = $value;
//                }
//                if( $itemId = strstr($key, '_new_item_sort', true)){
//                    $newItems[$itemId]['sort'] = $value;
//                    $newItems[$itemId]['active'] = 'N';
//                }
//                if( $itemId = strstr($key, '_new_item_active', true)){
//                    $newItems[$itemId]['active'] = 'Y';
//                }
//            }
//
//            foreach ($newItems as $id => $itemArr){
//                if($itemArr['name']){
//                    Service::addItem($params['id'], $itemArr['sort'], $itemArr['active'], $itemArr['name']);
//                }
//            }

            $project = new Project($params['id']);
            $project->name = $params['name'];
            $project->sort = $params['sort'];
            $project->active = $params['active'];
            if($project->active){
                $project->active = 'Y';
            }else{
                $project->active = 'N';
            }

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

}