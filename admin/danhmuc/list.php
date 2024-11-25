<style>
  /* Định dạng cho hàng chính */
.row {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

/* Tiêu đề của trang */
.fretitle h1 {
    font-size: 28px;
    text-align: center;
    color: #2c3e50;
    margin-bottom: 20px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

/* Khung chứa bảng */
.framcontent {
    width: 100%;
    padding: 20px;
    box-sizing: border-box;
    overflow-x: auto; /* Cho phép cuộn ngang nếu bảng quá rộng */
}

/* Tạo khoảng cách và đường viền cho bảng */
.dsloai table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* Style cho tiêu đề bảng */
.dsloai th,
.dsloai td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #e0e0e0;
}

/* Màu nền cho tiêu đề bảng */
.dsloai th {
    background-color: #3498db;
    color: white;
    font-weight: bold;
}

/* Màu nền cho các ô dữ liệu */
.dsloai td {
    background-color: #ffffff;
    color: #34495e;
}

/* Style cho hàng chẵn */
.dsloai tr:nth-child(even) td {
    background-color: #f9f9f9;
}

/* Style cho hàng lẻ */
.dsloai tr:nth-child(odd) td {
    background-color: #ffffff;
}

/* Cải thiện style cho checkbox */
.dsloai input[type="checkbox"] {
    width: 20px;
    height: 20px;
    margin-left: 10px;
}

/* Style cho nút Sửa và Xóa */
.dsloai input[type="button"] {
    padding: 8px 16px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin: 0 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Hiệu ứng khi di chuột lên nút */
.dsloai input[type="button"]:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

/* Nút Thêm danh mục */
a input[type="submit"] {
    padding: 10px 20px;
    background-color: #2ecc71;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

/* Hiệu ứng khi di chuột lên nút Thêm danh mục */
a input[type="submit"]:hover {
    background-color: #27ae60;
}

/* Cải thiện khoảng cách giữa các phần tử */
.mb10 {
    margin-bottom: 10px;
}

</style>

<div class="row">
          <div class="row fretitle">
            <h1>DANH SÁCH DANH MỤC</h1>
          </div>
          <div class="row framcontent">
            <div class="row mb10 dsloai">
              <table>
                <tr>
                  <th></th>
                  <th>Mã Danh Mục</th>
                  <th>Tên Danh Mục</th>
                  <th>Mô tả</th>
                  <th></th>
                </tr>
                <?php 
                foreach($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    $suadm="index.php?act=suadm&danh_muc_id=".$danh_muc_id;
                    $xoadm="index.php?act=xoadm&danh_muc_id=".$danh_muc_id;
                    echo '<tr>
                  <td><input type="checkbox" name="" id=""></td>
                  <td>'.$danh_muc_id.'</td>
                  <td>'.$ten_danh_muc.'</td>
                  <td>'.$mo_ta.'</td>
                  <td> <a href="'.$suadm.'"><input type="button" value="Sửa"></a><a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
                </tr>';
                }
                

                ?>
                
              </table>
              <a href="index.php?act=adddm"><input style="cursor: pointer" type="submit" value="Thêm danh mục"></a>
            </div>

          </div>
        </div>