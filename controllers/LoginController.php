<?php
// require_once 'core/baseController.php'; 
class LoginController extends baseController{
    public function index() {
        // echo Carbon\Carbon::now('Asia/Ho_Chi_Minh');
        
        $this->renderView('login', []);
    }
    public function checkLogin() {
        $userName = $_POST['username'];
        $passWord = $_POST['password'];
        $role = $_POST['role'];
        $model = new LoginModel();
        
        if($role =='admin') {
            $user = $model-> getAdmin($userName);
            //tối ưu hoạt động tài khoản sau
             if($user) {
                $userisAcvite = $model->getIsActiveAdmin($userName);
                $isActiveStatus = $userisAcvite['isActive'] ?? "0";

                if($isActiveStatus !="1" ) {
                    $error = "tài khoản đã bị khoá";
                    $this->renderView('login',[
                    'error' => $error,
                    'username_filled' => $userName // Giữ lại tên đăng nhập đã gõ
        ]);
                    exit;
                }

                $roleAdmin = $model->getIsRoleAdmin($userName);
                $resurtRoleAdmin = $roleAdmin['role'];
            }
        } else {
            //xác minh isACtive
            $user = $model->getUserName($userName);
            if($user) {
                $userisAcvite = $model->getIsActiveUser($userName);
                $isActiveStatus = $userisAcvite['isActive'] ?? "0";
                $userVerified= $model->getIsVerifiedUser($userName);
                $verified = $userVerified['verified'] ?? "0";

                if($isActiveStatus !="1" ) {
                    $error = "tài khoản đã bị khoá";
                    $this->renderView('login',[
                    'error' => $error,
                    'username_filled' => $userName // Giữ lại tên đăng nhập đã gõ
        ]);
                    exit;
                }
                if($verified !="1" ) {
                    $error = "tài khoản chưa xác thực gmail";
                    $this->renderView('login',[
                    'error' => $error,
                    'username_filled' => $userName // Giữ lại tên đăng nhập đã gõ
        ]);
                    exit;
                }
            }
        }
        
        // 2. XÁC MINH MẬT KHẨU VÀ CHUYỂN HƯỚNG
    
    // Khối này chỉ chạy nếu: (1) là Admin, HOẶC (2) là User thường VÀ đã qua kiểm tra isActive
        if($user) {
            if(password_verify($passWord,$user['passWord'])) {
                $_SESSION['user'] = $user; //** */
                
                if($role == 'admin') {
                    if($resurtRoleAdmin == '2') {
                        header("Location: index.php?controller=admin&action=admin2");
                        exit;
                    } else {
                        header("Location: index.php?controller=admin&action=tour"); //*
                        exit;
                    }
                
                } else {
                    header("Location: index.php?controller=home&action=index");
                    exit;   
                }
            } else {
                $error = "Sai mật khẩu. Vui lòng thử lại.";
            }
        } else {
            $error = "Sai tên đăng nhập.";
        }
        $this->renderView('login',[
            'error' => $error,
        'username_filled' => $userName // Giữ lại tên đăng nhập đã gõ
        ]);
    }

    public function createUser() {
         $model = new LoginModel();
         $userModel = new UserModel();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userName = $_POST['username'];
            $confirm_password = $_POST['confirm_password'];
            $password = $_POST['password'];
            $token = rand(0000,9999);
            if($password !== $confirm_password) {
                $error = "mật khẩu không khớp";
                return $this->renderView('resign', ['error' => $error]);
            }
            
            
           

            $check = $model->getUserName($userName);
            if($check) {
                $error = "Tên đăng nhập đã tồn tại!";
                return $this->renderView('resign', ['error' => $error]);
            }
            $check = $model->getUserName($userName);
            if($check) {
                $error = "Tên đăng nhập này đã có người sử dụng! Bạn có muốn <a href='index.php?controller=login&action=index'>Đăng nhập</a> không?";
                return $this->renderView('resign', ['error' => $error]);
}
            $data = [
            'userName' => $_POST['username'],
            'passWord' => $_POST['password'],
            'fullName' => $_POST['fullname'],
            'email' => $_POST['email'],
            'phoneNumber' => $_POST['numphone'],
            'address' => $_POST['address'],
            'token' => $token,
            'verified'  => 0  // Chưa xác thực
            ];
            
            $insertSuccess=$userModel->insertUser($data);
            if (!$insertSuccess) {
            $error = "Tạo tài khoản thất bại! Vui lòng thử lại.";
            return $this->renderView('resign', ['error' => $error]);
        }
            $idNewUser = $userModel->getLastIdUser(); 
            $this->checkMail($idNewUser);

            $_SESSION['success'] = "Vui lòng kiểm tra email để lấy mã xác thực!";
            header("Location: index.php?controller=login&action=verify&id=$idNewUser");
            exit;
             
        } else {
            $this->renderView('resign');
        }
    }
    public function checkMail($id = null) {
        
        $model = new UserModel();
        $data = $model->getUserById($id);
        if (!$data) return false;
        $mail = $data['email'];
        $name = $data['fullName'];
        $token = $data['token'];
        $html = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd;'>
            <h2 style='color: #e91e63;'>DU LỊCH DA2 - XÁC THỰC TÀI KHOẢN</h2>
            <p>Xin chào <strong>$name</strong>,</p>
            <p>Cảm ơn bạn đã đăng ký tài khoản tại <b>Du Lịch DA2</b>!</p>
            <p>Vui lòng nhập mã xác thực bên dưới để hoàn tất đăng ký:</p>
            <div style='text-align:center; margin:30px 0;'>
                <span style='font-size:32px; font-weight:bold; color:#d32f2f; letter-spacing:5px;'>
                    $token
                </span>
            </div>
            <p>Mã chỉ có hiệu lực trong <b>15 phút</b>.</p>
            <hr>
            <small>Nếu bạn không đăng ký, vui lòng bỏ qua email này.</small>
        </div>
    ";
        return MailHelper::send($mail, 'Mã xác thực tài khoản DA2', $html);
    }
    public function verify($id = null) {
        $id = $_GET['id'] ?? $id; 
        if (!$id) {
        die("ID không hợp lệ!");
    
    }
    $userModel = new UserModel();
    $user = $userModel->getUserById($id);

    if (!$user) {
        $error = "Tài khoản không tồn tại!";
        return $this->renderView('resign', ['error' => $error]);
    }

    // Nếu đã xác thực rồi
    if ($user['verified'] == 1) {
        $_SESSION['success'] = "Tài khoản đã được xác thực trước đó!";
        header("Location: index.php?controller=login&action=index");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $xacthuc = $_POST['token'];
        if($xacthuc === $user['token']) {
            
            $userModel->updateVerified($id,'1');

            $_SESSION['success'] = "Xác thực thành công! Bạn có thể đăng nhập ngay.";
            header("Location: index.php?controller=login&action=index");
            exit;
        } else {
            $userModel->deleteUser($id);
            $error = "Mã xác thực không đúng! Vui lòng thử lại.";
        }
    }

    $this->renderView('xacthuc', [
        'userId' => $id,
        'email'  => $user['email'],
        'error'  => $error ?? null
    ]);


}



    public function createAdmin() {
        $model = new LoginModel();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userName = $_POST['username'];
            $data = [
            'userName' => $_POST['username'],
            'passWord' => $_POST['password'],
            'email' => $_POST['email']

            ];
            
           

            $check = $model->getAdmin($userName);
            if($check) {
                $error = "Tên đăng nhập đã tồn tại!";
                return $this->renderView('resignAdmin', ['error' => $error]);
            }
            $resurt = $model->insertAdmin($data); 
            
            if($resurt) {
                $_SESSION['success'] = "Tạo tài khoản thành công!"; //88
            header("Location: index.php?controller=admin&action=Admin2");
            exit;
            } else {
                $error = "Tạo tài khoản thất bại!";
            }
             $this->renderView('resignAdmin', [
            'error' => $error,
        ]);
        } else {
            $this->renderView('resignAdmin');
        }
    }
    public function logout() {
        session_destroy();
        header("Location: index.php?controller=login&action=index");
        exit;
    }
    public function changePassword($id=null) {
        $userModel = new UserModel();
        if(!$id) {
            $_SESSION['error'] = 'không xác đinhj người dùng';
            header("location: index.php?controller=home");
            exit;
        }
        $user = $userModel->getUserById($id);

        if(!$user) {
            $_SESSION['error'] = 'người dùng không tồn tại';
            header("location: index.php?controller=home");
            exit;
        }

        $error = '';
        $success ='';
        if($_SERVER['REQUEST_METHOD'] =='POST') {
            $oldPass = $_POST['oldPass'];
            $newPass = $_POST['pass'];
            $corfimPass = $_POST['pass1'];
            if(!password_verify($oldPass,$user['passWord'])) {
                $error = 'sai mật khẩu';
            } elseif($newPass !== $corfimPass) {
                $error = 'mật khẩu không khớp';
            } elseif(strlen($newPass) < 6) {
                $error = 'mật khẩu phải ít hơn 6 số';
            } else {
                $hashedPassword = password_hash($newPass,PASSWORD_DEFAULT);
                $updatePass = $userModel->updateUser($id,[
                    'passWord' => $hashedPassword
                ]);
                if($updatePass) {
                    $_SESSION['user']['passWord'] = $updatePass;
                    $success = "Đổi mật khẩu thành công!";
                } else {
                    $error = "có lỗi xảy ra";
                }
            }
        }
        $this->renderView('changePassword',[
        'user'    => $user,
        'error'   => $error,
        'success' => $success
        ]);
    }

    

    public function xacNhanDatTour()
{
    // ... logic đặt tour xong

    $hoTen = 'Nguyễn Văn A';
    $maBooking = 'BK20251202153000';

    $html = "
        <h2>Xin chào $hoTen!</h2>
        <p>Đặt tour thành công!</p>
        <p>Mã booking: <b>$maBooking</b></p>
        <p>Chúng tôi sẽ liên hệ sớm nhất!</p>
    ";

    // GỬI MAIL CHỈ 1 DÒNG!
    $guiThanhCong = MailHelper::send(
        'khachhang@gmail.com',
        'Xác nhận đặt tour thành công - Du Lịch DA2',
        $html
        // 'path/to/voucher.pdf'  ← nếu muốn đính kèm
    );

    if ($guiThanhCong) {
        echo "Đã gửi mail xác nhận!";
    } else {
        echo "Lỗi gửi mail, nhưng đơn hàng vẫn được lưu";
    }
}


}