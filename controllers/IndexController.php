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

        $arrProjects = Project::getList('Y');

        echo $this->render('project', [
            'projects' => $arrProjects,
        ]);

        $w = 1;


        echo $this->render('footer', [
            'title' => self::$title,
        ]);




    }
}