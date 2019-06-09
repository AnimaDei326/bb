<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 28.04.2019
 * Time: 0:43
 */

namespace controllers;

use components\Controller;
use models\Admin;
use components\App;
use models\Worker;

class WorkerController extends Controller
{
    public function actionSwitch_active()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');
            $status = $app->request->getParam('status');
            $worker = new Worker($id);

            $result = $worker->changeActive($status);
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

            $worker = new Worker($params['id']);
            $worker->firstName = $params['first_name'];
            $worker->secondName = $params['second_name'];
            $worker->speciality = $params['speciality'];
            $worker->institution = $params['institution'];
            $worker->sort = $params['sort'];
            $worker->idPositions = $params['position'];
            $worker->active = $params['active'];

            if($worker->active){
                $worker->active = 'Y';
            }else{
                $worker->active = 'N';
            }

            $worker->picture = $app->request->uploadFile('picture');
            $worker->clear_picture = $params['clear_picture'];

            $res = $worker->updateWorker();

            if($res){
                header("Location: /admin/workers");
            }else{
                header("Location: /admin/worker/".$worker->idWorker."/");
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

            $data['first_name'] = $params['first_name'];
            $data['second_name'] = $params['second_name'];
            $data['speciality'] = $params['speciality'];
            $data['institution'] = $params['institution'];
            $data['sort'] = $params['sort'];
            $data['position'] = $params['position'];
            $data['active'] = $params['active'];

            if($data['active']){
                $data['active'] = 'Y';
            }else{
                $data['active'] = 'N';
            }

            $data['picture'] = $app->request->uploadFile('picture');

            $res = Worker::addWorker($data);

            if($res){
                header("Location: /admin/workers");
            }else{
                var_dump($res);
            }

        }else{
            header("Location: /user/check");
        }
    }

    public function actionDeleteWorker()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');
            $worker = new Worker($id);
            $result = $worker->deleteWorker();
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