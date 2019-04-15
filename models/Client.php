<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 30.01.2019
 * Time: 19:17
 */

namespace models;
use components\App;
use Exception;

class Client
{
    public $id;
    public $name;
    public $picture;
    public static $tableName = 'clients';
    public static $pdo = null;


    public function __construct($id)
    {
        self::$pdo = App::$app->db->getConnect();
        $this->id = $id;
    }

    public static function getList()
    {
        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("SELECT id, name, picture FROM " . self::$tableName);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function getClient(){

        try {

            $stmt = self::$pdo->prepare("SELECT id, name, picture FROM " .
                self::$tableName ." WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->id);

            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function add($data){

        try {

            self::$pdo = App::$app->db->getConnect();

            $stmt = self::$pdo->prepare("INSERT INTO " . self::$tableName ." (name, picture) VALUES (?, ?)");

            $stmt->bindParam(1, $data['name']);
            $stmt->bindParam(2, $data['picture']);
            $result = $stmt->execute();
            $clientId = false;

            if($result){
                $clientId = self::$pdo->lastInsertId();
            }
            return $clientId;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function delete(){

        self::$pdo = App::$app->db->getConnect();
        try {

            $stmt = self::$pdo->prepare("DELETE FROM " . self::$tableName . " WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->id);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function updateClient(){

        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$tableName ." SET name = ?  WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->id);

            $result = $stmt->execute();

            if($result){
                if($this->picture){
                    try{
                        $result = $this->updatePicture();
                    } catch (Exception $e) {
                        die ('ERROR: ' . $e->getMessage());
                    }
                }
            }

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function updatePicture(){
        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$tableName ." SET picture = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->picture);
            $stmt->bindParam(2, $this->id);

            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}