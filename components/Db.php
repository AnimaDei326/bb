<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 29.01.2019
 * Time: 14:02
 */

namespace components;
use PDOException;
use PDO;

class Db
{
    public $host = 'localhost';
    public $db = 'u332330136_anima';
    public $user = 'u332330136_anima';
    public $password = 'AnimaDei1!';
    public $port = '3306';
    public $charset = 'utf8';

    /**
     * @var null|PDO
     */

    private $pdo = null;

    public function init()
    {

        $devConf = realpath(__DIR__ . '/../.env.dev.json');

        if (file_exists($devConf)) {

            $conf = json_decode(file_get_contents($devConf), true);

            if (isset($conf['dbhost'])) {
                $this->host = $conf['dbhost'];
            }
            if (isset($conf['dbname'])) {
                $this->db = $conf['dbname'];
            }
            if (isset($conf['dblogin'])) {
                $this->user = $conf['dblogin'];
            }
            if (isset($conf['dbpass'])) {
                $this->password = $conf['dbpass'];
            }

        }

        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port .
            ';dbname=' . $this->db .
            ';charset=' . $this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //для вывода исключений на экран
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //данные в виде асс. масива
        ];

	    try{
    	    $this->pdo = new PDO($dsn, $this->user, $this->password, $options);
    	}catch (PDOException $e){
    	    var_dump($e->getMessage());
    	    die();
    	}

        return true;
    }

    /**
     * @return null|PDO
     */
    public function getConnect()
    {
        return $this->pdo;
    }

    function __destruct()
    {
        $this->pdo = null;
    }
}