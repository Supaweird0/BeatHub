<?php // Start session
session_start();

// $connection = new mysqli($servername, $username, $password);
$in = true;
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $connection = null;
    private $db = "";

    private function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->db);
        if($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        } 
        echo "Connected successfully";
    }

    public static function getInstance() {
        static $instance = null;
        if($instance === null) {
            $instance = new Database();
        }
        return $instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function __destruct() {
        $this->connection->close();
    } 
}

class BeatHub {

}