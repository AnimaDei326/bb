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


    public function __construct()
    {
        self::$pdo = App::$app->db->getConnect();
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
}