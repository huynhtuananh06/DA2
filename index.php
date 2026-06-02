<?php
// BẮT BUỘC: Bắt đầu session ngay tại đây để $_SESSION hoạt động
session_start();
require_once 'configs/config.php';
require_once 'configs/database.php';
require_once 'core/coreModel.php';
foreach(glob(__DIR__.'/models/*.php') as $fileItems){
    require_once $fileItems;
}
require_once 'core/baseController.php';
foreach(glob(__DIR__.'/controllers/*.php') as $fileItems){
    require_once $fileItems;
}
// require_once 'controllers/TourController.php';
require_once 'core/router.php';
require_once __DIR__ . '/vendor/autoload.php';