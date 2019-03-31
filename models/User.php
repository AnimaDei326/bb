<?php

namespace models;
use components\Session;
use Exception;
use components\App;


class User
{
    public $username;
    public $password;
    public $session_id = null;
    public static $pdo = null;
    public static $tableName = 'users';
    public static $roleTableName = 'role';
    public static $userRoleTableName = 'user_role';
    public static $defaultUserRole = 'user';

    function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        self::$pdo = App::$app->db->getConnect();
    }

    public function addUser()
    {
        try {
            $stmt = self::$pdo->prepare("INSERT INTO " . self::$tableName . " (username, password) VALUES (?, ?)");
            $stmt->bindParam(1, $this->username);
            $stmt->bindParam(2, $this->password);
            $stmt->execute();


            $stmt = self::$pdo->prepare("INSERT INTO " . self::$userRoleTableName . " (id_user, id_role) VALUES (?, ?)");
            $stmt->bindParam(1, self::$pdo->lastInsertId());
            $stmt->bindParam(2, self::$defaultUserRole);
            $stmt->execute();
            return true;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function setRole($id_user, $id_role)
    {
        try{
            $stmt = self::$pdo->prepare("UPDATE " . self::$userRoleTableName . " SET id_role = ? WHERE id_user = ? LIMIT 1");
            $stmt->bindParam(1, $id_role);
            $stmt->bindParam(2, $id_user);
            $stmt->execute();
            return true;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }

    }

    public static function getUserDataBySessionId($session_id){


        try{
            $stmt = self::$pdo->prepare("SELECT first_name, last_name, photo FROM " . self::$tableName. " WHERE session_id = ? LIMIT 1");
            $stmt->bindParam(1, $session_id);
            $stmt->execute();
            $userData = $stmt->fetchAll();
            return $userData[0];

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }



    public function checkUser(){

        try {

            $stmt = self::$pdo->prepare("SELECT id FROM " . self::$tableName. " WHERE username = ? AND password = ? LIMIT 1");
            $stmt->bindParam(1, $this->username);
            $stmt->bindParam(2, $this->password);
            $stmt->execute();

            $id = $stmt->fetchColumn();

            if($id){

                $data = Session::getInstance();
                $data->id = $id;
                $this->session_id = session_id();

                try {

                    $stmt = self::$pdo->prepare("UPDATE " . self::$tableName. " SET session_id = ? WHERE id = ? LIMIT 1");
                    $stmt->bindParam(1, $this->session_id);
                    $stmt->bindParam(2, $id);
                    $stmt->execute();

                } catch (Exception $e) {

                    die ('ERROR: ' . $e->getMessage());

                }

                try {
                    $stmt = self::$pdo->prepare("SELECT id_role FROM " . self::$userRoleTableName. " WHERE id_user = ? LIMIT 1");
                    $stmt->bindParam(1, $id);
                    $stmt->execute();

                    return true;

                } catch (Exception $e) {

                    die ('ERROR: ' . $e->getMessage());
                }

            }else {

                return false;

            }

        } catch (Exception $e) {

            die ('ERROR: ' . $e->getMessage());

        }
    }

    public static function helloUser(){

        self::$pdo = App::$app->db->getConnect();

        $data = Session::getInstance();
        $id = 0;

        if($data->id){
            $id = $data->id;
        }
        try {

            $stmt = self::$pdo->prepare("SELECT id FROM " . self::$tableName. " WHERE id = ? AND session_id = ? LIMIT 1");
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, session_id());
            $stmt->execute();
            $status = $stmt->fetchColumn();

            if($status){

                return $status;

            }else{

                return false;

            }

        } catch (Exception $e) {

            die ('ERROR: ' . $e->getMessage());

        }
    }

    public static function getRole()
    {
        if( self::helloUser() ){

            $data = Session::getInstance();
            $id = 0;

            if($data->id){
                $id = $data->id;
            }

            try {
                $stmt = self::$pdo->prepare("SELECT " .
                    self::$roleTableName. ".user_role_name, " .
                    self::$roleTableName. ".name FROM  " .
                    self::$userRoleTableName. " join " .
                    self::$roleTableName. " on " .
                    self::$roleTableName. ".id = " .
                    self::$userRoleTableName. ".id_role where " .
                    self::$userRoleTableName. ".id_user = ? limit 1"
                );

                $stmt->bindParam(1, $id);
                $stmt->execute();
                $roleName = $stmt->fetchAll();

                return $roleName[0];

            } catch (Exception $e) {

                die ('ERROR: ' . $e->getMessage());
            }

        }
    }
}