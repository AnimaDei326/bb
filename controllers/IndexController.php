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

class IndexController extends Controller
{
    public function actionIndex()
    {
        self::$title = 'Главная страница';

        echo $this->render('header', [
            'title' => self::$title,
        ]);


        echo $this->render('about', [
            'about' => About::getList('text', 'Y'),
        ]);
        $w = 1;
        echo $this->render('footer', [
            'title' => self::$title,
        ]);


    }
}