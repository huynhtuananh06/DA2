<?php

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


// require_once 'models/CheckoutModel.php';
// require_once 'core/baseController.php';
class CheckoutController extends baseController
{
    public function index()
    {
        if (!isset($_SESSION['booking'])) {
            $_SESSION['error'] = "không tìm thấy đơn đạ hàng";
            header("Location: index.php?controller=tour&action=list"); //sửa sau
            exit();
        }

        $bookingID = $_SESSION['booking']['bookingID'];
        $total = $_SESSION['booking']['totalPrice'];
        $bookingModel = new BookingModel();
        $booking = $bookingModel->getBookingById($bookingID);
        $data = [
            'bookingID' => $bookingID,
            'amount' => $total,
            'booking' => $booking
        ];

        // Lấy thông tin booking + kiểm tra còn hạn không
        // $booking = $bookingModel->getBookingByCode($bookingCode);

        // if (!$booking || $booking['expires_at'] <= date('Y-m-d H:i:s')) {
        //     unset($_SESSION['temp_booking']);
        //     $_SESSION['error'] = "Đơn hàng đã hết hạn thanh toán!";
        //     header("Location: index.php?controller=tour&action=list");
        //     exit();
        // }

        $this->renderView('checkout', ['check' => $data]);
    }



    public function addCheckOut()
    {
        $checkmodel = new CheckoutModel();
        $bookingModel = new BookingModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $method = $_POST['method'] ?? null;
            $bookingID = $_POST['bookingID'];

            if ($method === null) {
                echo "rỗng";
                die();
            }
            if ($method === 'tiền mặt') {
                $paymethod = 'cash';
                $trandID = time();
                $data = [
                    'bookingID' => $bookingID,
                    'payMethod' => $paymethod,
                    'payStatus' => 0,
                    'amount'    => $_POST['total'],
                    'transactionID' => $trandID
                ];

                $checkmodel->insertCheckOut($data);
                $bookingModel->updateStatus($bookingID, 'cash');
                unset($_SESSION['booking']);
                header("location: index.php?controller=home&action=success1");
            } 
        else if ($method === 'Thanh Toán MOMO') {

                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

                $partnerCode = 'MOMOBKUN20180529';
                $accessKey   = 'klm05TvNBzhg7h7j';
                $secretKey   = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                $orderInfo   = "Thanh toán qua MoMo";
                $amount      = (int)$_POST['total'];

                $orderId     = time() . "";
                $requestId   = time() . "";
                $extraData   = $bookingID;

                $redirectUrl = "http://localhost:8080/index.php?controller=home&action=success1";
                $ipnUrl      = $redirectUrl;

                $requestType = "captureWallet";

                $rawHash = "accessKey=$accessKey&amount=$amount&extraData=$extraData&ipnUrl=$ipnUrl&orderId=$orderId&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=$requestId&requestType=$requestType";

                $signature = hash_hmac("sha256", $rawHash, $secretKey);

                $data = [
                    'partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    'storeId'     => "MomoTestStore",
                    'requestId'   => $requestId,
                    'amount'      => $amount,
                    'orderId'     => $orderId,
                    'orderInfo'   => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl'      => $ipnUrl,
                    'lang'        => 'vi',
                    'extraData'   => $extraData,
                    'requestType' => $requestType,
                    'signature'   => $signature
                ];

                $result     = execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);

                if (isset($jsonResult['payUrl']) && $jsonResult['resultCode'] == 0) {
                    header('Location: ' . $jsonResult['payUrl']);
                    exit();
                } else {
                    echo "<pre>";
                    print_r($jsonResult);
                    echo "</pre>";
                    exit("LỖI MOMO: " . ($jsonResult['message'] ?? 'Không xác định'));
                }
            } 
        else {
                header('Content-type: text/html; charset=utf-8');



                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                $orderInfo = "Thanh toán qua MoMo";
                $amount = $_POST['total'];
                $orderId = time() . "";
                $redirectUrl = "http://localhost:8080/index.php?controller=home&action=success"; //trả vể trang muốn trả
                $ipnUrl = "http://localhost:8080/index.php?controller=home&action=success";
                $extraData = $bookingID;




                $requestId = time() . "";

                $requestType = "payWithATM";
                // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                //before sign HMAC SHA256 signature
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $secretKey);
                $data = array(
                    'partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature
                );
                $result = execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json

                //Just a example, please check more in there

                if (isset($jsonResult['payUrl']) && $jsonResult['resultCode'] == 0) {
                    // THÀNH CÔNG: Chuyển hướng đến URL thanh toán
                    header('Location: ' . $jsonResult['payUrl']);
                    exit; // Luôn dùng exit sau header
                } else {
                    // THẤT BẠI: Xử lý lỗi

                    // Lấy thông báo lỗi cụ thể từ Momo nếu có
                    $errorMessage = $jsonResult['message'] ?? "Lỗi không xác định khi liên kết với MoMo.";

                    // Ghi log để debug (Rất quan trọng)
                    error_log("MoMo API Error. OrderID: " . $orderId . ". Response: " . print_r($jsonResult, true));

                    // Chuyển hướng về trang lỗi hoặc hiển thị lỗi
                    echo "lỗi API";
                    // header("location: index.php?controller=checkout&action=paymentError&message=" . urlencode($errorMessage));
                    exit;
                }
         
           }
        }
        
    }
}
