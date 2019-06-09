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
use models\Client;
use components\App;

class ClientController extends Controller
{


    public function actionDeleteClient()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');
            $client = new Client($id);
            $result = $client->delete();
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


            $client = new Client($params['id']);
            $client->name = $params['name'];
            $client->clear_picture = $params['clear_picture'];
            $client->picture = $app->request->uploadFile('picture');

            $res = $client->updateClient();

            if($res){
                header("Location: /admin/clients");
            }else{
                header("Location: /admin/client/".$client->id."/");
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


            $data['picture'] = $app->request->uploadFile('picture');
            $data['name'] = $params['name'];

            $clientId = Client::add($data);

            if($clientId){
                Header('Location: /admin/clients');
            }else{
                var_dump($clientId);
            }



        }else{
            header("Location: /user/check");
        }
    }
}