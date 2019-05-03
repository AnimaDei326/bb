<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 03.05.2019
 * Time: 22:19
 */

namespace controllers;


use models\FormContact;

class AjaxController
{
    public function actionContact_form(){

        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $name = self::getSafetyRequest('name');
            $email = self::getSafetyRequest('email');
            $phone = self::getSafetyRequest('phone');

            if (!$name){
                $result = ['success'=> 'N', 'error'=> 'name not found'];
            }elseif ( !($email || $phone) ){
                $result = ['success'=> 'N', 'error'=> 'email and phone not found'];
            }else{

                $form = new FormContact('N', $phone, $name, $email, '');
                $res = $form->add();

                if ($res){
                    $result = ['success'=> 'Y'];
                }else{
                    $result = ['success'=> 'N', 'error'=> $res];
                    mail('animadei@mail.ru', 'ошибка на bb.lc в форме обратной связи', json_encode($result));
                }
            }
            $response = json_encode($result);
            echo $response;
        }
    }


    public function getSafetyRequest($key){
        return trim(strip_tags(htmlspecialchars($_REQUEST[$key])));
    }
}