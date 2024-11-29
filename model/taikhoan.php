<?php 
function insert_nguoi_dung_khach_hang($username, $password,$dia_chi, $email, $sdt, $ho_ten) {
    // Kiểm tra xem người dùng đã tồn tại chưa
    $check_existing_user = checksdt($email); // Kiểm tra email
    if ($check_existing_user) {
        return false; // Nếu email đã tồn tại, trả về false
    }

    // Mã hóa mật khẩu
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
    // Câu lệnh SQL để chèn dữ liệu người dùng mới
    $sql = "INSERT INTO nguoi_dung_khach_hang (email, password, username,dia_chi, sdt, ho_ten) VALUES (:email, :password, :username,:dia_chi, :sdt, :ho_ten)";
    
    // Thực thi câu lệnh với các tham số
    $params = [
        ':username' => $username,
        ':password' => $password_hashed, // Sử dụng mật khẩu đã mã hóa
        ':dia_chi' => $dia_chi,
        ':email' => $email,
        ':sdt' => $sdt,
        ':ho_ten' => $ho_ten
    ];
    
    try {
        // Gọi hàm pdo_execute để thực hiện câu lệnh
        return pdo_execute($sql, $params); 
    } catch (Exception $e) {
        return false; // Nếu có lỗi xảy ra trong quá trình thực thi câu lệnh
    }
}


function checkuser($username,$password){
    $sql = "select * from nguoi_dung_khach_hang where username='".$username."' AND password='".$password."'";
    $sp= pdo_query_one($sql);
    return $sp;
}

function checksdt($email){
    $sql = "select * from nguoi_dung_khach_hang where email='".$email."'";
    $sp= pdo_query_one($sql);
    return $sp;
}

?>