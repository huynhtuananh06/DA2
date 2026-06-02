 <?php require __DIR__ . '/../part/slider.php' ?>

 <div class="admin-right">
     <div class="admin-right-top row">
         <p>Quản lí tour</p>

         <button>Đăng xuất</button>
     </div>
     <div class="form-right-bottom">
         <form action="index.php?controller=admin&action=themTour" method="POST" enctype="multipart/form-data">

             <input type="text" placeholder="tiêu đề" name="tiltle" />
             <input type="text" placeholder="mô tả" name="description" />
             <input type="file" placeholder="ảnh" name="image" />
             <input type="text" placeholder="số lượng" name="quantity" />
             <input type="text" placeholder="giá người lớn" name="priceAdutls" />
             <input type="text" placeholder="giá Trẻ Em" name="priceChildren" />
             <input type="text" placeholder="điểm đến" name="destination" />
             <input type="text" placeholder="điểm đi" name="departurePoint" />
             <input type="text" placeholder="trạng thái" name="availability" />
             <input type="text" placeholder="lịch trình cụ thể" name="itinerary" />
             <input type="date" placeholder="ngày khởi hành" name="startDate" min=<?= $last ?> />
             <input type="date" placeholder="ngày kết thúc" name="endDate" min=<?= $last ?> />
             <select name="fre" id="" style="width: 50%; height: 70%">
                 <option value="tuần">tuần</option>
             </select>
             <select name="region" id="" style="width: 50%; height: 70%;margin-top: 10px">
                 <option value="">Vùng</option>
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
                 <button type="submit">Thêm Tour</button>
             </div>

         </form>

     </div>
 </div>
 </div>
 </body>

 </html>