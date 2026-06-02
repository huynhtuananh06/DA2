 <?php require __DIR__ . '/../part/sliderA.php' ?>
 <div class="admin-right">
     <div class="admin-right-top row">
         <p>Quản lí Admin</p>

         <button><a href="index.php?controller=login&action=logout">Đăng xuất</a></button>
     </div>
     <div class="admin-right-bottom">
         <table>
             <tr>
                 <td>Tên đăng nhập</td>
                 <td>Quyền hạn</td>
                 <td>Trạng thái</td>
                 <td>Email</td>

                 <td>Ngày tạo</td>
                 <td>Xử lý</td>
                 <td>Quyền hạn</td>
             </tr>

             <?php if(isset($admin) && !empty($admin)): ?>
             <?php foreach ($admin as $a): ?>
             <tr>
                 <td><?= $a['userName'] ?></td>
                 <td><?= $a['role'] ?></td>
                 <td><?= $a['isActive'] ?></td>
                 <td><?= $a['email'] ?></td>
                 <td><?= $a['createdDate'] ?></td>

                 <td class="xuly">
                     <label class="switch">
                         <input type="checkbox" class="toggle-active" data-user="<?= $a['adminID'] ?>"
                             <?= $a['isActive'] == 1 ? 'checked' : '' ?>>
                         <span class="slider round"></span>
                     </label>
                 </td>
                 <td class="xuly">
                     <label class="switch">
                         <input type="checkbox" class="toggle" data-user="<?= $a['adminID'] ?>"
                             <?= $a['role'] == 2 ? 'checked' : '' ?>>
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
 <script src="/DA2/public/asset/js/adminButton.js"></script>

 </html>