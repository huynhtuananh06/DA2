<form action="index.php?controller=img&action=themAnh&id=<?= $tourID ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="tourID" value="<?= $tourID ?>">
    <input type="file" name="img1">
    <input type="file" name="img2">
    <input type="file" name="img3">
    <input type="file" name="img4">

    <button type="submit">Thêm</button>
</form>