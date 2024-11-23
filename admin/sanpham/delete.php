<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = ?";
    pdo_execute($sql, $id);

    header("Location: index.php?act=listsp");
    exit();
}
?>
