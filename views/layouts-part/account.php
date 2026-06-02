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
                <td>email</td>
                <td>Số điện thoại</td>

                <td>Địa chỉ</td>



            </tr>

            <?php if(isset($user) && !empty($user)): ?>
            <tr align="center">
                <td><?= htmlspecialchars( $user['userName']) ?></td>
                <td><?= htmlspecialchars($user['fullName']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['phoneNumber']) ?></td>
                <td><?= $user['address'] ?></td>


            </tr>

            <?php else: ?>
            <tr>
                <td colspan="8">Không có tour nào</td>
            </tr>
            <?php endif; ?>




        </table>




    </div>
</div>
</div>
</body>

</html>