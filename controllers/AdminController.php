<?php

namespace controllers;

use components\Controller;
use models\Admin;
use models\Service;

class AdminController extends Controller
{


    public function actionIndex()
    {
        if( Admin::helloUser() ){

            self::$title = 'Админ-панель';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/main', [
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionServices()
    {
        if( Admin::helloUser() ){

            self::$title = 'Услуги';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $services = Service::getServicesList();

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
                'services' => $services,
            ]);

            echo $this->render('/admin/services_list', [
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionService($id)
    {
        if( Admin::helloUser() ){

            self::$title = 'Редактирование услуги';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $service = new Service($id);

            $serviceData = $service->getService();

            $serviceItemsData = $service->getElementsCurrentService();

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
                'service' => $serviceData,
                'items' => $serviceItemsData,
            ]);

            echo $this->render('/admin/service_edit', [
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionService_add()
    {
        if( Admin::helloUser() ){

            self::$title = 'Новая услуга';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/service_add', [
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }



}