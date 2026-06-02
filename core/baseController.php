<?php
if(!defined('_luan')) {
    die('truy cập không hợp lệ');
 }
require_once __DIR__ . '/../helpers/MailHelper.php';
 class baseController{
    //view đường dẫn đến view, data dữ liệu lấy được từ SQL
    protected function renderView($view,$data=[]){
        extract($data); //*** biến db biến các cột thành dạng mảng chi nhỏ các mảng ra thành biến vd $name hàm sử dụng ở mảng 1 chiều

        require_once 'views/layouts-part/'.$view.'.php'; 
        
    }
 }