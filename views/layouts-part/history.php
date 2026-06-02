<?php require __DIR__ . '/../part/sliderH.php' ?>
<div class="admin-right">
    <div class="admin-right-top row">
        <p>Lịch sử đặt tour</p>
        <button><a href="index.php?controller=home&action=index">Trangchủ</a></button>
        <button><a href="index.php?controller=login&action=logout">Đăng xuất</a></button>
    </div>
    <div class="admin-right-bottom">
        <table>

            <tr align="center">
                <td>Tên tour</td>
                <td>Họ và tên</td>
                <td>Số người lớn</td>
                <td>Số trẻ em</td>

                <td>Tổng giá tiền</td>
                <td>Trạng thái vé</td>
                <td colspan="2">Xử lý</td>


            </tr>

            <tr class="section-title paid">
                <td colspan="8">Vé đã thanh toán
                </td>
            </tr>

            <?php if(isset($Confirmed) && !empty($Confirmed)): ?>
            <?php foreach ($Confirmed as $com): ?>
            <tr>

                <td><?= htmlspecialchars($com['tour']['tiltle']) ?></td>
                <td><?= htmlspecialchars($user['fullName']) ?></td>
                <td><?= htmlspecialchars($com['numAdutls']) ?></td>
                <td><?= htmlspecialchars($com['numChildren']) ?></td>
                <td><?= number_format($com['totalPrice']) ?></td>
                <td><?= htmlspecialchars($com['bookingStatus']) ?></td>

                <td>Momo đã thanh toán</td>

                <td class="xuly">
                    <a href="index.php?controller=booking&action=Cancel&id=<?= $com['bookingID'] ?>">Huỷ vé</a>
                </td>

            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="8">Không có vé nào</td>
            </tr>
            <?php endif; ?>
            <tr class="section-title unpaid">
                <td colspan="8">vé chưa thanh toán
                </td>
            </tr>

            <?php if(isset($cash) && !empty($cash)): ?>
            <?php foreach ($cash as $com): ?>
            <tr>

                <td><?= htmlspecialchars($com['tour']['tiltle']) ?></td>
                <td><?= htmlspecialchars($user['fullName']) ?></td>
                <td><?= htmlspecialchars($com['numAdutls']) ?></td>
                <td><?= htmlspecialchars($com['numChildren']) ?></td>
                <td><?= number_format($com['totalPrice']) ?></td>
                <td><?= htmlspecialchars($com['bookingStatus']) ?></td>

                <td class="xuly">
                    tiền mặt chưa thanh toán
                </td>
                <td class="xuly">
                    <a href="index.php?controller=booking&action=Cancel&id=<?= $com['bookingID'] ?>">Huỷ vé</a>
                </td>

            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="8">Không có vé nào</td>
            </tr>
            <?php endif; ?>

            <tr class="section-title cancel">
                <td colspan="8">vé đã huỷ</td>
            </tr>

            <?php if(isset($cancel) && !empty($cancel)): ?>
            <?php foreach ($cancel as $com): ?>
            <tr>

                <td><?= htmlspecialchars($com['tour']['tiltle']) ?></td>
                <td><?= htmlspecialchars($user['fullName']) ?></td>
                <td><?= htmlspecialchars($com['numAdutls']) ?></td>
                <td><?= htmlspecialchars($com['numChildren']) ?></td>
                <td><?= number_format($com['totalPrice']) ?></td>
                <td><?= htmlspecialchars($com['bookingStatus']) ?></td>

                <td colspan="2">đã huỷ vé</td>



            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="8">Không có vé nào</td>
            </tr>
            <?php endif; ?>

        </table>




    </div>
</div>
</div>
</body>

</html>