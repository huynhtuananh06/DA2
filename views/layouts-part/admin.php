<?php require __DIR__ . '/../part/slider.php' ?>
<div class="admin-right">
    <div class="admin-right-top row">
        <p>Quản lí tour</p>

        <button><a href="index.php?controller=login&action=logout">Đăng xuất</a></button>
    </div>
    <div class="admin-right-bottom">
        <table>
            <tr>
                <td>Id</td>
                <td>Tiêu đề</td>
                <td>Số lượng</td>
                <td>Điểm đi</td>
                <td>Điểm đến</td>

                <td>Trạng thái</td>
                <td colspan="4">Xử lý</td>
            </tr>

            <?php if(isset($tours) && !empty($tours)): ?>
            <?php foreach ($tours as $tour): ?>
            <tr>
                <td><?= number_format($tour['tourID']) ?></td>
                <td><a
                        href="index.php?controller=booking&action=listBySchedule&id=<?= $tour['tourID'] ?>"><?= htmlspecialchars($tour['tiltle']) ?></a>
                </td>
                <td><?= number_format($tour['quantity']) ?></td>
                <td><?= $tour['departurePoint'] ?></td>
                <td><?= $tour['destination'] ?></td>
                <td><?= htmlspecialchars($tour['availability']) ?></td>

                <td class="xuly"><a href="index.php?controller=img&action=updateAnh&id=<?= $tour['tourID'] ?>">Update
                        ảnh</a>
                </td>
                <td class="xuly"><a
                        href="index.php?controller=admin&action=tourDelete&id=<?= $tour['tourID'] ?>">Xoá</a>
                    <!---->
                </td>
                <td class="xuly"><a href="index.php?controller=admin&action=editTour&id=<?= $tour['tourID'] ?>">Sửa</a>
                    <!---->
                </td>
                <td class="xuly"><a href="index.php?controller=admin&action=editTour&id=<?= $tour['tourID'] ?>">Mở
                        tour</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="8">Không có tour nào</td>
            </tr>
            <?php endif; ?>
        </table>
        <div class="nut-them">
            <a href="index.php?controller=admin&action=themTour">Thêm</a>
            <!---->
        </div>
    </div>
</div>
</div>
</body>

</html>