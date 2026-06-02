<?php
// require_once 'models/TourModel.php';
// require_once 'core/baseController.php';

class TourController extends baseController{
    public function index() {
        $model = new TourModel();
       // Tổng số tour
    $totalTours = $model->countTours();  

    // Số tour mỗi trang
    $limit = 8;

    // Lấy trang hiện tại (mặc định = 1) lấy trên thanh url 
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;

    // Tính offset 0*8 = 0 lấy từ 0-7
    $offset = ($page - 1) * $limit;

    // Lấy danh sách tour theo phân trang
    $tours = $model->getToursByPage($limit, $offset);

    // Tính tổng số trang vd 25/8 = 3.125 tròn lên 4 có 4 trang
    $totalPages = ceil($totalTours / $limit);

    $this->renderView('tour', [
        'tours' => $tours,
        'page' => $page,
        'totalPages' => $totalPages
    ]);
    }
    public function short() {
        $model = new TourModel();
        $method = $_POST['coin'];
        $totalTour = $model->countTours();
        $limit = 8;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if($page < 1) $page = 1;
        $offset = ($page - 1) * $limit;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($method == 'thap') {
                $tourCoin = $model->getCoinShort($limit,$offset);
            } else {
                $tourCoin = $model->getCoinHigh($limit,$offset);
            }
        }
        $totalPages = ceil($totalTour/$limit);
        $this->renderView('tour',[
            'tourCoin' => $tourCoin,
            'page' => $page,
            'totalPages' => $totalPages
        ]);
    }

    public function seachTour() {
        $home = new TourModel();
        $data = [];
        $keyword = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!empty($_POST['keyword'])) {
                $keyword['tiltle'] = $_POST['keyword'];
            }
            if(!empty($_POST['start'])) {
                $data['departurePoint'] = $_POST['start'];
            }
            if(!empty($_POST['end'])) {
                $data['destination'] = $_POST['end'];
                
            }
            if(!empty($_POST['date'])) {
                $data['start_date'] = $_POST['date'];
            }
            $page = $_GET['page'] ?? 1;
$totalPages = 1; // hoặc tính tạm, hoặc để 1 để không lỗi
            // $page = isset($_GET['page']) ? (int)$_GET['page']:1;
            // $limit = 8;
            // $offset = ($page - 1) *$limit;
            $stour = $home->seachTour1($data,$keyword);
            // $stour = $resurt['data'];
            // $totalPages = $resurt['totalPages'];
            $this->renderView('tour',[
            'stour'       => $stour,
            'page'        => $page,
            'totalPages'  => $totalPages
            ]);
        }
     }
     public function scheduleTour() {

     }
}