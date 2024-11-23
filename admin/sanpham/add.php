<?php
if (isset($_POST['add_product']) && $_POST['add_product']) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Upload file
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO products (name, price, description, image) VALUES ('$name', '$price', '$description', '$image')";
        pdo_execute($sql);
        $message = "Thêm sản phẩm thành công!";
        // Chuyển hướng đến danh sách sản phẩm
        header("Location: index.php?act=listsp");
        exit();
    } else {
        $message = "Không thể tải ảnh lên!";
    }
}
?>

<h2>Thêm sản phẩm mới</h2>
<form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
    <label for="name">Tên sản phẩm:</label><br>
    <input type="text" name="name" required><br>

    <label for="price">Giá sản phẩm:</label><br>
    <input type="number" name="price" required><br>

    <label for="description">Mô tả:</label><br>
    <textarea name="description" rows="5"></textarea><br>

    <label for="image">Hình ảnh:</label><br>
    <input type="file" name="image" required><br><br>

    <input type="submit" name="add_product" value="Thêm sản phẩm">
</form>

<?php
if (isset($message)) {
    echo "<p>$message</p>";
}
?>
