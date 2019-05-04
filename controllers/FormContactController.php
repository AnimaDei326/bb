<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 04.05.2019
 * Time: 3:13
 */

namespace controllers;


use components\Controller;
use models\Admin;
use components\App;
use models\FormContact;

class FormContactController extends Controller
{

    public function actionEdit()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $params = $app->request->getAllParams();

            $name = $params['name'];
            $email = $params['email'];
            $phone = $params['phone'];
            $comment = $params['comment'];
            $view = $params['view'];
            $id = $params['id'];

            if($view){
                $view = 'Y';
            }else{
                $view = 'N';
            }

            $contact = new FormContact($view, $phone, $name, $email, $comment);

            $contact->id = $id;
            $res = $contact->update();

            if($res){
                header("Location: /admin/form_contacts");
            }else{
                header("Location: /admin/form_contacts/".$contact->id."/");
            }

        }else{
            header("Location: /user/check");
        }
    }

    public function actionSwitch_view()
    {
        if( Admin::helloUser() ){

            $app = App::$app;
            $id = $app->request->getParam('id');
            $view = $app->request->getParam('view');

            $result = FormContact::changeView($id, $view);
            if($result){
                echo 'true';
            }else{
                echo $result;
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
            $result = FormContact::delete($id);
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