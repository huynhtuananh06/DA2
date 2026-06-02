<?php require __DIR__ . '/../part/header.php'; ?>

<div class="region-page">

    <!-- ẢNH LỚN -->
    <div class="region-banner" style="background-image: url('/DA2/public/asset');">
        <div class="overlay">

            <h1><?= $title ?></h1>
            <p>
                <?= $desc ?>
            </p>
        </div>
    </div>

    <!-- DANH SÁCH TOUR -->
    <div class="region-content">
        <h2>Tour du lịch: <?= $title ?></h2>

        <div class="tour-list">
            <?php if (!empty($tours)): ?>
            <?php foreach ($tours as $tour): ?>
            <div class="tour-card">
                <img src="../DA2/public/upload/<?= $tour['image'] ?>" alt="">
                <h3><?= htmlspecialchars($tour['tiltle']) ?></h3>
                <p><?= number_format($tour['priceAdutls']) ?> VNĐ</p>
                <a href="index.php?controller=booking&action=index&id=<?= $tour['tourID'] ?>">Xem chi tiết</a>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p>Chưa có tour nào.</p>
            <?php endif; ?>
        </div>
    </div>

</div>

<?php require __DIR__ . '/../part/footer.php'; ?>