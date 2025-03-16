<?php
class Database {
    private $host = "mysql-33054770-sau-6fc7.e.aivencloud.com:24272";
    private $db_name = "smart_fram_db";
    private $username = "avnadmin";
    private $password = "AVNS_iE2MD5fLeftv5bvUBJh";
    private $conn;
 
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
 