<style>
    form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
}

form div {
    margin-bottom: 15px;
}

form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

form input[type="text"],
form textarea,
form input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

form textarea {
    height: 100px;
}

input[type="submit"] {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #218838;
}

p {
    text-align: center;
    color: #28a745;
    font-weight: bold;
}

</style>
<?php
if (isset($thongbao) && !empty($thongbao)) {
    echo "<p>$thongbao</p>";
}
?>

<form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="price">Giá sản phẩm:</label>
        <input type="text" name="price" required>
    </div>
    <div>
        <label for="description">Mô tả:</label>
        <textarea name="description" required></textarea>
    </div>
    <div>
        <label for="image">Hình ảnh:</label>
        <input type="file" name="image" required>
    </div>
    <input type="submit" name="themmoi" value="Thêm sản phẩm">
</form>
