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
    public $idWorker;
    public $firstName;
    public $secondName;
    public $institution;
    public $speciality;
    public $picture;
    public $sort;
    public $active;
    public $idPositions;


    public function __construct($idWorker)
    {
        self::$pdo = App::$app->db->getConnect();
        $this->idWorker = $idWorker;
    }

    public static function getPositions(){

        self::$pdo = App::$app->db->getConnect();

        try {


            $stmt = self::$pdo->prepare("SELECT id, name FROM ". self::$serviceTableName);

            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
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

    public function getWorker(){

        try {


            $stmt = self::$pdo->prepare("
            SELECT id, sort, active, first_name, second_name, institution, speciality, picture, id_Positions 
             FROM ". self::$teamTableName ." WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->idWorker);

            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function changeActive($status){


        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$teamTableName . " SET active = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $this->idWorker);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function updatePicture(){
        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$teamTableName ." SET picture = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->picture);
            $stmt->bindParam(2, $this->idWorker);

            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function updateWorker(){

        try {

            $stmt = self::$pdo->prepare("
            UPDATE " . self::$teamTableName ." SET sort = ? , active = ?, first_name = ?, second_name = ?, 
            speciality = ?, institution = ?, id_Positions = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->sort);
            $stmt->bindParam(2, $this->active);
            $stmt->bindParam(3, $this->firstName);
            $stmt->bindParam(4, $this->secondName);
            $stmt->bindParam(5, $this->speciality);
            $stmt->bindParam(6, $this->institution);
            $stmt->bindParam(7, $this->idPositions);
            $stmt->bindParam(8, $this->idWorker);

            $result = $stmt->execute();

            if($result){

                if($this->picture){
                    try{
                        $result = $this->updatePicture();
                    } catch (Exception $e) {
                        die ('ERROR: ' . $e->getMessage());
                    }
                }else{
                    $worker = self::getWorker();
                    if($worker[0]['picture']){
                        try{
                            $result = $this->updatePicture();
                        } catch (Exception $e) {
                            die ('ERROR: ' . $e->getMessage());
                        }
                    }
                }
            }

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function addWorker($data){


        try {

            self::$pdo = App::$app->db->getConnect();

            $stmt = self::$pdo->prepare("
            INSERT INTO " . self::$teamTableName ." (sort, active, first_name, second_name, speciality , institution, 
            id_Positions, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bindParam(1, $data['sort']);
            $stmt->bindParam(2, $data['active']);
            $stmt->bindParam(3, $data['first_name']);
            $stmt->bindParam(4, $data['second_name']);
            $stmt->bindParam(5, $data['speciality']);
            $stmt->bindParam(6, $data['institution']);
            $stmt->bindParam(7, $data['position']);
            $stmt->bindParam(8, $data['picture']);

            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function deleteWorker(){

        self::$pdo = App::$app->db->getConnect();
        try {

            $stmt = self::$pdo->prepare("DELETE FROM " . self::$teamTableName . " WHERE id = ? LIMIT 1");

            $stmt->bindParam(1,$this->idWorker);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

}