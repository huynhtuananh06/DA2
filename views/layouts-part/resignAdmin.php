<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compaitible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="/public/asset/css/login.css" />
    <title>Resign</title>
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
            <video src="/public/asset/img/video1.mp4" autoplay muted loop></video>
        </div>
        <div class="header-content">
            <h1>Khám phá</h1>
            <p>sách ba lô lên và đi</p>
            <form action="index.php?controller=login&action=createAdmin" method="POST">
                <h1>Tạo tài khoản admin</h1>
                <p>Tài Khoản</p>
                <input type="text" name="username" />
                <p>Mật Khẩu</p>
                <input type="password" name="password" />
                <p>Xác Nhận Mật Khẩu</p>
                <input type="password" />
                <p>Email</p>
                <input type="email" name="email" />


                <button type="submit">
                    Đăng Ký
                </button>
            </form>
        </div>
    </header>
    <script src="script.js"></script>
</body>

</html>