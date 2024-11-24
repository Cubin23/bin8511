<?php
if (isset($_GET['id']) && ($_GET['id'] > 0)) {
    $san_pham_id = $_GET['id'];
    $sql = "SELECT * FROM san_pham WHERE san_pham_id = ?";
    $sp = pdo_query_one($sql, $san_pham_id);
}

if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
    $san_pham_id = $_POST['san_pham_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "UPDATE san_pham SET ten_san_pham = ?, gia = ?, mo_ta = ?, anh_url = ? WHERE san_pham_id = ?";
        pdo_execute($sql, $name, $price, $description, $image, $san_pham_id);
        $thongbao = "Cập nhật sản phẩm thành công!";
        header("Location: index.php?act=listsp");
        exit();
    } else {
        $thongbao = "Không thể tải ảnh lên!";
    }
}
?>

<form action="index.php?act=editsp&id=<?= $san_pham_id ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="san_pham_id" value="<?= $sp['san_pham_id'] ?>">
    <div>
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" value="<?= $sp['ten_san_pham'] ?>" required>
    </div>
    <div>
        <label for="price">Giá sản phẩm:</label>
        <input type="text" name="price" value="<?= $sp['gia'] ?>" required>
    </div>
    <div>
        <label for="description">Mô tả:</label>
        <textarea name="description" required><?= $sp['mo_ta'] ?></textarea>
    </div>
    <div>
        <label for="image">Hình ảnh:</label>
        <input type="file" name="image">
        <img src="../uploads/<?= $sp['anh_url'] ?>" width="100">
    </div>
    <input type="submit" name="capnhat" value="Cập nhật sản phẩm">
</form>
