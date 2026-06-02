<?php
$admin = $_SESSION['user'] ?? null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="../DA2/public/asset/css/sidebar.css" />
    <link rel="stylesheet" href="../DA2/public/asset/css/admin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="admin row">
        <div class="admin-left">
            <div class="admin-logo row">
                <img src="../DA2/public/asset/img/logo.jpg" alt="" />
                <h3>ND Travel</h3>
            </div>
            <div class="anh-nen row">
                <div class="img"><img src="" alt="" /></div>
                <div class="anh-nen-conten">
                    <p>xin chào</p>
                    <h3><?= htmlspecialchars($admin['userName']) ?></h3>
                </div>
            </div>

            <div class="quan-ly">
                <p>Thanh công cụ</p>
                <div class="danh-muc">
                    <ul>
                        <li><a href="index.php?controller=admin&action=tour">quản lí tour</a></li>

                        <li><a href="index.php?controller=admin&action=user">quản lí user</a></li>
                    </ul>
                </div>
            </div>
        </div>