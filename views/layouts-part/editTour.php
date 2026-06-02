 <?php require __DIR__ . '/../part/slider.php' ?>

 <div class="admin-right">
     <div class="admin-right-top row">
         <p>Quản lí tour</p>

         <button>Đăng xuất</button>
     </div>
     <div class="form-right-bottom">
         <form action="index.php?controller=admin&action=editTour&id=<?= $tour['tourID'] ?>" method="POST">

             <input type="text" value="<?= htmlspecialchars($tour['tiltle']); ?>" name="tiltle" />
             <input type="text" value="<?= htmlspecialchars($tour['description']); ?>" name="description" />
             <!-- <input type="file" value="<?= htmlspecialchars($tour['image']); ?>" name="image" /> -->
             <input type="text" value="<?= htmlspecialchars($tour['quantity']); ?>" name="quantity" />
             <input type="text" value="<?= htmlspecialchars($tour['priceAdutls']); ?>" name="priceAdutls" />
             <input type="text" value="<?= htmlspecialchars($tour['priceChildren']); ?>" name="priceChildren" />
             <input type="text" value="<?= htmlspecialchars($tour['destination']); ?>" name="destination" />
             <input type="text" value="<?= htmlspecialchars($tour['departurePoint']); ?>" name="departurePoint" />
             <input type="text" value="<?= htmlspecialchars($tour['availability']); ?>" name="availability" />
             <input type="text" value="<?= htmlspecialchars($tour['itinerary']); ?>" name="itinerary" />
             <input type="date" value="<?= htmlspecialchars($tour['startDate']); ?>" name="startDate"
                 min=<?= $last ?> />
             <input type="date" value="<?= htmlspecialchars($tour['endDate']); ?>" name="endDate" min=<?= $last ?> />
             <select name="fre" id="" style="width: 50%; height: 70%">
                 <option value="tuần">tuần</option>
             </select>
             <select name="region" id="" style="width: 50%; height: 70%;margin-top: 10px">
                 <option value="<?= htmlspecialchars($tour['region']); ?>"><?= htmlspecialchars($tour['region']); ?>
                 </option>
                 <option value="Tây Bắc Bộ">Tây Bắc Bộ</option>
                 <option value="Đông Bắc Bộ">Đông Bắc Bộ</option>
                 <option value="Đồng bằng sông Hồng">Đồng bằng sông Hồng</option>
                 <option value="Đông Nam Bộ">Đông Nam Bộ</option>
                 <option value="Đồng bằng sông Cửu Long">Đồng bằng sông Cửu Long</option>
                 <option value="Tây Nguyên – Trung Bộ">Tây Nguyên – Trung Bộ</option>
             </select>

             <!-- <input type="text" placeholder="số cụ thể" name="inter" /> -->
             <div class="button-form row">
                 <a href="index.php?controller=admin&action=tour">Quay lại</a>
                 <button type="submit">Cập nhật</button>
             </div>
         </form>

     </div>
 </div>
 </div>
 </body>

 </html>