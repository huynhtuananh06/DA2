<?php
// require_once 'core/baseController.php';

class ImgController extends baseController{
    public function themAnh($id = null) {
        $imgModel = new ImgModel();

        $tourID = (int)$id;

        if($_SERVER['REQUEST_METHOD']=='POST') {
            $imgName = ['img1','img2','img3','img4'];
            $tarDir = "public/upload/";

            foreach($imgName as $file) {
                if(isset($_FILES[$file]) && $_FILES[$file]['error'] == 0) {
                    $fileName = time()."_".basename($_FILES[$file]['name']);
                    $fileDir = $tarDir.$fileName;
                    if(move_uploaded_file($_FILES[$file]['tmp_name'],$fileDir)) {
                        $data = [
                            'tourID' => $tourID,
                            'imageURL' => $fileName
                        ];
                        $imgModel->insertImg($data);
                        echo "thêm ảnh thành công";
                    } else {
                        echo "upload thất bại";
                        exit;
                    }
                }
            }
            header("location: index.php?controller=admin&action=tour"); //*
            exit;
        } else {
            $this->renderView('themanh',['tourID'=>$tourID]);
        }
    }

    public function updateAnh($id = null)
{
    if (!$id || !is_numeric($id)) {
        die('Tour ID không hợp lệ!');
    }

    $tourID    = (int)$id;
    $imgModel  = new ImgModel();
    $uploadDir = "public/upload/";

    // === LẤY ẢNH HIỆN TẠI ===
    $currentImages = $imgModel->getImgByTourId($tourID);

    // Tạo mảng img1, img2, img3, img4 để view dùng
    $data = [];
    for ($i = 1; $i <= 4; $i++) {
        $data['img' . $i] = $currentImages[$i - 1]['imageURL'] ?? null; //$currentImages = [
                                                                        //0 => ['imageURL' => 'anh1.jpg'],
    }

    // === XỬ LÝ KHI BẤM CẬP NHẬT ===
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // 1. XÓA TẤT CẢ ẢNH CŨ (file + DB)
        foreach ($currentImages as $old) {
            if (!empty($old['imageURL']) && $old['imageURL'] !== 'default.jpg') {
                $oldFile = $uploadDir . $old['imageURL'];
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
        }

        // XÓA TRONG DB – SỬA LẠI HÀM CỦA BẠN NHƯNG AN TOÀN HƠN
        $imgModel->deleteImage($tourID);

        // 2. UPLOAD ẢNH MỚI (nếu có chọn file)
        for ($i = 1; $i <= 4; $i++) {
            $fileKey = 'img' . $i;

            if (!empty($_FILES[$fileKey]['name']) && $_FILES[$fileKey]['error'] === 0) {
                $ext      = pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION);
                $fileName = time() . "_{$i}_" . uniqid() . "." . $ext;
                $target   = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $target)) {
                    $imgModel->insertImg([
                        'tourID'   => $tourID,
                        'imageURL' => $fileName
                    ]);
                }
            }
            // Nếu không chọn file → giữ nguyên ảnh cũ (không làm gì cả)
        }

        header("Location: index.php?controller=admin&action=tour");
        exit();
    }

    // === HIỂN THỊ FORM ===
    $this->renderView('updateAnh', [
        'img'     => $data,
        'tourID'  => $tourID
    ]);
}
}