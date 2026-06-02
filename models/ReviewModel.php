<?php
class ReviewModel extends coreModel{
    public function getAllReview() {
        $sql = "SELECT * FROM review";
        return $this->getAll($sql); // gọi hàm có sẵn trong coreModel
    }

    // Lấy 1 tour theo id
    public function getReviewBytourId($id) {
        $sql = "SELECT * FROM review WHERE tourID = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['id' => $id]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm tour mới
    public function insertReview($data) {
        return $this->insert('review', $data);
    }

    // Cập nhật tour
    public function updateReview($id, $data) {
        return $this->update('review', $data, "viewID = $id");
    }

    // Xóa tour
    public function deleteReview($id) {
        return $this->delete('view', "viewID = $id");
    }
}