<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compaitible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="/DA2/public/asset/css/login.css" />
    <title>Login</title>
</head>

<body>
    <header>
        <div class="header-top">
            <i class="fa-solid fa-bars"></i>
            <ul>
                <li style="--x: 1"><a href="../duan1/index.html">Trang Chủ</a></li>
                <li style="--x: 2"><a href="">Về chúng tôi</a></li>
                <li style="--x: 3"><a href="">Địa Điểm</a></li>
                <li style="--x: 4"><a href="">Lịch Sử</a></li>
                <li style="--x: 5"><a href="">Ẩm Thực</a></li>
                <li style="--x: 6"><a href="">Cộng Đồng</a></li>
                <li style="--x: 7"><a href="">Liên hệ</a></li>
            </ul>
        </div>
        <div class="video-container">
            <video src="/DA2/public/asset/img/video1.mp4" autoplay muted loop></video>
        </div>
        <div class="header-content">
            <h1>Khám phá</h1>
            <p>sách ba lô lên và đi</p>
            <form action="index.php?controller=login&action=checkLogin" method="post">
                <h1>Đăng Nhập để Trải Nghiệm</h1>
                <p>Tài Khoản</p>
                <input type="text" name="username"autocomplete="off"<?php if(isset($username_filled) && !empty($username_filled)): ?>
                    value="<?= $username_filled ?>" <?php endif; ?> />
                <p>Mật Khẩu</p>
                <input type="password" name="password" />
                <div class="phanquyen">
    <input type="radio" name="role" value="user" id="user_role" checked /> 
    <label for="user_role">User</label>

    <input type="radio" name="role" value="admin" id="admin_role" /> 
    <label for="admin_role">Admin</label>
</div>
                <div class="dangnhap">
                    <button type="submit">
                        Đăng Nhập
                    </button>
                    <button><a href="index.php?controller=login&action=createUser">Đăng kí</a></button>
                </div>

            </form>

            <?php if(isset($error) && !empty($error)): ?>
            <p><?= $error ?></p>
            <?php endif; ?>
        </div>
    </header>

    <script src="/DA2/public/asset/js/header.js"></script>
</body>

</html>