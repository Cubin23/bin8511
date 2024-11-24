<?php
if (isset($_GET['id']) && ($_GET['id'] > 0)) {
    $san_pham_id = $_GET['id'];
    $sql = "DELETE FROM san_pham WHERE san_pham_id = ?";
    pdo_execute($sql, $san_pham_id);
    $thongbao = "Xóa sản phẩm thành công!";
    header("Location: index.php?act=listsp");
    exit();
} else {
    echo "Sản phẩm không tồn tại!";
}
?>
