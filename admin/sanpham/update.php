<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = pdo_query_one("SELECT * FROM products WHERE id = ?", $id);
}

if (isset($_POST['update_product']) && $_POST['update_product']) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $product['image'];

    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $sql = "UPDATE products SET name = ?, price = ?, description = ?, image = ? WHERE id = ?";
    pdo_execute($sql, $name, $price, $description, $image, $id);

    $message = "Cập nhật sản phẩm thành công!";
}
?>

<h2>Cập nhật sản phẩm</h2>
<form action="index.php?act=editsp&id=<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <label for="name">Tên sản phẩm:</label><br>
    <input type="text" name="name" value="<?= $product['name'] ?>" required><br>

    <label for="price">Giá sản phẩm:</label><br>
    <input type="number" name="price" value="<?= $product['price'] ?>" required><br>

    <label for="description">Mô tả:</label><br>
    <textarea name="description" rows="5"><?= $product['description'] ?></textarea><br>

    <label for="image">Hình ảnh:</label><br>
    <input type="file" name="image"><br><br>
    <img src="../uploads/<?= $product['image'] ?>" width="100"><br>

    <input type="submit" name="update_product" value="Cập nhật">
</form>

<?php
if (isset($message)) {
    echo "<p>$message</p>";
}
?>
