<?php 
function pdo_get_connection(){
    $dburl="mysql:host=localhost;dbname=da1;charset=utf8";
    $username='root';
    $password='caovanhung';

    $conn=new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
/** 
 * thực thi câu lệnh sql thao tác dữ liêu(INSERT, UPDATE, DELETE)
* @param string $sql câu lệnh sql
* @param array $args mảng giá trị cung cấp các than số của $sql
* @throws PDOException lỗi thực thi câu lệnh
*/
function pdo_execute($sql, $params = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount() > 0;  // Trả về true nếu có dòng bị ảnh hưởng
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();  // Hiển thị lỗi nếu có
        return false;
    }
}
function pdo_execute_return_lastInsertId($sql, ...$params) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params); // Thực thi tham số an toàn
        return $conn->lastInsertId(); // Lấy ID vừa chèn
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage(); // Hiển thị lỗi
        return false;
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
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch results as an associative array
        return $rows;
    }
    catch (PDOException $e) {
        throw $e;
    }
    finally {
        unset($conn);
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
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);  // Lấy một bản ghi dưới dạng mảng liên kết
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


/** 
 * thực thi câu lệnh sql thao tác dữ liêu(INSERT, UPDATE, DELETE)
* @param string $sql câu lệnh sql
* @param array $args mảng giá trị cung cấp các than số của $sql
* @return  giá trị
* @throws PDOException lỗi thực thi câu lệnh
*/
function pdo_query_value($sql, $params = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? array_values($row)[0] : null;  // Trả về giá trị đầu tiên hoặc null
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}




?>