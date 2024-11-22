<?php 

function insert_danh_muc($ten_danh_muc, $mo_ta) {
    $sql = "INSERT INTO danh_muc (ten_danh_muc, mo_ta) VALUES (:ten_danh_muc, :mo_ta)";
    try {
        // Debug: in ra câu lệnh SQL để kiểm tra
        
        $result = pdo_execute($sql, [
            ':ten_danh_muc' => $ten_danh_muc,
            ':mo_ta' => $mo_ta
        ]);
        if ($result > 0) {
            return true;
        } else {
            echo "Lỗi: Không có dòng nào bị ảnh hưởng!";
            return false;
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}



function delete_danh_muc($danh_muc_id){
    $sql = "delete from danh_muc where danh_muc_id=".$danh_muc_id; 
    pdo_execute($sql);
}

function loadall_danh_muc() {
    $sql = "SELECT * FROM danh_muc ORDER BY ten_danh_muc"; // Sử dụng cột đúng
    return pdo_query($sql); // Gọi hàm pdo_query để lấy danh mục
}


function loadone_danh_muc($danh_muc_id){
    $sql = "select * from danh_muc where danh_muc_id=".$danh_muc_id;
    $dm=pdo_query_one($sql);
    return $dm;
}

function update_danh_muc($danh_muc_id, $ten_danh_muc, $mo_ta) {
    $sql = "UPDATE danh_muc SET ten_danh_muc = :ten_danh_muc, mota = :mota WHERE danh_muc_id = :danh_muc_id";
    return pdo_execute($sql, [
        'ten_danh_muc' => $ten_danh_muc,
        'mo_ta' => $mo_ta,
        'danh_muc_id' => $danh_muc_id
    ]);
}





?>