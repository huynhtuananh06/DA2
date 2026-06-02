<?php
// require_once 'models/HomeModel.php';
// require_once 'core/baseController.php';

class HomeController extends baseController{
    public function index() {
        $model = new HomeModel();
        $home = $model->getAllTour();
        $today = date('Y-m-d',strtotime('+1 day'));
        
        $this->renderView('home', ['home' => $home,'today'=> $today]);
    }

    public function success() {
        $checkmodel = new CheckoutModel();
        $bookingModel = new BookingModel();
        $resultCode = $_GET['resultCode'] ?? null;
        $bookingID = $_GET['extraData'] ?? null;
        if($resultCode == 0) {
            $data = [
                'bookingID' => $bookingID,
                'payMethod' => 'momo',
                'payStatus' => 1,
                'amount' => $_GET['amount'] ?? 0,
                'transactionID' => $_GET['transId'] ?? 0
            ];
            $checkmodel->insertCheckOut($data);
            $bookingModel->updateStatus($bookingID, 'Confirmed');
            $this->renderView('camon',[]);
        } else {
            $this->renderView('tour');
            die();
        }
    }
     public function success1() {
        $this->renderView('camon',[]);
     } 
     public function gioithieu() {
        $this->renderView('gioithieu',[]);
     }

     public function detail($name) {
         $slug = $name;
        $region = [
  'tay-bac-bo' => [
    'title' => 'Tây Bắc Bộ',
    'banner' => 'tbb.jpg',
    'desc' => 'Tây Bắc Bộ nổi tiếng với ruộng bậc thang, núi rừng và văn hoá dân tộc.'
  ],
  'dong-bac-bo' => [
    'title' => 'Đông Bắc Bộ',
    'banner' => 'dbb.jpg',
    'desc' => 'Đông Bắc Bộ có nhiều danh thắng thiên nhiên và di tích lịch sử.'
  ],
  'dong-bang-song-hong' => [
    'title' => 'Đồng bằng sông Hồng',
    'banner' => 'dbsh.jpg',
    'desc' => 'Vùng đất lâu đời với nền văn minh lúa nước.'
  ],
  'dong-nam-bo' => [
    'title' => 'Đông Nam Bộ',
    'banner' => 'dnb.webp',
    'desc' => 'Vùng kinh tế trọng điểm phía Nam.'
  ],
  'dong-bang-song-cuu-long' => [
    'title' => 'Đồng bằng sông Cửu Long',
    'banner' => 'dbscl.jpg',
    'desc' => 'Vùng sông nước trù phú, vựa lúa lớn nhất Việt Nam.'
  ],
  'tay-nguyen-trung-bo' => [
    'title' => 'Tây Nguyên – Trung Bộ',
    'banner' => 'mttn.jpg',
    'desc' => 'Vùng đất cao nguyên, biển xanh và văn hoá đặc trưng.'
  ],
];
         
         if(!isset($region[$slug])) {
            die("vùng không tồn tại");
         }

          $regionName = $region[$slug];

          $tourModel = new TourModel();
          $tours = $tourModel->getTourByRegion($regionName['title']);

        $this->renderView('region', [
            'tours' => $tours,
            'title' => $regionName['title'],
            'img' => $regionName['banner'],
            'desc' => $regionName['desc']
        ]);
     }


     
    
}