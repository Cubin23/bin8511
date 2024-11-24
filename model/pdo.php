<?php 
function pdo_get_connection(){
    $dburl="mysql:host=localhost;dbname=da1;charset=utf8";
    $username='root';
    $password='';
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
function pdo_execute($sql){
    $sql_agrs = array_slice(func_get_args(),1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_agrs);
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
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
function pdo_query($sql){
    $sql_agrs = array_slice(func_get_args() ,1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_agrs);
        $rows = $stmt-> fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
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
function pdo_query_one($sql){
    $sql_agrs = array_slice(func_get_args() ,1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_agrs);
        $row = $stmt-> fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
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