<?php 
if(!defined('_luan')) {
    die('truy cập không hợp lệ');
 }

 class LoginModel extends coreModel{
    public function getUserName($userName) {
        $sql = "SELECT * FROM user Where userName = :user LIMIT 1";
        $param = [':user'=>$userName];
        return $this->fetchOne($sql,$param);
    }
    public function getIsActiveUser($userName) {
        $sql = "SELECT isActive FROM user Where userName = :user LIMIT 1";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['user' => $userName]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function getIsVerifiedUser($userName) {
        $sql = "SELECT verified FROM user Where userName = :user LIMIT 1";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['user' => $userName]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function getIsActiveAdmin($userName) {
        $sql = "SELECT isActive FROM admin Where userName = :user LIMIT 1";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['user' => $userName]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function getIsRoleAdmin($userName) {
        $sql = "SELECT role FROM admin Where userName = :user LIMIT 1";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['user' => $userName]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getAdmin($userName) {
        $sql = "SELECT * FROM admin Where userName = :user LIMIT 1";
        $param = [':user'=>$userName];
        return $this->fetchOne($sql,$param);
    }

    
    public function insertAdmin($data) {
        if(isset($data['passWord'])) {
            $data['passWord'] = password_hash($data['passWord'],PASSWORD_DEFAULT);
        }
        return $this->insert('admin',$data);
    }
 }