<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 30.01.2019
 * Time: 16:47
 */

namespace models;
use components\App;
use Exception;


class Service
{
    public static $tableName = 'service';
    public static $itemsTableName = 'service_items';
    public static $pdo = null;

    public $serviceId;

    public function __construct($serviceId)
    {
        self::$pdo = App::$app->db->getConnect();
        $this->serviceId = $serviceId;
    }

    public function arrFilter($var){
        return ($var['id_Service'] == $this->serviceId);
    }

    public static function getServicesList($active = '%'){

        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("SELECT id, sort, active, name, title, subtitle, picture FROM "
                . self::$tableName . " WHERE active LIKE ? ORDER BY sort");

            $stmt->bindParam(1, $active);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function getElementsList($active = '%')
    {
        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("SELECT
                ". self::$itemsTableName .".id, 
                ". self::$itemsTableName .".sort, 
                ". self::$itemsTableName .".active, 
                ". self::$itemsTableName .".name, 
                ". self::$itemsTableName .".id_Service FROM 
                ". self::$tableName ." JOIN 
                ". self::$itemsTableName ." ON 
                ". self::$tableName .".id = 
                ". self::$itemsTableName .".id_Service WHERE 
                ". self::$itemsTableName .".active LIKE 
                ? AND 
                ". self::$tableName .".active LIKE 
                ? ORDER BY
                ". self::$itemsTableName .".sort");

            $stmt->bindParam(1, $active);
            $stmt->bindParam(2, $active);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}