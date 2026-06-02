<?php require 'views/part/header.php' ?>

<section class="booking">
    <div class="container">
        <div class="booking-top row">
            <!-- <p>trang chủ</p>
            <span>&#8594;</span>
            <p>tour du lịch</p>
            <span>&#8594;</span>
            <p>tour du lịch</p> -->


        </div>

        <div class="booking-content row">
            <div class="booking-content-left">
                <div class="booking-content-left-big-img">
                    <img src="../DA2/public/upload/<?= htmlspecialchars($tour['image']) ?>" alt="" />
                </div>
                <div class="booking-content-left-small-img row">
                    <?php if(!empty($image)) :?>
                    <img src="../DA2/public/upload/<?= htmlspecialchars($tour['image']) ?>" alt="" />
                    <?php foreach($image as $img):?>
                    <img src="../DA2/public/upload/<?= htmlspecialchars($img['imageURL'])?>" alt="">
                    <?php endforeach;?>
                    <?php else:?>
                    <p>Tour này chưa có ảnh</p>
                    <?php endif;?>
                </div>

                <div class="booking-content-left-bottom">
                    <div class="booking-content-left-bottom-top">&#8744;</div>

                    <div class="booking-content-left-bottom-content-big">
                        <div class="booking-content-left-bottom-content-title row">
                            <div class="booking-content-left-bottom-content-title-item mota tab-item active"
                                data-tab="mota">
                                <p>Mô tả</p>
                            </div>
                            <div class="booking-content-left-bottom-content-title-item lichtrinh tab-item"
                                data-tab="lichtrinh">
                                <p>Lịch trình</p>
                            </div>
                            <div class="booking-content-left-bottom-content-title-item vitri tab-item" data-tab="vitri">
                                <p>Vị trí</p>
                            </div>
                            <div class="booking-content-left-bottom-content-title-item danhgia tab-item"
                                data-tab="danhgia">
                                <p>Đánh giá tour</p>
                            </div>
                        </div>

                        <div class="booking-content-left-bottom-content">
                            <div class="booking-content-left-bottom-content-mota tab-content" id="mota">
                                <p><?= htmlspecialchars($tour['description'])?></p>
                            </div>
                            <div class="booking-content-left-bottom-content-lichtrinh tab-content" id="lichtrinh"
                                style="display: none;">
                                <p><?= htmlspecialchars($tour['itinerary'])?></p>
                                <!--- dùng vòng lặp để cách xuống hàng demo thôi -->
                            </div>
                            <div class="product-content-left-bottom-content-vitri tab-content" id="vitri"
                                style="display: none;">
                                <p><?= htmlspecialchars($tour['destination'])?></p>
                            </div>
                            <div class="product-content-left-bottom-content-danhgia tab-content" id="danhgia"
                                style="display: none;">
                                <div class="review-danhgia">
                                    <!-- Sửa phần hiển thị review -->
                                    <?php if (!empty($review) && is_array($review)): ?>
                                    <?php foreach ($review as $reviewI): ?>
                                    <?php if (isset($reviewI['comment'])): ?>
                                    <div class="hienthi-review row">
                                        <img src="../DA2/public/asset/img/8.jpg" alt="">
                                        <div class="hienthi-review-text">
                                            <p><?= htmlspecialchars($reviewI['comment']) ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <div class="hienthi-review row">
                                        <img src="../DA2/public/asset/img/8.jpg" alt="">
                                        <div class="hienthi-review-text">
                                            <p>Chưa có đánh giá nào cho tour này.</p>
                                        </div>
                                    </div>
                                    <?php endif; ?>





                                    <div class="binhluan row">
                                        <img src="../DA2/public/asset/img/8.jpg" alt="">
                                        <form action="index.php?controller=booking&action=addTest" method="POST">
                                            <input type="hidden" name="action_type" value="review">
                                            <input type="hidden" name="tourID"
                                                value="<?= htmlspecialchars($tour['tourID']) ?>">
                                            <input type="text" name="binhluan">
                                            <button type="submit">Gửi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="booking-content-right">
                <form id="booking-form" action="index.php?controller=booking&action=addTest" method="POST">
                    <input type="hidden" name="action_type" value="booking">
                    <input type="hidden" name="tourID" value="<?= htmlspecialchars($tour['tourID']) ?>">
                    <div class="content-top">
                        <h4><?= htmlspecialchars($tour['tiltle']) ?></h4>
                        <p><span>Mã tour:</span> <?= $tour['tourID'] ?></p>
                    </div>

                    <div class="ngaygio row">
                        <i class="fa-solid fa-calendar-days"></i>
                        <select name="schedule" id="">
                            <option value="">Lịch khởi hành</option>
                            <?php foreach ($schedule as $s): ?>
                            <option value="<?=  $s['scheduleID'] ?>"><?=  $s['start_date']?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="ticket">
                        <h4></h4>
                        <div class="ticket-nguoilon row">
                            <h4>Người lớn</h4>
                            <input type="number" min=0 id="so-luong-nguoi-lon" value="0" name="numAdutls">
                            <p data-price="<?= $tour['priceAdutls'] ?? 0 ?>">
                                <?= number_format($tour['priceAdutls'] ?? 0) ?><sup>đ</sup></p>
                        </div>
                        <div class="ticket-treem row">
                            <h4>trẻ em</h4>
                            <input type="number" min=0 id="so-luong-tre-em" value="0" name="numChildren">
                            <p data-price="<?= $tour['priceChildren'] ?? 0 ?>">
                                <?= number_format($tour['priceChildren'] ?? 0) ?><sup>đ</sup></p>
                        </div>
                    </div>
                    <div class="total row">
                        <h4>Tổng tiền</h4>
                        <p id="tong-tien">0<sup>đ</sup></p>

                    </div>

                    <div class="total row">
                        <h4>Yêu cầu</h4>
                        <textarea name="specialRequest"></textarea>

                    </div>

                    <div class="total-button row">
                        <button type="submit">Đăt vé</button>
                        <button><a href="">Liên hệ tư vấn</a></button>
                    </div>
                </form>
            </div>
        </div>


</section>


<?php require 'views/part/footer.php' ?>