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

            $itemsDone = [];
            $itemsResult = [];
            $newItemsDone = [];
            $newItemsResult = [];

            foreach ($params as $key=>$value){
                if( $itemId = strstr($key, '_item_done_name', true)){
                    $itemsDone[$itemId]['name'] = $value;
                }
                elseif( $itemId = strstr($key, '_item_done_sort', true)){
                    $itemsDone[$itemId]['sort'] = $value;
                }
                elseif( $itemId = strstr($key, '_item_result_name', true)){
                    $itemsResult[$itemId]['name'] = $value;
                }
                elseif( $itemId = strstr($key, '_item_result_sort', true)){
                    $itemsResult[$itemId]['sort'] = $value;
                }
                elseif( $itemId = strstr($key, '_item_new_done_name', true)){
                    $newItemsDone[$itemId]['name'] = $value;
                }
                elseif( $itemId = strstr($key, '_item_new_done_sort', true)){
                    $newItemsDone[$itemId]['sort'] = $value;
                }
                elseif( $itemId = strstr($key, '_item_new_result_name', true)){
                    $newItemsResult[$itemId]['name'] = $value;
                }
                elseif( $itemId = strstr($key, '_item_new_result_sort', true)){
                    $newItemsResult[$itemId]['sort'] = $value;
                }
            }

            foreach ($itemsDone as $id => $itemArr){
                Project::updateItem($id, $itemArr['sort'],  $itemArr['name']);
            }

            foreach ($itemsResult as $id => $itemArr){
                Project::updateItem($id, $itemArr['sort'],  $itemArr['name']);
            }

            foreach ($newItemsDone as $id => $itemArr){
                if($itemArr['name']) {
                    Project::addItem($params['id'], 1, $itemArr['sort'], $itemArr['name']);
                }
            }

            foreach ($newItemsResult as $id => $itemArr){
                if($itemArr['name']) {
                    Project::addItem($params['id'], 2, $itemArr['sort'], $itemArr['name']);
                }
            }

            $project = new Project($params['id']);
            $project->name = $params['name'];
            $project->sort = $params['sort'];
            $project->active = $params['active'];
            $project->serviceId = $params['service'];
            $project->clientId = $params['client'];
            if($project->active){
                $project->active = 'Y';
            }else{
                $project->active = 'N';
            }

            $project->goal = $params['goal'];
            $project->time = $params['time'];
            $res = $project->updateProject();

            if($res){
                header("Location: /admin/projects");
            }else{
                header("Location: /admin/project/".$project->projectId."/");
            }

        }else{
            header("Location: /user/check");
        }
    }

}