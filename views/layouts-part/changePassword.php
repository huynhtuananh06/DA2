<h2>Đổi mật khẩu</h2>

<!-- Hiển thị thông báo thành công (xanh) -->
<?php if (!empty($success)): ?>
<div style="color: green; background:#d4edda; padding:10px; border-radius:5px; margin:10px 0;">
    <?= htmlspecialchars($success) ?>
</div>
<?php endif; ?>

<!-- Hiển thị lỗi (đỏ) -->
<?php if (!empty($error)): ?>
<div style="color: red; background:#f8d7da; padding:10px; border-radius:5px; margin:10px 0;">
    <?= htmlspecialchars($error) ?>
</div>
<?php endif; ?>

<!-- Form đổi mật khẩu -->
<form action="index.php?controller=login&action=changePassword&id=<?= $user['userID'] ?>" method="POST">

    <!-- Truyền ID người dùng (không truyền userName vì không cần thiết + dễ fake) -->
    <input type="hidden" name="id" value="<?= $user['userID'] ?>">

    <div style="margin:15px 0;">
        <label>Mật khẩu cũ:</label><br>
        <input type="password" name="oldPass" required style="padding:8px; width:300px;">
    </div>

    <div style="margin:15px 0;">
        <label>Mật khẩu mới:</label><br>
        <input type="password" name="pass" required minlength="6" style="padding:8px; width:300px;">
    </div>

    <div style="margin:15px 0;">
        <label>Nhập lại mật khẩu mới:</label><br>
        <input type="password" name="pass1" required style="padding:8px; width:300px;">
    </div>

    <button type="submit"
        style="padding:10px 20px; background:#007bff; color:white; border:none; border-radius:5px; cursor:pointer;">
        Đổi mật khẩu
    </button>
    <button type="submit"
        style="padding:10px 20px; background:#007bff; color:white; border:none; border-radius:5px; cursor:pointer;">
        <a href="index.php?controller=user&action=index">Quay lại</a>
    </button>
</form>