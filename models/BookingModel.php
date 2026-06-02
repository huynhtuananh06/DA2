<?php


class BookingModel extends coreModel{
    // 🧩 Lấy tất cả các booking
    public function getAllBookings() {
        $sql = "SELECT * FROM booking";
        return $this->getAll($sql);
    }

    // 🧩 Lấy 1 booking theo ID
    public function getBookingById($id) {
        $sql = "SELECT * FROM booking WHERE bookingID = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['id' => $id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function BookinglastID() {
        return $this->lastID();
    }

    // 🧩 Thêm booking mới
    public function addBooking($data) {
        $this->insert('booking', $data);
        return $this->lastID();
    }

    // 🧩 Cập nhật booking
    public function updateBooking($id, $data) {
        $this->update('booking', $data, "bookingID = $id");
    }

    // 🧩 Xóa booking
    public function deleteBooking($id) {
        $this->delete('booking', "bookingID = $id");
    }
    public function getBookingByTourId($tourID)
{
    $sql = "SELECT * FROM booking WHERE tourID = :tourID";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['tourID' => $tourID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // danh sách nhiều dòng
}

public function updateStatus($bookingID, $status) {
    $sql = "UPDATE booking SET bookingStatus = :st WHERE bookingID = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        ':st' => $status,
        ':id' => $bookingID
    ]);
}

public function getBookingByUserId($userID)
{
    $sql = "SELECT * FROM booking WHERE userID = :userID";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['userID' => $userID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // danh sách nhiều dòng
}
//sửa tourID => scheduleID
public function checkExistingBooking($tourID, $userID)
{
    $sql = "SELECT bookingID FROM booking 
            WHERE scheduleID = :scheduleID AND userID = :userID
            LIMIT 1";
            
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':scheduleID' => $tourID, ':userID' => $userID]);
    
    // Nếu tìm thấy bất kỳ booking nào (kể cả đã hoàn thành/hủy)
    return $stmt->fetch(PDO::FETCH_ASSOC); 
}
public function updateAvailabilityTour($tourID) {
    $sql = "UPDATE tour_schedule SET available_slots = :a where scheduleID  = :id";
    $stm = $this->conn->prepare($sql);
    $stm->execute([
        ':a' => 0,
        ':id' => (int)$tourID
    ]);
    return $stm->rowCount() > 0;
    
}

public function userByTourID($tourID) {
        $sql = "
        SELECT 
            b.*,
            s.tourID,
            s.start_date,
            s.max_slots,
            s.available_slots,
            u.fullName,
            u.phoneNumber,
            u.email,
            u.address,
            t.tiltle AS tour_title,
            t.priceAdutls,
            t.priceChildren
        FROM booking b
        LEFT JOIN tour_schedule s ON b.scheduleID = s.scheduleID 
        LEFT JOIN tour t   ON s.tourID = t.tourID 
        LEFT JOIN user u   ON b.userID = u.userID
        
        WHERE s.scheduleID = ?
        ORDER BY b.bookingDate DESC
    ";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$tourID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}