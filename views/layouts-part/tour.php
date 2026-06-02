<?php require 'views/part/header.php'; ?>

<section class="tour">
    <div class="container">
        <div class="tour-top row">

        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Cột trái -->
            <div class="tour-left">
                <ul>
                    <li class="tour-left-li"><a href="#">Tour trong nước</a>
                        <ul>
                            <li><a href="">Phú Quốc</a></li>
                            <li><a href="">Nha Trang</a></li>
                            <li><a href="">Đà Nẵng</a></li>
                        </ul>
                    </li>
                    <!-- <li class="tour-left-li"><a href="#">Tour ngoài nước</a>
                        <ul>
                            <li><a href="">Nhật Bản</a></li>
                            <li><a href="">Hàn Quốc</a></li>
                            <li><a href="">Trung Quốc</a></li>
                            <li><a href="">Nga</a></li>
                        </ul>
                    </li> -->
                    <li class="tour-left-li"><a href="#">Chọn mức giá</a>
                        <ul>
                            <li>2tr-5tr</li>
                            <li>5tr-7tr</li>
                            <li>7tr-10tr</li>
                        </ul>
                    </li>
                    <li class="tour-left-li"><a href="#">Điểm Khởi Hành</a></li>
                    <li class="tour-left-li"><a href="#">Điểm Đến</a></li>
                </ul>
            </div>

            <!-- Cột phải -->
            <div class="tour-right row">
                <div class="tour-right-top-item">
                    <p>Tour du lịch</p>
                </div>
                <!-- <div class="tour-right-top-item">
                    <button><span>Bộ Lọc</span><i class="fa-solid fa-arrow-down"></i></button>
                </div> -->
                <div class="tour-right-top-item">
                    <form action="index.php?controller=tour&action=short" method="POST">
                        <select name="coin" onchange="this.form.submit()">
                            <option value="">Sắp xếp</option>
                            <option value="thap">Giá thấp-cao</option>
                            <option value="cao">Giá cao-thấp</option>

                        </select>
                    </form>
                </div>

                <!-- 💥 Đây là phần hiển thị tour bằng vòng lặp -->
                <div class="tour-right-content">
                    <?php if (!empty($tours) && is_array($tours)): ?>
                    <?php foreach ($tours as $tour): ?>
                    <div class="tour-right-content-item">
                        <img src="../DA2/public/upload/<?= htmlspecialchars($tour['image']) ?>"
                            alt="<?= htmlspecialchars($tour['tiltle']) ?>" height="40%">

                        <div class="tour-khung">
                            <p>Khởi hành từ <?= htmlspecialchars($tour['departurePoint']) ?></p>

                            <h1>
                                <a href="index.php?controller=booking&action=index&id=<?= $tour['tourID'] ?>">
                                    <?= htmlspecialchars($tour['tiltle']) ?>
                                </a>
                            </h1>

                            <div class="start row">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>

                            <h4><?= number_format($tour['priceAdutls']) ?><sup>đ</sup></h4>
                            <p>Thời gian: <?= htmlspecialchars($tour['itinerary']) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php elseif (!empty($stour) && is_array($stour)): ?>
                    <?php foreach ($stour as $tour): ?>
                    <div class="tour-right-content-item">
                        <img src="../DA2/public/upload/<?= htmlspecialchars($tour['image']) ?>"
                            alt="<?= htmlspecialchars($tour['tiltle']) ?>" height="40%">

                        <div class="tour-khung">
                            <p>Khởi hành từ <?= htmlspecialchars($tour['departurePoint']) ?></p>

                            <h1>
                                <a href="index.php?controller=booking&action=index&id=<?= $tour['tourID'] ?>">
                                    <?= htmlspecialchars($tour['tiltle']) ?>
                                </a>
                            </h1>

                            <div class="start row">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>

                            <h4><?= number_format($tour['priceAdutls']) ?><sup>đ</sup></h4>
                            <p>Thời gian: <?= htmlspecialchars($tour['itinerary']) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php elseif (!empty($tourCoin) && is_array($tourCoin)): ?>
                    <?php foreach ($tourCoin as $tour): ?>
                    <div class="tour-right-content-item">
                        <img src="../DA2/public/upload/<?= htmlspecialchars($tour['image']) ?>"
                            alt="<?= htmlspecialchars($tour['tiltle']) ?>" height="40%">

                        <div class="tour-khung">
                            <p>Khởi hành từ <?= htmlspecialchars($tour['departurePoint']) ?></p>

                            <h1>
                                <a href="index.php?controller=booking&action=index&id=<?= $tour['tourID'] ?>">
                                    <?= htmlspecialchars($tour['tiltle']) ?>
                                </a>
                            </h1>

                            <div class="start row">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>

                            <h4><?= number_format($tour['priceAdutls']) ?><sup>đ</sup></h4>
                            <p>Thời gian: <?= htmlspecialchars($tour['itinerary']) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p>Chưa có tour nào được hiển thị.</p>
                    <?php endif; ?>
                </div>

                <!-- Phân trang -->
                <div class="tour-right-bottom row">
                    <div class="pagination">

                        <!-- Nút Previous -->
                        <?php if ($page > 1): ?>
                        <a href="index.php?controller=tour&action=index&page=<?= $page-1 ?>">&#171; Quay lại</a>
                        <?php endif; ?>

                        <!-- Các trang -->
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="index.php?controller=tour&action=index&page=<?= $i ?>"
                            class="<?= ($i == $page) ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                        <?php endfor; ?>

                        <!-- Nút Next -->
                        <?php if ($page < $totalPages): ?>
                        <a href="index.php?controller=tour&action=index&page=<?= $page+1 ?>">Tiếp theo &#187;</a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'views/part/footer.php'; ?>