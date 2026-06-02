 <?php require __DIR__ . '/../part/slider.php' ?>
 <div class="admin-right">
     <div class="admin-right-top row">
         <p>Danh sách vé tour: <?= htmlspecialchars($tour['tiltle']) ?> : <?= $date ?></p>

         <button><a href="index.php?controller=login&action=logout">Đăng xuất</a></button>
     </div>
     <div class="admin-right-bottom">
         <table>
             <tr>
                 <td>Người đặt</td>
                 <td>Sô điện thoại</td>
                 <td>Email</td>
                 <td>Số người lớn</td>
                 <td>Số trẻ em</td>

                 <td>Tổng giá tiền</td>
                 <td>Ngày tạo</td>
                 <td>Trạng thái</td>
                 <td>Yêu cầu người dùng</td>
                 <td>Chi tiết</td>
             </tr>

             <?php if (!empty($bookings)): ?>
             <?php foreach ($bookings as $b): ?>
             <tr>
                 <td><?= $b['fullName'] ?></td>
                 <td><?= $b['phoneNumber'] ?></td>
                 <td><?= $b['email']  ?></td>
                 <td><?= $b['numAdutls'] ?></td>
                 <td><?= $b['numChildren'] ?></td>
                 <td><?= $b['totalPrice'] ?></td>
                 <td><?= $b['bookingDate'] ?></td>
                 <td><?= $b['bookingStatus'] ?></td>
                 <td><?= $b['specialRequest'] ?></td>
                 <td>
                     <a href="index.php?controller=booking&action=bookingDetails&id=<?= $b['bookingID'] ?>">Chi tiết</a>
                 </td>
             </tr>
             <?php endforeach; ?>
             <?php else: ?>
             <tr>
                 <td colspan="7">Tour này chưa có ai đặt</td>
             </tr>
             <?php endif; ?>
         </table>
     </div>
 </div>
 </div>
 </body>

 </html>