<?php
 //tránh người dùng truy cập trực tiêp biết tên file
 if(!defined('_luan')) {
    die('truy cập không hợp lệ');
 }

 class database{
    private static $conn;
    public static function connectPDO() {
        try {
    if(class_exists('PDO')){ //ham kiem tra lop co ton tai hay khong
         $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //ho tro tieng viet
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //day loi vao ngoai le
    );
    $dsn =_DRIVER.":host="._HOST."; dbname="._DB;
    self::$conn = new PDO ($dsn,_USER,_PASS,$options); //self::$conn
} } catch(Exception $ex) {
    echo "loi ket noi ". $ex -> getMessage();
}
return self::$conn;
    }
 }