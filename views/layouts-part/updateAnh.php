<form action="index.php?controller=img&action=updateAnh&id=<?= $tourID ?>" method="POST" enctype="multipart/form-data">

    <?php for($i=1; $i<=4; $i++): ?>
    <div class="mb-3">
        <?php if(!empty($img['img'.$i])): ?>
        <img src="public/upload/<?= htmlspecialchars($img['img'.$i]) ?>" width="200"
            style="margin:10px 0; border:2px solid #007bff;">
        <p><small>Đang dùng: <?= htmlspecialchars($img['img'.$i]) ?></small></p>
        <input type="hidden" name="old_img<?= $i ?>" value="<?= htmlspecialchars($img['img'.$i]) ?>">
        <?php else: ?>
        <p><em>Chưa có ảnh</em></p>
        <?php endif; ?>

        <input type="file" name="img<?= $i ?>" accept="image/*" class="form-control">
        <small class="text-muted">Để trống = giữ nguyên ảnh cũ</small>
    </div>
    <?php endfor; ?>

    <button type="submit" class="btn btn-success">Cập nhật ảnh</button>
    <a href="index.php?controller=admin&action=tour" class="btn btn-secondary">Quay lại</a>
</form>