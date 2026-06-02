 <?php require __DIR__ . '/../part/slider.php' ?>
 <div class="admin-right">
     <div class="admin-right-top row">
         <p>Danh sách vé tour: <?= htmlspecialchars($tour['tiltle']) ?> </p>

         <button><a href="index.php?controller=login&action=logout">Đăng xuất</a></button>
     </div>
     <div class="admin-right-bottom">
         <table>
             <tr>
                 <td>lịch tour đi</td>
                 <td>số lượng vé</td>
                 <td>trạng thái tour</td>
             </tr>

             <?php if (!empty($schedule)): ?>
             <?php foreach ($schedule as $b): ?>
             <tr>
                 <td><a
                         href="index.php?controller=booking&action=listByTour&id=<?= $b['scheduleID'] ?>"><?= $b['start_date'] ?></a>
                 </td>
                 <td><?= $b['max_slots'] ?></td>
                 <td><?= $b['available_slots']  ?></td>
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