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

class Worker
{
    public static $teamTableName = 'team';
    public static $contactTableName = 'contacts';
    public static $serviceTableName = 'positions';
    public static $pdo = null;


    public function __construct()
    {
        self::$pdo = App::$app->db->getConnect();
    }


    public static function getTeamList($active = 'Y')
    {
        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("SELECT
                ". self::$teamTableName .".id, sort, active, first_name, second_name, institution, speciality, picture,
                ". self::$serviceTableName.".code FROM 
                ". self::$teamTableName ." JOIN 
                ". self::$serviceTableName ." ON 
                ". self::$teamTableName .".id_Positions = 
                ". self::$serviceTableName .".id WHERE 
                ". self::$teamTableName .".active LIKE 
                ? ORDER by sort");
            $stmt->bindParam(1, $active);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function getContactList($active = 'Y')
    {
        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("SELECT 
                ". self::$contactTableName .".id, 
                ". self::$contactTableName .".sort, 
                ". self::$contactTableName .".active, description, email, telephone, first_name, second_name, picture FROM 
                ". self::$contactTableName ." JOIN 
                ". self::$teamTableName ." ON 
                ". self::$contactTableName .".id_Team = 
                ". self::$teamTableName .".id WHERE 
                ". self::$teamTableName .".active LIKE 
                ? ORDER by sort LIMIT 2");
            $stmt->bindParam(1, $active);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}