<?php
$sql = "SELECT * FROM categories";
$categories = pdo_query($sql);
?>
<table>
    <tr>
        <th>Mã loại</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Mô tả</th>
        <th>Thao tác</th>
    </tr>
    <?php foreach ($categories as $category): ?>
    <tr>
        <td><?php echo $category['maloai']; ?></td>
        <td><?php echo $category['name']; ?></td>
        <td><?php echo $category['price']; ?></td>
        <td><?php echo $category['description']; ?></td>
        <td>
            <a href="index.php?act=editdm&id=<?php echo $category['id']; ?>">Sửa</a>
            <a href="index.php?act=deletedm&id=<?php echo $category['id']; ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
