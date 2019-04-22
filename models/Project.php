<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 29.01.2019
 * Time: 16:48
 */

namespace models;
use components\App;
use Exception;

class Project
{

    public static $tableName = 'projects';
    public static $serviceTableName = 'project_items_type';
    public static $itemsTableName = 'project_items';
    public static $pdo = null;
    public static $doneCode = 'done';
    public static $resultCode = 'result';

    public $projectId;

    public function __construct($projectId)
    {
        self::$pdo = App::$app->db->getConnect();
        $this->projectId = $projectId;
    }

    public function arrFilter($var){
        return ($var['id_Projects'] == $this->projectId);
    }

    public static function getProjectList($active = '%')
    {
        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("SELECT 
              " . self::$tableName . ".id as id_Project, sort, active, id_Service, 
              " . self::$tableName . ".name as project_Name, goal, time, 
              " . Client::$tableName . ".name as client_Name, 
              " . Client::$tableName . ".picture FROM 
              " . self::$tableName . " JOIN 
              " . Client::$tableName ." ON 
              " . self::$tableName .".id_Clients = 
              " . Client::$tableName. ".id WHERE active LIKE ? ORDER BY sort");

            $stmt->bindParam(1, $active);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function getElementsList($code = '')
    {
        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("SELECT 
              " . self::$itemsTableName . ".id, sort, id_Projects, id_Project_items_type,
              " . self::$itemsTableName . ".name,
              " . self::$serviceTableName . ".name as project_items_type_name FROM 
              " . self::$itemsTableName . " JOIN 
              " . self::$serviceTableName ." ON 
              " . self::$itemsTableName .".id_Project_items_type = 
              " . self::$serviceTableName. ".id WHERE 
               " . self::$serviceTableName. ".code LIKE ?
              ORDER BY sort");

            $stmt->bindParam(1,$code);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function getProject(){

        try {

            $stmt = self::$pdo->prepare("SELECT id, sort, active, name, goal, time, id_Service, id_Clients FROM " .
                self::$tableName ." WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->projectId);

            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function getProjectItems($code){

        try {

            $stmt = self::$pdo->prepare("SELECT 
              " . self::$itemsTableName . ".id, sort, id_Projects, id_Project_items_type,
              " . self::$itemsTableName . ".name,
              " . self::$serviceTableName . ".name as project_items_type_name FROM 
              " . self::$itemsTableName . " JOIN 
              " . self::$serviceTableName ." ON 
              " . self::$itemsTableName .".id_Project_items_type = 
              " . self::$serviceTableName. ".id WHERE 
              " . self::$serviceTableName. ".code = ? and 
              " . self::$itemsTableName. ".id_Projects = ? ORDER BY sort");

            $stmt->bindParam(1, $code);
            $stmt->bindParam(2, $this->projectId);

            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function deleteProject(){

        self::$pdo = App::$app->db->getConnect();
        try {

            $stmt = self::$pdo->prepare("DELETE FROM " . self::$tableName . " WHERE id = ? LIMIT 1");

            $stmt->bindParam(1,$this->projectId);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function changeActive($status){


        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$tableName . " SET active = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $this->projectId);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }


}