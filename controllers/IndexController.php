<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 29.01.2019
 * Time: 14:46
 */

namespace controllers;
use components\Controller;
use models\About;
use models\Project;
use models\Service;
use models\Worker;

class IndexController extends Controller
{

    public function actionIndex()
    {
        self::$title = 'Главная страница';

        echo $this->render('header', [
            'title' => self::$title,
        ]);


        $arrAbout = About::getList('', 'Y');

        $about['text'] = array_filter($arrAbout, [new About('', '', 'text'), 'models\About::arrFilter'],  ARRAY_FILTER_USE_BOTH );
        $about['desc'] = array_filter($arrAbout, [new About('', '', 'desc'), 'models\About::arrFilter'],  ARRAY_FILTER_USE_BOTH );
        $about['photo'] = array_filter($arrAbout, [new About('', '', 'photo'), 'models\About::arrFilter'],  ARRAY_FILTER_USE_BOTH );
        $about['partner'] = array_filter($arrAbout, [new About('', '', 'partner'), 'models\About::arrFilter'],  ARRAY_FILTER_USE_BOTH );


        echo $this->render('about', [
            'text' => $about['text'],
            'desc' => $about['desc'],
            'photo' => $about['photo'],
            'partner' => $about['partner'],
        ]);

        $arrServiceItems = Service::getElementsList('Y');
        $arrServices = Service::getServicesList('Y');

        $arrServiceAndItems = [];

        foreach ($arrServices as $service){
            $arrServiceAndItems[$service['id']] = $service;
            $arrServiceAndItems[$service['id']]['items'] = array_filter($arrServiceItems, [new Service($service['id']), 'models\Service::arrFilter'], ARRAY_FILTER_USE_BOTH) ;
        }



        echo $this->render('service', [
            'services' => $arrServiceAndItems,
        ]);

        $arrProjects = Project::getProjectList('Y');

        $arrProjectsAndItems = [];

        $arrProjectsItemsDone = Project::getElementsList('done');
        $arrProjectsItemsResult = Project::getElementsList('result');


        foreach ($arrProjects as $project){
            $arrProjectsAndItems[$project['id_Service']][$project['id_Project']] = $project;
            $arrProjectsAndItems[$project['id_Service']][$project['id_Project']]['title'] = $arrServiceAndItems[$project['id_Service']]['title'];
            $arrProjectsAndItems[$project['id_Service']][$project['id_Project']]['subtitle'] = $arrServiceAndItems[$project['id_Service']]['subtitle'];
            $arrProjectsAndItems[$project['id_Service']][$project['id_Project']]['itemsDone'] = array_filter($arrProjectsItemsDone, [new Project($project['id_Project']), 'models\Project::arrFilter'], ARRAY_FILTER_USE_BOTH) ;
            $arrProjectsAndItems[$project['id_Service']][$project['id_Project']]['itemsResult'] = array_filter($arrProjectsItemsResult, [new Project($project['id_Project']), 'models\Project::arrFilter'], ARRAY_FILTER_USE_BOTH) ;
        }

        $doneTitle = $arrProjectsItemsDone[0]['project_items_type_name'];
        $resultTitle = $arrProjectsItemsResult[0]['project_items_type_name'];



        echo $this->render('project', [
            'projects' => $arrProjectsAndItems,
            'doneTitle' => $doneTitle,
            'resultTitle' => $resultTitle,
        ]);

        $arrTeam = Worker::getTeamList();

        echo $this->render('team', [
            'team' => $arrTeam,
        ]);

        $arrContact = Worker::getContactList();

        $include_data = file_get_contents($_SERVER['DOCUMENT_ROOT'] . IncludeController::$filename);


        echo $this->render('footer', [
            'title' => self::$title,
            'include_data'=> $include_data,
            'contact_left' => $arrContact[0],
            'contact_right' => $arrContact[1],
        ]);




    }
}