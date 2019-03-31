<?php

namespace models;



class Admin extends User
{

    public static $admin_role_name = 'admin';

    public static function isAdmin(){

        $roleData = self::getRole();

        if($roleData['user_role_name'] == self::$admin_role_name){
            return true;
        }

        return false;
    }

}