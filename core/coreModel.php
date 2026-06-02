<?php
 if(!defined('_luan')) {
    die('truy cập không hợp lệ');
 }

 class coreModel
 {
   protected $conn;
   public function __construct()
   {
      $this->conn = database::connectPDO();
   }
   // truy vấn dữ liệu
 public function getAll($sql){
   
    $stm = $this->conn -> prepare($sql);
    $stm->execute();

    $result = $stm  -> fetchAll(PDO::FETCH_ASSOC);
    return $result;
 }
 //truy vấn 1 dòng
 public function getOne($sql){
    $stm = $this->conn-> prepare($sql);
    $stm->execute();

    $result = $stm  -> fetch(PDO::FETCH_ASSOC);
    return $result;
 }
 public function fetchOne($sql,$param) {
   $stm = $this->conn->prepare($sql);
   $stm->execute($param);
   return $stm -> fetch(PDO::FETCH_ASSOC);
 }

 //đếm số lượng dòng
public function getRows($sql) {
   
   $stm = $this->conn -> prepare($sql);
    $stm->execute();

    $result = $stm  -> rowCount(); //hàm đếm số lượng hàng
    return $result;
 }


 //thêm dữ liệu

 public function insert($table,$data) {
    
 
    $key = array_keys($data); //lấy khoá
    $cot = implode(',',$key); // phan tach mang thanh chuoi.
    $place = ':'.implode(",:",$key);
    //mẫu mốt sửa *****
    $sql = "INSERT INTO $table ($cot) VALUES($place)";
    $stm = $this->conn -> prepare($sql);
    return $stm -> execute($data);
    
 } 


 //update
 public function update($table,$data,$condition = '') {
   
   $update ='';
   foreach($data as $key=>$value) {
      $update .= $key. '=:' .$key.',';
   }
   $update = trim($update,','); // loại bỏ khoản trắng và kí tự khác ở 2 đầu
   if(!empty($condition)){
      $sql = "UPDATE $table SET $update where $condition";
   } else {
      $sql = "UPDATE $table SET $update";
   }
   $tmp = $this->conn -> prepare($sql);
   return $tmp->execute($data);
 }

 //delete
 public function delete($table,$condition = '') {
   
   if(!empty($condition)) {
      $sql ="DELETE from $table where $condition";
   } else {
      $sql ="DELETE from $table";
   }
  $tmp = $this->conn -> prepare($sql);
   $tmp -> execute();
 }
 //lấy dòng dữ liệu mới nhất
 public function lastID() {
  
   return $this->conn -> lastInsertId(); // hỗ trợ sẵn lấy id mới nhất
 }
}