<?php 


class AdminModel extends coreModel {
    public function getAllTour() {
        $sql = "SELECT * FROM tour";
        return $this->getAll($sql);
    }
    public function getAllAdmin() {
        $sql = "SELECT * FROM admin";
        return $this->getAll($sql);
    }
    public function updateActiveAdmin($id, $isActive){
        $sql = "UPDATE admin set isActive = :isActive where adminID = :adminid";
        $stm = $this->conn->prepare($sql);
        $stm->execute([
            'isActive' => $isActive,
            'adminid' => $id]);
    }
    public function updateRoleAdmin($id, $role){
        $sql = "UPDATE admin set role = :role where adminID = :adminid";
        $stm = $this->conn->prepare($sql);
        $stm->execute([
            'role' => $role,
            'adminid' => $id]);
    }
    
}