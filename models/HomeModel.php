<?php

 class HomeModel extends coreModel{
     public function getAllTour() {
        $sql = "SELECT * FROM tour";
        return $this->getAll($sql); // gọi hàm có sẵn trong coreModel
    }

    public function seachTour() {
        $query = "SELECT * FROM tour where 1";
        $param = [];

        if(!empty($_POST['keyword'])) {
            $query .= " AND tiltle like :keyword";
            $param['keyword'] = "%" .$_POST['keyword'] ."%";
        }
        if(!empty($_POST['start'])) {
            $query .= " AND departurePoint = :star";
            $param['start'] = $_POST['start'];
        }
        if(!empty($_POST['end'])) {
            $query .= " AND destination = :en";
            $param['end'] = $_POST['end'];
        }
        if(!empty($_POST['date'])) {
            $query .= " AND startDate = :day";
            $param['date'] = $_POST['date'];
        }

        $stm = $this->conn->prepare($query);
        return $stm->execute($param);
        
    }
    
 }