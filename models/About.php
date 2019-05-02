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

class About
{
    public $id;
    public $active;
    public $sort;
    public $name;
    public $type;
    public static $tableName = 'about';
    public static $serviceTableName = 'about_type';
    public static $pdo = null;

    public function __construct($name, $sort, $type)
    {
        $this->name = strip_tags(trim($name));
        $this->active = 'Y';
        $this->sort = $sort;
        $this->type = $type;
        self::$pdo = App::$app->db->getConnect();
    }
    public function arrFilter($var){
        return ($var['type'] == $this->type);
    }

    public static function getList($type, $active)
    {
        self::$pdo = App::$app->db->getConnect();

        if( !$type ){
            $type = '%';
        }

        if( !$active ){
            $active = '%';
        }

        try {

            $stmt = self::$pdo->prepare("SELECT
                ". self::$tableName .".id, sort, active, name, 
                ". self::$serviceTableName .".type FROM 
                ". self::$tableName ." JOIN 
                ". self::$serviceTableName ." ON 
                ". self::$tableName .".id_type = 
                ". self::$serviceTableName .".id WHERE 
                ". self::$serviceTableName .".type LIKE 
                ? AND 
                ". self::$tableName .".active LIKE 
                ? ORDER by sort");

            $stmt->bindParam(1, $type);
            $stmt->bindParam(2, $active);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function add($idType, $sort, $active, $name){

        self::$pdo = App::$app->db->getConnect();
        try {

            $stmt = self::$pdo->prepare("INSERT INTO " . self::$tableName . " (sort, active, name, id_Type) VALUES (?, ?, ?, ?)");

            $stmt->bindParam(1, $sort);
            $stmt->bindParam(2, $active);
            $stmt->bindParam(3, $name);
            $stmt->bindParam(4, $idType);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function update($id, $sort, $active, $name=''){

        self::$pdo = App::$app->db->getConnect();
        try {

            if($name){
                $stmt = self::$pdo->prepare("UPDATE " . self::$tableName . " SET active = ?, sort = ?, name = ? WHERE id = ? LIMIT 1");

                $stmt->bindParam(1, $active);
                $stmt->bindParam(2, $sort);
                $stmt->bindParam(3, $name);
                $stmt->bindParam(4, $id);
            }else{
                $stmt = self::$pdo->prepare("UPDATE " . self::$tableName . " SET active = ?, sort = ? WHERE id = ? LIMIT 1");

                $stmt->bindParam(1, $active);
                $stmt->bindParam(2, $sort);
                $stmt->bindParam(3, $id);
            }


            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function changeActive($id, $status){

        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$tableName . " SET active = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $id);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function delete($id){

        self::$pdo = App::$app->db->getConnect();
        try {

            $stmt = self::$pdo->prepare("DELETE FROM " . self::$tableName . " WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $id);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }


}