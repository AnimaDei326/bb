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

class FormContact
{
    public $id;
    public $view;
    public $phone;
    public $name;
    public $email;
    public $comment;
    public $date;
    public static $tableName = 'form_contact';
    public static $pdo = null;

    public function __construct($view, $phone, $name, $email, $comment)
    {
        $this->view = $view;
        $this->phone = $phone;
        $this->name = $name;
        $this->email = $email;
        $this->comment = $comment;
        self::$pdo = App::$app->db->getConnect();
    }


    public static function getList($view = '%')
    {
        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("SELECT id, view, phone, email, name, date, comment FROM "
                . self::$tableName." WHERE view LIKE ? ORDER BY id DESC");

            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function add(){

        self::$pdo = App::$app->db->getConnect();
        try {

            $stmt = self::$pdo->prepare("INSERT INTO " . self::$tableName . " (view, phone, email, name, comment) VALUES (?, ?, ?, ?, ?)");

            $stmt->bindParam(1, $this->view);
            $stmt->bindParam(2, $this->phone);
            $stmt->bindParam(3, $this->email);
            $stmt->bindParam(4, $this->name);
            $stmt->bindParam(5, $this->comment);
            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function update(){

        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$tableName . " SET view = ?, phone = ?, email = ?, name = ?, comment = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $this->view);
            $stmt->bindParam(2, $this->phone);
            $stmt->bindParam(3, $this->email);
            $stmt->bindParam(4, $this->name);
            $stmt->bindParam(5, $this->comment);
            $stmt->bindParam(6, $id);

            $result = $stmt->execute();

            return $result;

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public static function changeView($id, $view){

        self::$pdo = App::$app->db->getConnect();

        try {

            $stmt = self::$pdo->prepare("UPDATE " . self::$tableName . " SET view = ? WHERE id = ? LIMIT 1");

            $stmt->bindParam(1, $view);
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