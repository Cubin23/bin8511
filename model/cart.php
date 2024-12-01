
<?php 
function viewcart($del){
    global $img_url;
    $tong = 0;
    $i = 0;
    if($del==1){
        $xoasp_th ='<th>Thao Tác</th>';
        $xoasp_td2='<td></td>';
       
    }else{
        $xoasp_th='';
        $xoasp_td2='';
       
    }

    echo '  <tr>
                    <th>Hình</th>
                    <th>Sản Phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                   '.$xoasp_th.'
                </tr>';
    
    foreach ($_SESSION['mycart'] as $cart) {
        // Tạo đường dẫn ảnh đúng cho từng sản phẩm
        $img_url = "/duanmau/upload/" . $cart[0];  // Đây là đường dẫn ảnh của từng sản phẩm
    
        $ttien = $cart[3] * $cart[4];
        $tong+= $ttien;
        if($del==1){
            
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';
            
        }else{
         
            $xoasp_td='';
            
        }
        
        // Tạo nút xóa cho sản phẩm
        
    
        // Hiển thị sản phẩm trong giỏ hàng
        echo ' 
      
        
        <tr>
                <td><img src="' . $img_url . '" alt="Product Image" height="80px"></td>
                <td>' . $cart[1] . '</td>
                <td>' . number_format($cart[3], 0, ',', '.') . ' VND</td>
                <td>' . $cart[4] . '</td>
                <td>' . number_format($ttien, 0, ',', '.') . ' VND</td>
                ' . $xoasp_td . '
            </tr>';
    
        $i+=1;  // Tăng chỉ số để sử dụng trong link xóa
    }
    
    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . number_format($tong, 0, ',', '.') . ' VND</td>
            '.$xoasp_td2.'
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


function insert_bill($name,$email,$address,$tel,$pttt,$tongdonhang){
    $sql="insert into bill(bill_name,bill_email,bill_address,bill_tel,bill_pttt,total) values('$name','$email','$address,'$tel,'$pttt,'$tongdonhang)";
    pdo_execute();
}




?>