<?php
require_once 'core/baseController.php';

class UserController extends baseController {
    public function index() {
        $UserModel = new UserModel();
        $currentUser = $_SESSION['user'];
        $UserID = $currentUser['userID'];
        $data = $UserModel->getUserById($UserID);
        $this->renderView('account',['user'=>$data]);
    }


    public function updateUser($id=null) {
        $UserModel =new UserModel();
        $userID = $id;
        $user= $UserModel->getUserById($userID);

        if($_SERVER['REQUEST_METHOD']=='POST') {
            $data = [
                'fullName' => $_POST['name'],
                'email' => $_POST['email'],
                'phoneNumber' => $_POST['phone'],
                'address' => $_POST['address']
            ];

            $UserModel->updateUser($userID,$data);
            $user = $UserModel->getUserById($userID);
            $_SESSION['user'] = $user;
            $this->renderView('changeUser',['user'=>$user]);
            exit();
        }

        $this->renderView('changeUser',['user'=>$user]);

    }
    
    
}