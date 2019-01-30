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

    public function __construct()
    {
        self::$pdo = App::$app->db->getConnect();
    }


    public static function getList($active = '%')
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
}