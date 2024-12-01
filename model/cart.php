
<?php
function viewcart($del) {
    global $img_url;
    $tong = 0; // Tổng tiền giỏ hàng
    $i = 0;

    // Kiểm tra xem giỏ hàng có tồn tại trong session hay không
    if (!isset($_SESSION['mycart']) || empty($_SESSION['mycart'])) {
        echo "<p>Giỏ hàng của bạn hiện tại không có sản phẩm nào.</p>";
        return; // Nếu giỏ hàng không có, dừng việc thực thi hàm
    }

    if ($del == 1) {
        $xoasp_th = '<th>Thao Tác</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }

    echo '  
        <tr>
            <th>Hình</th>
            <th>Sản Phẩm</th>
            <th>Đơn giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            ' . $xoasp_th . '
        </tr>';
    // Kiểm tra và duyệt qua giỏ hàng nếu có
    foreach ($_SESSION['mycart'] as $cart) {
        // Tạo đường dẫn ảnh đúng cho từng sản phẩm
        $hinh = $img_url . $cart[0];  // $cart['img'] là tên ảnh
        
        // Tính thành tiền cho từng sản phẩm
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien; // Cộng dồn vào tổng tiền giỏ hàng

        // Hiển thị nút xóa nếu del == 1
        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';
        } else {
            $xoasp_td = '';
        }

        // Hiển thị thông tin sản phẩm trong giỏ hàng
        echo '
        <tr>
            <td><img src="' . $hinh . '" alt="Product Image" height="80px"></td>
            <td>' . $cart[1] . '</td>
            <td>' . number_format($cart[3], 0, ',', '.') . ' VND</td>
            <td>' . $cart[4] . '</td>
            <td>' . number_format($ttien, 0, ',', '.') . ' VND</td>
            ' . $xoasp_td . '
        </tr>';

        $i++; // Tăng chỉ số để sử dụng trong link xóa
    }

    // Hiển thị tổng đơn hàng
    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . number_format($tong, 0, ',', '.') . ' VND</td>
            ' . $xoasp_td2 . '
        </tr>';
}


function tongdonhang(){
   
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {

      
    
        $ttien = $cart[3] * $cart[4];
        $tong+= $ttien;
    }
    return $tong;

}


function insert_bill($name, $email, $address, $tel, $pttt, $tongdonhang, $receive_name, $receive_address) {
    $sql = "INSERT INTO bill (bill_name, bill_email, bill_address, bill_tel, bill_pttt, total, receive_name, receive_address) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Debug SQL
    echo "SQL: $sql | Params: " . json_encode([$name, $email, $address, $tel, $pttt, $tongdonhang, $receive_name, $receive_address]);
    
    return pdo_execute_return_lastInsertId($sql, $name, $email, $address, $tel, $pttt, $tongdonhang, $receive_name, $receive_address);
}







function insert_cart($gio_hang_id,$khach_hang_id,$san_pham_id,$so_luong,$idbill){
    $sql="insert into gio_hang(gio_hang_id,khach_hang_id,san_pham_id,so_luong,idbill) values('$gio_hang_id','$khach_hang_id','$san_pham_id,'$so_luong,'$idbill)";
    return pdo_execute($sql);
}

function loadone_bill($id){
    $sql = "select * from bill where id=".$id;
    $bill=pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill){
    $sql = "select * from gio_hang where idbill=".$idbill;
    $bill=pdo_query($sql);
    return $bill;
}


function bill_chi_tiet($listbill){
    global $img_path;
    $tong=0;
    $i=0;

    echo '<tr>
            <th>Hình</th>
            <th>Sản Phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
    </tr>';

    foreach($listbill as $cart){
        $hinh=$img_path.$cart['img'];
        $tong+=$cart['thanhtien'];

        echo '<tr>
                <td><img src="'.$hinh.'" alt="" height="80px"></td>
                <td>'.$cart['name'].'</td> 
                <td>'.$cart['gia'].'</td> 
                <td>'.$cart['soluong'].'</td> 
                <td>'.$cart['thanhtien'].'</td> 
        </tr>';
        $i+=1;
    }
    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>'.$tong.'</td>

    
    
    </tr>';
}

?>