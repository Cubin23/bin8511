<?php 

function insert_nguoi_dung_khach_hang($username, $password, $email, $sdt,$ho_ten) {
    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu

    // Câu lệnh SQL để chèn dữ liệu người dùng mới
    $sql = "INSERT INTO nguoi_dung_khach_hang (email, password, username, sdt,ho_ten) VALUES (:email, :password, :username, :sdt, :ho_ten)";
    
    // Thực thi câu lệnh với các tham số
    $params = [
        ':username' => $username,
        ':password' => $password,
        ':email' => $email,
        ':sdt' => $sdt,
        ':ho_ten' =>$ho_ten
    ];
    
    // Gọi hàm pdo_execute để thực hiện câu lệnh
    return pdo_execute($sql, $params); 
}

function checkuser($username,$password){
    $sql = "select * from nguoi_dung_khach_hang where username='".$username."' AND password='".$password."'";
    $sp= pdo_query_one($sql);
    return $sp;
}

?>