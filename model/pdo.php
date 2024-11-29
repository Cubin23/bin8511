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
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        // Nếu có lỗi trong SQL hoặc kết nối, in ra lỗi và trả về false
        echo "Lỗi: " . $e->getMessage();
        return false;
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
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch only one row as an associative array
        return $row;
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
* @return  giá trị
* @throws PDOException lỗi thực thi câu lệnh
*/
function pdo_query_value($sql, $params = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? array_values($row)[0] : null;  // Return the first value or null if no result
    }
    catch (PDOException $e) {
        throw $e;
    }
    finally {
        unset($conn);
    }
}



?>