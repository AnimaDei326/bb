<?php

namespace controllers;

use components\Controller;
use models\About;
use models\Admin;
use models\Client;
use models\FormContact;
use models\Service;
use models\Project;
use models\Worker;


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
            ]);

            echo $this->render('/admin/services_list', [
                'services' => $services,
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
            ]);

            echo $this->render('/admin/service_edit', [
                'service' => $serviceData,
                'items' => $serviceItemsData,
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

    public function actionProjects()
    {
        if( Admin::helloUser() ){

            self::$title = 'Проекты';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $projects = Project::getProjectList();

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/projects_list', [
                'projects' => $projects,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionProject($id)
    {
        if( Admin::helloUser() ){

            self::$title = 'Редактирование проекта';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $project = new Project($id);

            $projectData = $project->getProject();

            $doneItemsData = $project->getProjectItems($project::$doneCode);
            $resultItemsData = $project->getProjectItems($project::$resultCode);

            $clients = Client::getList();
            $services = Service::getServicesList();

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/project_edit', [
                'project' => $projectData,
                'done' => $doneItemsData,
                'result' => $resultItemsData,
                'clients' => $clients,
                'services' => $services,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionProject_add()
    {
        if( Admin::helloUser() ){

            self::$title = 'Новый проект';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $clients = Client::getList();
            $services = Service::getServicesList();

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/project_add', [
                'clients' => $clients,
                'services' => $services,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionClients()
    {
        if( Admin::helloUser() ){

            self::$title = 'Заказчики';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $clients = Client::getList();

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/clients_list', [
                'clients' => $clients,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionClient($id)
    {
        if( Admin::helloUser() ){

            self::$title = 'Редактирование заказчика';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $client = new Client($id);

            $clientData = $client->getClient();


            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/client_edit', [
                'client' => $clientData,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionClient_add()
    {
        if( Admin::helloUser() ){

            self::$title = 'Новый заказчик';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/client_add', [
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionWorkers()
    {
        if( Admin::helloUser() ){

            self::$title = 'Работники';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $workers = Worker::getTeamList('%');

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/workers_list', [
                'workers' => $workers,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionWorker($id)
    {
        if( Admin::helloUser() ){

            self::$title = 'Редактирование работника';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $worker = new Worker($id);
            $workerData = $worker->getWorker();
            $positions = Worker::getPositions();

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/worker_edit', [
                'worker' => $workerData,
                'positions' => $positions,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionWorker_add()
    {
        if( Admin::helloUser() ){

            self::$title = 'Новый работник';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];


            $positions = Worker::getPositions();

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/worker_add', [
                'positions' => $positions,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionText()
    {
        if( Admin::helloUser() ){

            self::$title = 'Направления компании';


            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $text = About::getList('text', '');


            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/about_text', [
                'text' => $text,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionDesc()
    {
        if( Admin::helloUser() ){

            self::$title = 'Описание';


            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $desc = About::getList('desc', '');


            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/about_desc', [
                'desc' => $desc,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionPhoto()
    {
        if( Admin::helloUser() ){

            self::$title = 'Галерея';


            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $photo = About::getList('photo', '');


            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/about_photo', [
                'photo' => $photo,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionPartner()
    {
        if( Admin::helloUser() ){

            self::$title = 'Партнеры';


            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $photo = About::getList('partner', '');


            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/about_partner', [
                'photo' => $photo,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionForm_contacts()
    {
        if( Admin::helloUser() ){

            self::$title = 'Результаты формы "Связаться';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $contact_list = FormContact::getList();

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/form_contact_list', [
                'contact_list' => $contact_list,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionForm_contact($id)
    {
        if( Admin::helloUser() ){

            self::$title = 'Результаты формы "Связаться';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $contact_data = FormContact::getById($id);

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/form_contact_edit', [
                'contact_data' => $contact_data,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }

    public function actionInclude()
    {
        if( Admin::helloUser() ){

            self::$title = 'Включаемая html-область';

            $userData = Admin::getUserDataBySessionId(session_id());

            $role = Admin::getRole();
            $userData['role'] = $role['name'];

            $data = file_get_contents($_SERVER['DOCUMENT_ROOT']. IncludeController::$filename);

            echo $this->render('/admin/header', [
                'title' => self::$title,
                'userData' => $userData,
            ]);

            echo $this->render('/admin/include_edit', [
                'data' => $data,
            ]);

            echo $this->render('/admin/footer', [
            ]);

        }else{
            header("Location: /user/check");
        }
    }



}