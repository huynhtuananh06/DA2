 <?php require __DIR__ . '/../part/slider.php' ?>
 <div class="admin-right">
     <div class="admin-right-top row">
         <p>quản lí user</p>

         <button><a href="index.php?controller=login&action=logout">đăng xuất</a></button>
     </div>
     <div class="admin-right-bottom">
         <table>
             <tr>
                 <td>ID người dùng </td>
                 <td>Họ và tên</td>
                 <td>Email</td>
                 <td>Số điện thoại</td>

                 <td>Địa chỉ</td>
                 <td>Trạng thái</td>
                 <!-- <td>status</td>
                 -nâng cao -->
                 <td>Ngày tạo</td>
                 <td>Ngày sửa</td>
                 <td>Xử lý</td>
             </tr>

             <?php if(isset($user) && !empty($user)): ?>
             <?php foreach ($user as $u): ?>
             <tr>
                 <td><?= number_format($u['userID']) ?></td>
                 <td><a
                         href="index.php?controller=booking&action=listByTour&id=<?= $tour['tourID'] ?>"><?= htmlspecialchars($u['fullName']) ?></a>
                 </td>
                 <td><?= $u['email'] ?></td>

                 <td><?= $u['phoneNumber'] ?></td>
                 <td><?= $u['address'] ?></td>
                 <td><?= $u['isActive'] ?></td>

                 <td><?= $u['createdDate'] ?></td>
                 <td><?= $u['updateDate'] ?></td>

                 <td class="xuly">
                     <label class="switch">
                         <input type="checkbox" class="toggle-active" data-user="<?= $u['userID'] ?>"
                             <?= $u['isActive'] == 1 ? 'checked' : '' ?>>
                         <span class="slider round"></span>
                     </label>
                 </td>

             </tr>
             <?php endforeach; ?>
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
 <script src="../DA2/public/asset/js/userAdmin.js"></script>

 </html>