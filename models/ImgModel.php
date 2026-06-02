<?php
require_once 'core/coreModel.php';
class ImgModel extends coreModel{
    public function getAllImg() {
        $sql = "SELECT * FROM img";
        return $this->getAll($sql); // gọi hàm có sẵn trong coreModel
    }

    // Lấy 1 tour theo id
    public function getImgByTourId($id) {
        $sql = "SELECT * FROM image WHERE tourID = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['id' => $id]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm tour mới
    public function insertImg($data) {
        return $this->insert('image', $data);
    }

    // Cập nhật tour
    public function updateImage($id, $data) {
        return $this->update('image', $data, "imageID = $id");
    }

    // Xóa tour
    public function deleteImage($tourID) {
    $sql = "DELETE FROM image WHERE tourID = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$tourID]);
}


   
}