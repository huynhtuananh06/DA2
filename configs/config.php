<?php
//truy cap hop le
use Carbon\Carbon;

const _luan=true;
//khai bao SQL
const _HOST = 'localhost';
const _DB = 'dulichdemo'; 
const _USER = 'root';
const _PASS ='';
const _DRIVER = 'mysql';

// === SỬA DÒNG NÀY: Dùng __DIR__ để tự lấy đường dẫn hiện tại ===
$config['composer_autoload'] = dirname(__DIR__) . '/vendor/autoload.php';

// === TỰ ĐỘNG NẠP COMPOSER ===
if (file_exists($config['composer_autoload'])) {
    require_once $config['composer_autoload'];
} else {
    // Hiện thông báo lỗi chi tiết hơn để dễ kiểm tra
    die('LỖI: Không tìm thấy file vendor/autoload.php tại: ' . $config['composer_autoload']);
}