<?php
class UserModel extends coreModel{
    public function getAllUser() {
        $sql = "SELECT * FROM user";
        return $this->getAll($sql); // gọi hàm có sẵn trong coreModel
    }

    // Lấy 1 tour theo id
    public function getUserById($id) {
        $sql = "SELECT * FROM user WHERE userID = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['id' => $id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm tour mới
    

    // Cập nhật tour
    public function updateUser($id, $data) {
        return $this->update('user', $data, "userID = $id");
    }

    // Xóa tour
    public function deleteUser($id) {
        return $this->delete('user', "userID = $id");
    }
    public function updateActive($id,$isActive) {
        $sql = "UPDATE user set isActive = :isActive where userID = :userid";
        $stm = $this->conn->prepare($sql);
        $stm->execute([
            'isActive' => $isActive,
            'userid' => $id]);
    }
    public function updateVerified($id,$verified) {
        $sql = "UPDATE user set verified = :verified where userID = :userid";
        $stm = $this->conn->prepare($sql);
        $stm->execute([
            'verified' => $verified,
            'userid' => $id]);
    }
    public function getLastIdUser() {
        return $this->lastID();
    }
    public function insertUser($data) {
        if(isset($data['passWord'])) {
            $data['passWord'] = password_hash($data['passWord'],PASSWORD_DEFAULT);
        }
        return $this->insert('user',$data);
    }

    
}