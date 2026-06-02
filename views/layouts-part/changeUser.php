<?php require __DIR__ . '/../part/sliderU.php' ?>

<div class="admin-right">
    <div class="admin-right-top row">
        <p>Tài Khoản</p>
        <button><a href="index.php?controller=home&action=index">Trangchủ</a></button>
        <button><a href="index.php?controller=login&action=logout">Đăng xuất</a></button>
    </div>
    <div class="admin-right-bottom">
        <table>

            <tr align="center">
                <td>Tên đăng nhập</td>
                <td>Họ và tên</td>
                <td>Email</td>
                <td>Số điện thoại</td>

                <td>Địa chỉ</td>
                <td>Sửa thông tin</td>



            </tr>

            <?php if(isset($user) && !empty($user)): ?>


            <form action="index.php?controller=user&action=updateUser&id=<?= $user['userID'] ?>" method="POST">
                <tr align="center">
                    <td><?= htmlspecialchars( $user['userName']) ?></td>

                    <td><input type="text" value="<?= htmlspecialchars( $user['fullName']) ?>" name="name"
                            class="input-admin"></td>
                    <td><input type="text" value="<?= htmlspecialchars( $user['email']) ?>" name="email"></td>
                    <td><input type="text" value="<?= htmlspecialchars( $user['phoneNumber']) ?>" name="phone"></td>
                    <td><input type="text" value="<?= htmlspecialchars( $user['address']) ?>" name="address"></td>
                    <td><button type="submit" class="btn btn-secondary">Thay đổi</button></td>
                </tr>
            </form>





            <?php else: ?>
            <tr>
                <td colspan="8">Không có tour nào</td>
            </tr>
            <?php endif; ?>




        </table>
        <a href="index.php?controller=login&action=changePassword&id=<?= $user['userID'] ?>">Đổi mật khẩu</a>




    </div>
</div>
</div>
</body>

</html>