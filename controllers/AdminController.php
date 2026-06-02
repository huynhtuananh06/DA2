<?php 

// require_once 'core/baseController.php';
// require_once 'models/TourModel.php';
// require_once 'models/UserModel.php';
class AdminController extends baseController{
    public function booking() {
        $tourModel = new TourModel();
        $tour = $tourModel->getAllTour();
        
        $this->renderView('bookingadmin',['tours'=>$tour]);
    }

     public function tour() {
        $tourModel = new TourModel();
        $tour = $tourModel->getAllTour();
        $this->renderView('admin',['tours'=>$tour]);
    }
    public function tourDelete($id = null) {
         $tourModel = new TourModel();
         if ($id !== null) {
        $tourModel->deleteTour($id); // chỉ xóa
    }
    header("Location: index.php?controller=admin&action=tour");
    exit;
    }

    public function themTour() {
        $tourModel = new TourModel();
         $lastDate = date('Y-m-d',strtotime('+1 day'));
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Xử lý Upload Ảnh
        $imageName = ""; // Mặc định rỗng  không up ảnh
        
        // Kiểm tra xem có file được gửi lên không
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Đường dẫn thư mục lưu ảnh 
           $targetDir = __DIR__ . "/../public/upload/";
            
            // Tạo tên file mới time() + tên gốc (1765293_anh.jpg)tránh trùng tên
            $fileName = time() . "_" . basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            
            // file từ bộ nhớ tạm vào thư mục public/uploads
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $imageName = $fileName; 
            } else {
                echo "Lỗi upload ảnh!";
                exit; 
            }
        }
        
     
        $data = [
            'tiltle' => $_POST['tiltle'],
            'description' => $_POST['description'],
            'image' => $imageName,
            'quantity' => $_POST['quantity'],
            'priceAdutls' => $_POST['priceAdutls'],
            'priceChildren' => $_POST['priceChildren'],
            'destination' => $_POST['destination'],
            'availability' => $_POST['availability'],
            'itinerary' => $_POST['itinerary'],
            'departurePoint' => $_POST['departurePoint'],
            'startDate' => $_POST['startDate'],
            'endDate' => $_POST['endDate'],
            'region' => $_POST['region']
            
        ];
          $tourModel->insertTour($data);
          $tourID = $tourModel->lastID();
          $tourModel->schedule($tourID,$_POST['startDate'],$_POST['endDate'],$_POST['fre'],$_POST['inter'],$_POST['quantity']);
          
          header("Location: index.php?controller=img&action=themanh&id=".$tourID);
        exit;
        }
        $this->renderView('addTour',$data=[
            'last' => $lastDate
        ]);
        
    }



    public function editTour($id = null) {
    $tourModel = new TourModel();
    if ($id === null) {
        die("Thiếu hoặc ID không hợp ");
    }
    $id = (int)$id;
    // Kiểm tra id có hợp lệ không
    $tour = $tourModel->getTourById($id);

    $lastDate = $tourModel->getLastScheduleDate($id);
    $imageName = $tour['image'];

    // Nếu submit form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // if($tour['image'] != $_POST['image']) {
        //     $dir = 'public/upload/';
        //     $img = $_POST['image'];
        //     $imgDir = $dir.$img;
        //     if(file_exists($imgDir)) {
        //         unlink($imgDir);
        //     }

        //     if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        //         $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        //         $tarDir = $dir . $fileName;
        //         if(move_uploaded_file($_FILES["image"]["tmp_name"],$tarDir)) {
        //             $imageName = $fileName;
        //         } else {
        //             echo "Lỗi upload ảnh!";
        //             exit;
        //         }
        //     }
        // } else {
        //     $imageName = $_POST['image'];
        // }
        $data = [
            'tiltle' => $_POST['tiltle'],
            'description' => $_POST['description'],
            // 'image' => $imageName,
            'quantity' => $_POST['quantity'],  
            'priceAdutls' => $_POST['priceAdutls'],
            'priceChildren' => $_POST['priceChildren'],
            'destination' => $_POST['destination'],
            'availability' => $_POST['availability'],
            'itinerary' => $_POST['itinerary'],
            'departurePoint' => $_POST['departurePoint'],
            'startDate' => $_POST['startDate'],
            'endDate' => $_POST['endDate'],
            'region' => $_POST['region']
        ];
        if ($lastDate && strtotime($_POST['startDate']) < strtotime($lastDate)) {
    die("Không được chỉnh sửa lịch đã tồn tại");
}
        $tourModel->updateTour($id, $data);
        $tourModel->updateSchedule($tour['tourID'],$_POST['startDate'],$_POST['endDate'],$_POST['fre'],$_POST['inter'],$_POST['quantity']); //*
        header("Location: index.php?controller=admin&action=tour");
        exit;    
    }
   $this->renderView('editTour',['tour'=>$tour,'last' => $lastDate]);
}


    public function themAnh() {

    }


    public function user() {
        $userModel = new UserModel();
        $user = $userModel->getAllUser();
        $this->renderView('userAdmin',['user' => $user]);
    }

    public function updateActive() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userID = $_POST['userID'];
        $isActive = $_POST['isActive'];

        $userModel = new UserModel();
        $userModel->updateActive($userID, $isActive);

    }

   
}

     public function Admin2() {
     $amdinModel = new AdminModel();   
     $model = $amdinModel->getAllAdmin();
     $this->renderView('admin2',['admin'=>$model]);
    }


    public function updateActiveAdmin() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adminID = $_POST['adminID'];
        $isActive = $_POST['isActive'];

        $amdinModel = new AdminModel();
        $amdinModel->updateActiveAdmin($adminID, $isActive);

    }

}
    public function updateroleAdmin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adminID = $_POST['adminID'];
        $role = $_POST['role'];

        $amdinModel = new AdminModel();
        $amdinModel->updateRoleAdmin($adminID, $role);

    }
    }

}