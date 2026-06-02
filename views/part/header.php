<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ND Travel</title>
    <link rel="stylesheet" href="../DA2/public/asset/css/header.css" />
    <link rel="stylesheet" href="../DA2/public/asset/css/home1.css" />
    <link rel="stylesheet" href="../DA2/public/asset/css/region.css" />

    <link rel="stylesheet" href="../DA2/public/asset/css/tour.css" />
    <link rel="stylesheet" href="../DA2/public/asset/css/booking.css" />


    <link rel="stylesheet" href="../DA2/public/asset/css/footer.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <header>
        <figure class="logo row">
            <a href="/">
                <img src="../DA2/public/asset/img/logo.jpg" alt="ND Travel Logo" />
            </a>
            <figcaption>ND Travel</figcaption>
        </figure>

        <nav class="menu">
            <ul>
                <li><a href="index.php?controller=home&action=index">Trang Chủ</a></li>
                <li><a href="index.php?controller=home&action=gioithieu">Giới Thiệu</a></li>

                <li>
                    <a href="index.php?controller=tour&action=index">Tour Du Lịch</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="">tour trong nước</a>
                            <ul>
                                <li><a href="">Bắc Bộ</a></li>
                                <li><a href="">Trung bộ</a></li>
                                <li><a href="">Nam bộ</a></li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="">tour nước ngoài</a>
                            <ul>
                                <li><a href="">Bắc Trung Bộ</a></li>
                                <li><a href="">Trung bộ</a></li>
                                <li><a href="">Nam Trung bộ</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </li>

                <li><a href="">liên hệ</a></li>
            </ul>
        </nav>

        <div class="other row">
            <form class="search-form" role="search" action="index.php?controller=tour&action=seachTour" method="POST">
                <input type="text" placeholder="Tìm kiếm..." name="keyword" />
                <button type="submit" aria-label="Tìm kiếm">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <nav class="user-utility-nav">
                <ul>
                    <li>
                        <a class="fa-solid fa-clock-rotate-left"
                            href="index.php?controller=booking&action=bookingHistory" title="Lịch sử xem"></a>
                    </li>
                    <li>
                        <a class="fa-solid fa-user" href="index.php?controller=user&action=index" title="Tài khoản"></a>
                    </li>
                    <li>
                        <a class="fa-solid fa-basket-shopping" href="#" title="Giỏ hàng"></a>
                    </li>
                    <li>
                        <a class="fa-solid fa-power-off" href="index.php?controller=login&action=logout"
                            title="Đăng xuất"></a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>