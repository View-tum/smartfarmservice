<?php
require_once "./../config/Database.php"; // จัดการจติดต่อกับฐานข้อมูล
require_once "./../models/Sensor.php"; // จัดการการทำงาน (CRUD) กับฐานข้อมูล
require_once "./../core/Response.php"; // จัดการการส่งข้อมูลกลับไปยัง client

class SensorController{
    private $db;
    private $sensor;

    public function __construct() {
        $this->db =new Database(); // สร้าง object Database
        $this->sensor = new Sensor($this->db->connect()); // สร้าง object Sensor และส่ง $db ไปยัง constructor ของ Sensor$db);
    }
    public function getSensorAll() {
        $result = $this->sensor->getSensorAll(); // ดึงข้อมูล Sensor ทั้งหมดจาก Sensor_tb
        $this->sendResponseFromResult($result); // ใช้แบบนี้กรณีที่ส่งค่ากลับมีมากกว่า 1 รายการ
    }
    // ใช้ในกรณีที่ส่งค่ากลับมีมากกว่า 1 รายการ/แถว/record/ข้อมูล
    private function sendResponseFromResult($result) {
        $num = $result->rowCount();
        if ($num > 0) {
            $sensors_arr = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $sensors_arr[] = $row;
            }
            Response::sendResponse(200, $sensors_arr);
        } else {
            Response::sendResponse(404, ["message" => "No data found"]);
        }
    }
 
}
