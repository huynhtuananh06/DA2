<?php

// require_once 'core/baseController.php';
// require_once 'models/TourModel.php';

class BookingController extends baseController{

     public function index($id = null) {

        if (!isset($_SESSION['user'])) {
            // Nếu chưa đăng nhập, không thể đặt vé
            // Lưu lại trang họ muốn đến để sau khi login ta quay lại
            $_SESSION['redirect_to'] = "index.php?controller=booking&action=index&id=$id";
            
            // Đuổi về trang login
            header("Location: index.php?controller=login&action=index");
            exit;
        }

        // --- BƯỚC 2: LẤY THÔNG TIN ---
        
        // Đã đăng nhập, lấy thông tin người dùng từ SESSION
        $currentUser = $_SESSION['user'];
        $userID = $currentUser['userID']; // <-- BẠN ĐÃ CÓ userID
        
        $tourModel = new TourModel();
        $tour = $tourModel->getTourById($id);
        $schedule = $tourModel->getScheduleTourById($id);
        $reviewModel = new ReviewModel();
        $review = $reviewModel->getReviewBytourId($id);

        $imgModel = new ImgModel();
        $image = $imgModel->getImgByTourId($id);
       
        $this->renderView('booking', [
            'tour' => $tour,
            'user' => $userID,
            'review' =>$review,
            'image' => $image,
            'schedule' => $schedule
            
        ]);
    }

    // 🧩 Xử lý thêm mới booking (demo test)
    public function addTest() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        // Nếu không phải POST, không làm gì cả hoặc chuyển hướng
        return; 
    }
    $actionType = $_POST['action_type'] ?? null;
    $tourID_form = (int)$_POST['tourID'];
    $id = (int)$_POST['schedule']; //đã thêm 13/12
    $userID_session  = $_SESSION['user']['userID'] ?? null;
    $so_luong_nl = (int)$_POST['numAdutls'];
    $so_luong_te = (int)$_POST['numChildren'];
    // Nếu không có user đăng nhập → chặn luôn
    if (!$userID_session) {
        $_SESSION['error'] = "Vui lòng đăng nhập để tiếp tục.";
        header("Location: index.php?controller=auth&action=login");
        exit;
    }

    if ($actionType === 'booking') {
        if ($tourID_form <= 0 || $userID_session === null || ($so_luong_nl + $so_luong_te) <= 0) {
        $_SESSION['error'] = "Dữ liệu không hợp lệ.";
        header("Location: " . $_SERVER['HTTP_REFERER'] ?? 'index.php');
        exit;
        
    }
        $bookingModel = new BookingModel();
        $tourModel = new TourModel(); // Giả sử bạn có 'TourModel'
        
        $tour = $tourModel->getTourById($tourID_form); // Giả sử bạn có hàm này
        $priceAdutls_goc = (int)$tour['priceAdutls']; 
        $priceChildren_goc =(int)$tour['priceChildren'];
        
        $totals = ($so_luong_nl * $priceAdutls_goc) + ($so_luong_te * $priceChildren_goc);
        $quantityBooking = $so_luong_nl + $so_luong_te;

        $tourQuantity = $tourModel->getQuantitySchedule($id); //đã sửa 13/12
        
       // Tính toán số người
        $totalQuantity = $so_luong_nl + $so_luong_te;

        if($totals < $totalQuantity) {
            // Sửa lại chuỗi thông báo cho đúng biến
            $_SESSION['error'] = "Chỉ còn $totals vé, không đủ cho $totalQuantity người.";
            header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
            exit;
        }
        if($totals< $quantityBooking) {
            $_SESSION['error'] = "Chỉ còn $ remaining vé, không đủ cho $ totalPeople người.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
        // kiểm tra tourID và userID xem có đặt trùng
        //kiểm tra sửa sau nè một cái là tourid một cái là scheduleID kiểm tra đặt trùng không
        //***** */
        // if ($bookingModel->checkExistingBooking($id, $userID_session)) { 
        // $_SESSION['error'] = "Bạn đã đặt tour này rồi!";
        // header("Location: " . $_SERVER['HTTP_REFERER']);
        // exit;
        // }
        
            
            $newtotal = $total - $quantityBooking;
            //sửa tourID thành scheduleID
            $tourModel->updateQuantity($id,$newtotal);
            $data = [
            'scheduleID' => $id,
            'userID' => $userID_session,
            
            'numAdutls' => $_POST['numAdutls'],
            'numChildren' => $_POST['numChildren'],
            'totalPrice' => $totals,
            'bookingStatus' => 'Pending',
            'specialRequest' => $_POST['specialRequest']
        ];

        $bookingID = $bookingModel->addBooking($data);
        if($newtotal ===   0) {
            $bookingModel->updateAvailabilityTour($id);
        }
        $_SESSION['booking'] = [
            'bookingID'   => $bookingID,
            'totalPrice' => $totals,
        ];
        header("Location: index.php?controller=checkout&action=index");
        exit();
        

        
    } elseif($actionType === 'review') {
         $reviewModel = new ReviewModel();
         $commentText = $_POST['binhluan'] ?? '';
        if (!empty($commentText)) {
        
        $reviewData = [
            'tourID' => $tourID_form,
            'userID' => $userID_session,
            'comment' => $commentText,
            // Bạn có thể thêm trường Rating (điểm đánh giá) nếu có trong form
            // 'rating' => $_POST['rating'] ?? 5 
        ];
        $reviewModel->insertReview($reviewData);
        header("Location: index.php?controller=booking&action=index&id=".$tourID_form );
        exit();
    }
       
}

        
    
        
    }

    public function bookingDetails($id) {
    $bookingModel = new BookingModel();
    $userModel    = new UserModel();
    $tourModel    = new TourModel();
    
    $booking = $bookingModel->getBookingById($id);
    if (!$booking) die("Booking không tồn tại!");

    $user = $userModel->getUserById($booking['userID']);
    $schedule = $tourModel->getTourID($booking['scheduleID']);
    $tourID = $schedule['tourID'];
    $tour = $tourModel->getTourById((int)$tourID);

    $this->renderView("bookingDetails", [
        "booking" => $booking,
        "user" => $user,
        "tour" => $tour
    ]);
}
//hiển thi lịch trình đi của tour trong admin
 public function listBySchedule($tourID)
{
    $bookingModel = new BookingModel();
    $tourModel = new TourModel();
    
    $schedule = $tourModel->getScheduleTourById($tourID);
    $tour = $tourModel->getTourById($tourID);
   
    
    $this->renderView('ListBySchedule', [
         'tour' => $tour,
        'schedule' => $schedule,
    ]);
}
    public function listByTour($scheduleID)
{
    $bookingModel = new BookingModel();
    $tourModel = new TourModel();
    
    $bookings = $bookingModel->userByTourID($scheduleID);
    //*
    
    $tourIDArr = $tourModel->getTourID($scheduleID);
    $tourID = $tourIDArr['tourID'];
    $scheduleArr = $tourModel->getStartDate($scheduleID);
    $startDate = $scheduleArr['start_date'];
    $tour = $tourModel->getTourById((int)$tourID);
    
    
    
   
    
    $this->renderView('bookingListByTour', [
        'date' =>$startDate,
         'tour' => $tour,
        'bookings' => $bookings,
    ]);
}

    public function bookingHistory() {
        $bookingModel = new BookingModel();
        $tour = new TourModel();
        $cur=$_SESSION['user'];
        $userID = $cur['userID'];
        $bookingHistory = $bookingModel->getBookingByUserId($userID);

       
        $complete = [];
        $upcoming = [];
        $cancel =[];

        foreach($bookingHistory as $booking) {
            $status = $booking['bookingStatus'];
            $schedule = $tour->getTourID($booking['scheduleID']);
            $tourInfo = $tour ->getTourbyId($schedule['tourID']);
             $booking['tour'] = $tourInfo; // Thêm thông tin tour vào đối tượng booking
            if($status == 'cash') {
                $complete[]= $booking;
            } elseif ($status == 'Confirmed') {
                $upcoming[] = $booking;
            } else {
                $cancel[] = $booking;
            }
        }
        $this->renderView('history',[
            'cash' =>$complete,
            'Confirmed' =>$upcoming,
            'cancel' =>$cancel,
            'user' => $cur,
        ]);
    }

    public function Cancel($id = null) {
        $booking = new BookingModel();
        $tour = new TourModel();
        $bookingID = $id;
        $bookingModel = $booking->getBookingById($bookingID);
        $quantium = (int)$bookingModel['numAdutls'] + (int)$bookingModel['numChildren'];
        $scheduleID = $bookingModel['scheduleID'];
        $tour->canCelSchedule($scheduleID, $quantium);
        $booking->updateStatus($bookingID,"cancel");
        $this->bookingHistory();
    }
    
}
