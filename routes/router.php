<?php
//ไฟล์นี่ใช้กำหนด endpoint (route) ในการทำงาน CRUD กับตารางในฐานข้อมูล
//ดึงข้อมูลทั้งหมด GET | domain / smartfarmservice/sensor

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once "./../core/Request.php"; // จัดการจติดต่อกับฐานข้อมูล
require_once "./../controllers/SensorController.php"; // จัดการการส่งข้อมูลกลับไปยัง client

// สร้างตัวแปรที่จะใช้ทำงานกับตัว controller ของ sensor
$sensorController = new SensorController();  

Request::handleRequest("GET", "/smartfarmservice/sensors", function () use ($sensorController) {
    $sensorController->getSensorAll();
}
);