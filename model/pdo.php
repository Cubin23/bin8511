<?php 
function pdo_get_connection() {
    try {
        $dburl = "mysql:host=localhost;dbname=da;charset=utf8";
        $username = 'root';
        $password = '';
        $conn = new PDO($dburl, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        error_log("Lỗi kết nối: " . $e->getMessage()); // Ghi lại lỗi kết nối vào log
        echo "Lỗi kết nối: " . $e->getMessage();
        die(); // Dừng nếu không thể kết nối
    }
}


/** 
 * thực thi câu lệnh sql thao tác dữ liêu(INSERT, UPDATE, DELETE)
* @param string $sql câu lệnh sql
* @param array $args mảng giá trị cung cấp các than số của $sql
* @throws PDOException lỗi thực thi câu lệnh
*/
function pdo_execute($sql, $params = []) {
    try {
        $conn = pdo_get_connection(); // Kết nối PDO
        $stmt = $conn->prepare($sql); // Chuẩn bị câu lệnh
        if (!is_array($params)) {
            throw new InvalidArgumentException("Tham số truyền vào phải là một mảng."); 
        }
        $stmt->execute($params); // Thực thi câu lệnh
        return $stmt->rowCount(); // Trả về số dòng bị ảnh hưởng
    } catch (PDOException $e) {
        error_log("Lỗi PDO: " . $e->getMessage()); // Ghi lại lỗi
        echo "Lỗi PDO: " . $e->getMessage(); // Hiển thị thông báo lỗi
        return false; // Trả về false nếu có lỗi
    } finally {
        unset($conn); // Giải phóng kết nối
    }
}






/** 
 * thực thi câu lệnh sql thao tác dữ liêu(INSERT, UPDATE, DELETE)
* @param string $sql câu lệnh sql
* @param array $args mảng giá trị cung cấp các than số của $sql
* @return array mảng các bản ghi
* @throws PDOException lỗi thực thi câu lệnh
*/
function pdo_query($sql, $params = []) {
    try {
        $conn = pdo_get_connection(); // Kết nối cơ sở dữ liệu
        $stmt = $conn->prepare($sql); // Chuẩn bị câu lệnh SQL
        $stmt->execute($params); // Thực thi câu lệnh SQL
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả kết quả
        return $rows; // Trả về các bản ghi
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false; // Trả về false nếu có lỗi
    }
}

/** 
 * thực thi câu lệnh sql thao tác dữ liêu(INSERT, UPDATE, DELETE)
* @param string $sql câu lệnh sql
* @param array $args mảng giá trị cung cấp các than số của $sql
* @return array mảng các bản ghi
* @throws PDOException lỗi thực thi câu lệnh
*/
function pdo_query_one($sql, $params = []) {
    try {
        $conn = pdo_get_connection(); // Kết nối cơ sở dữ liệu
        $stmt = $conn->prepare($sql); // Chuẩn bị câu lệnh SQL
        $stmt->execute($params); // Thực thi câu lệnh SQL
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy một bản ghi
        return $row; // Trả về bản ghi
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn); // Giải phóng kết nối
    }
}

/** 
 * thực thi câu lệnh sql thao tác dữ liêu(INSERT, UPDATE, DELETE)
* @param string $sql câu lệnh sql
* @param array $args mảng giá trị cung cấp các than số của $sql
* @return  giá trị
* @throws PDOException lỗi thực thi câu lệnh
*/
function pdo_query_value($sql){
    $sql_agrs = array_slice(func_get_args() ,1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_agrs);
        $row = $stmt-> fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}



?>