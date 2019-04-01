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
    public $active;
    public $sort;
    public $name;
    public $picture;
    public $title;
    public $subtitle;

    public function __construct($serviceId)
    {
        self::$pdo = App::$app->db->getConnect();
        $this->serviceId = $serviceId;
    }

    public function arrFilter($var){
        return ($var['id_Service'] == $this->serviceId);
    }

    public function updateService(){

        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$tableName ." SET sort = ? , active = ?, name = ?, picture = ?, title = ?, subtitle = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->sort);
            $stmt->bindParam(2, $this->active);
            $stmt->bindParam(3, $this->name);
            $stmt->bindParam(4, $this->picture);
            $stmt->bindParam(5, $this->title);
            $stmt->bindParam(6, $this->subtitle);
            $stmt->bindParam(7, $this->serviceId);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function getService(){

        try {

            $stmt = self::$pdo->prepare("SELECT id, sort, active, name, picture, title, subtitle FROM " .
                self::$tableName ." WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->serviceId);

            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function changeActive($status){


        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$tableName . " SET active = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $this->serviceId);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function deleteItem($id){

        self::$pdo = App::$app->db->getConnect();
        try {

            $stmt = self::$pdo->prepare("DELETE FROM " . self::$itemsTableName . " WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $id);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function changeItemActive($id, $status){

        self::$pdo = App::$app->db->getConnect();
        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$itemsTableName . " SET active = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $id);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
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

    public function getElementsCurrentService()
    {
        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("SELECT id, sort, active, name FROM ". self::$itemsTableName . " WHERE id_service = ?  ORDER BY `id`");

            $stmt->bindParam(1, $this->serviceId);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}