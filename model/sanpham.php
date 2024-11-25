<?php 
function insert_san_pham($ten_san_pham, $gia, $danh_muc_id, $mo_ta, $anh_url) {
    $sql = "INSERT INTO san_pham (ten_san_pham, gia, danh_muc_id, mo_ta, anh_url) 
            VALUES (:ten_san_pham, :gia, :danh_muc_id, :mo_ta, :anh_url)";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':ten_san_pham' => $ten_san_pham,
        ':gia' => $gia,
        ':danh_muc_id' => $danh_muc_id,
        ':mo_ta' => $mo_ta,
        ':anh_url' => $anh_url
    ]);
}

function loadall_san_pham() {
    $sql = "SELECT * FROM san_pham ORDER BY san_pham_id"; // Sử dụng cột đúng
    return pdo_query($sql); // Gọi hàm pdo_query để lấy danh mục
}
function loadall_san_pham_home() {
    $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY san_pham_id DESC LIMIT 0,6"; // Sửa cú pháp ORDER BY
    return pdo_query($sql); // Gọi hàm pdo_query để lấy danh mục
}


function delete_san_pham($san_pham_id){
    $sql = "delete from san_pham where san_pham_id=".$san_pham_id; 
    pdo_execute($sql);
}
function update_san_pham($san_pham_id, $ten_san_pham, $gia, $mo_ta, $danh_muc_id, $anh_url) {
    global $pdo;
    $sql = "UPDATE san_pham SET 
            ten_san_pham = :ten_san_pham, 
            gia = :gia, 
            mo_ta = :mo_ta, 
            danh_muc_id = :danh_muc_id, 
            anh_url = :anh_url 
            WHERE san_pham_id = :san_pham_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':ten_san_pham', $ten_san_pham);
    $stmt->bindParam(':gia', $gia);
    $stmt->bindParam(':mo_ta', $mo_ta);
    $stmt->bindParam(':danh_muc_id', $danh_muc_id);
    $stmt->bindParam(':anh_url', $anh_url);
    $stmt->bindParam(':san_pham_id', $san_pham_id);

    return $stmt->execute();
}
function loadone_san_pham($san_pham_id) {
    // Đảm bảo rằng câu truy vấn của bạn đúng và kết nối cơ sở dữ liệu đã được thiết lập
    $sql = "SELECT * FROM san_pham WHERE san_pham_id = :san_pham_id";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
    $stmt->execute();

    $sanpham = $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về dữ liệu của sản phẩm
    return $sanpham;
}







?>