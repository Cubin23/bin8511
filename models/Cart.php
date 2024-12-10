<?php
// Lấy dữ liệu của giỏ hàng theo của người dùng
if (!function_exists('getCartByUserID')) {
    function getCartByUserID($id_nd)
    {
        try {
            $sql = "SELECT * FROM tb_gio_hang WHERE id_nd = :id_nd";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id_nd", $id_nd);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Lấy ra thông tất cả sản phẩm có trong giỏ hàng của khách hàng
if (!function_exists('getProductInCartItem')) {
    function getProductInCartItem($id_gh)
    {
        try {
            $sql = "SELECT * FROM tb_muc_gh WHERE id_gh = :id_gh AND id_sp = :id_sp";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id_gh", $id_gh);

            $stmt->bindParam(":id_sp", $_GET["id_sp"]);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Cập nhật số lượng của sản phẩm trong giỏ hàng
if (!function_exists('updateQuantityCartItem')) {
    function updateQuantityCartItem($so_luong, $id_gh)
    {
        try {
            $sqlUpdate = "UPDATE tb_muc_gh SET so_luong = :so_luong WHERE id_gh = :id_gh AND id_sp = :id_sp";

            $stmtUpdate = $GLOBALS['conn']->prepare($sqlUpdate);

            $stmtUpdate->bindParam(":so_luong", $so_luong);

            $stmtUpdate->bindParam(":id_gh", $id_gh);

            $stmtUpdate->bindParam(":id_sp", $_GET["id_sp"]);

            $stmtUpdate->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Xóa toàn bộ sản phẩm trong giỏ hàng
if (!function_exists('remoteAllCartItem')) {
    function remoteAllCartItem($id_gh)
    {
        try {
            // Xóa toàn bộ mục trong bảng tb_muc_gh có id_gh tương ứng
            $sql_delete_items = "DELETE FROM tb_muc_gh WHERE id_gh = :id_gh";

            $stmt_delete_items = $GLOBALS['conn']->prepare($sql_delete_items);

            $stmt_delete_items->bindParam(':id_gh', $id_gh);

            $stmt_delete_items->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
