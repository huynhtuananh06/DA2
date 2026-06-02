<?php
 if(!defined('_luan')) {
    die('truy cập không hợp lệ');
 }

class TourModel extends coreModel{
     public function getAllTour() {
        $sql = "SELECT * FROM tour";
        return $this->getAll($sql); // gọi hàm có sẵn trong coreModel
    }

    // Lấy 1 tour theo id
    public function getTourById($id) {
        $sql = "SELECT * FROM tour WHERE tourID = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['id' => $id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    // dùng để lấy thông tin truền qua booking
   
    public function getScheduleTourById($id) {
        $sql = "SELECT * FROM tour_schedule WHERE tourID = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['id' => $id]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    // Thêm tour mới
    public function insertTour($data) {
        return $this->insert('tour', $data);
    }

    // Cập nhật tour
    public function updateTour($id, $data) {
        return $this->update('tour', $data, "tourID = $id");
    }

    // Xóa tour
    public function deleteTour($id) {
        return $this->delete('tour', "tourID = $id");
    }


    public function getToursByPage($limit, $offset) {
    $sql = "SELECT * FROM tour LIMIT :limit OFFSET :offset";
    $stm = $this->conn->prepare($sql);
    $stm->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stm->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

public function getCoinShort($limit,$offset) {
    $sql = "SELECT * FROM tour ORDER BY priceAdutls ASC LIMIT :limit OFFSET :offset";
    $stm = $this->conn->prepare($sql);
    $stm->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stm->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
public function getCoinHigh($limit,$offset) {
    $sql = "SELECT * FROM tour ORDER BY priceAdutls DESC LIMIT :limit OFFSET :offset";
    $stm = $this->conn->prepare($sql);
    $stm->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stm->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
public function countTours() {
    $sql = "SELECT COUNT(*) as total FROM tour";
    return $this->conn->query($sql)->fetch()['total'];
}
//của tour
public function getQuantity($id) {
    $sql = "SELECT quantity from tour where tourID = :tourID";
    $stm = $this->conn->prepare($sql);
    $stm->execute(['tourID'=>$id]);
    return $stm->fetch(PDO::FETCH_ASSOC);

}
//schedule
public function getQuantitySchedule($id) {
    $sql = "SELECT max_slots from tour_schedule where scheduleID = :id";
    $stm = $this->conn->prepare($sql);
    $stm->execute([
        'id' => $id
    ]);
    return $stm->fetch(PDO::FETCH_ASSOC);
}
//sửa tên bảng, cột max_slots và tourID => shceduleID
public function updateQuantity($id,$quantity) {
    $sql = "UPDATE tour_schedule set max_slots = :quantity where scheduleID = :tourID";
    $stm = $this->conn->prepare($sql);
    $stm->execute(['tourID'=>$id,
                    'quantity' => $quantity]);

}
public function canCelSchedule($scheduleID, $qty) {
    $sql = "
        UPDATE tour_schedule
        SET max_slots = max_slots + :qty
        WHERE scheduleID = :id
          AND max_slots >= :qty
    ";
    $stm = $this->conn->prepare($sql);
    $stm->execute([
        'id'  => $scheduleID,
        'qty' => $qty
    ]);
}
public function lastTourID() {
    return $this->lastID();
}

public function seachTour1($data,$keyword) {
    $conditions = [];

    // điều kiện từ bảng tour
    foreach ($data as $key => $value) {
        if ($key !== 'start_date') {
            $conditions[] = "t.$key = :$key";
        }
    }

    // điều kiện ngày khởi hành (từ tour_schedule)
    if (!empty($data['start_date'])) {
        $conditions[] = "ts.start_date = :start_date";
    }

    // keyword tìm theo title
    if (!empty($keyword)) {
        $key = array_keys($keyword)[0];
        $conditions[] = "t.$key LIKE :keyword";
    }

    $sql = "
        SELECT DISTINCT t.*
        FROM tour t
        JOIN tour_schedule ts ON t.tourID = ts.tourID
    ";

    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $stm = $this->conn->prepare($sql);

    // bind keyword
    if (!empty($keyword)) {
        $stm->bindValue(":keyword", "%" . array_values($keyword)[0] . "%");
    }

    // bind data
    foreach ($data as $key => $value) {
        $stm->bindValue(":$key", $value);
    }

    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}


    
    public function schedule($tourID,$start,$end,$fre,$interval,$quantium) {
        $start = new DateTime($start);
        $end = new DateTime($end);
        if($fre == 'tuần') {
            $intervalObj = new DateInterval("P7D");
        } elseif($fre =='tháng') {
            $intervalObj = new DateInterval("P1M");
        } else {
            $intervalObj = new DateInterval("P{$interval}D");
        }
        $period = new DatePeriod($start,$intervalObj,$end->modify("+1 day"));
        foreach($period as $date) {
            $data = [
                'tourID' => $tourID,
                'start_date' => $date->format('Y-m-d'), //*
                'max_slots' => $quantium,
            ];
            $this->insert('tour_schedule',$data);
        }
    }
    public function updateSchedule($tourID,$start,$end,$fre,$inter,$quantium) {
            $id = (int)$tourID;
            //*** */
            $lastDate = $this->getLastScheduleDate($id);
            if($lastDate) {
                $start = new DateTime($lastDate);
                $start->modify('+1 day');
            } else {
                $start = new DateTime($start);
            }
            
            $end = new DateTime($end);
            
            if($fre == 'tuần') {
                $interObj = new DateInterval("P7D");
            } elseif($fre == 'tháng') {
                $interObj = new DateInterval("P1M");
            } else {
                $interObj = new DateInterval("P{$inter}D");
            }
            if($start > $end) return;
            $per = new DatePeriod($start,$interObj,$end->modify("+1 day"));
            foreach($per as $date) {
                $data = [
                'tourID' => $id,
                'start_date' => $date->format('Y-m-d'),
                'max_slots' => $quantium,
                ];
                $this->insert('tour_schedule',$data);
            }
        }
        public function getTourID($id) {
         $sql = "SELECT tourID FROM tour_schedule WHERE scheduleID = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['id' => $id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
        }
        public function getStartDate($id) {
         $sql = "SELECT start_date FROM tour_schedule WHERE scheduleID = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['id' => $id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
        }


        public function getLastScheduleDate($tourID) {
            $sql = "SELECT MAX(start_date) AS lastDate from tour_schedule where tourID = :tourID";
            $stm = $this->conn->prepare($sql);
            $stm->execute(['tourID' => $tourID]);
            return $stm->fetch(PDO::FETCH_ASSOC)['lastDate'];
        }


        public function getTourByRegion($vung) {
            $sql = "SELECT * FROM tour WHERE region = :region";
    $stm = $this->conn->prepare($sql);
    $stm->bindValue(':region', $vung);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
}