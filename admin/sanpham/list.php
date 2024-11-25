<style>
  /* Định dạng container chính */
.row {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 auto;
    padding: 20px;
    max-width: 1200px;
    font-family: 'Roboto', sans-serif;
    background-color: #f9f9f9;
}

/* Tiêu đề */
.row .fretitle h1 {
    font-size: 32px;
    font-weight: bold;
    text-align: center;
    color: #2c3e50;
    margin-bottom: 20px;
    text-transform: uppercase;
}

/* Khung nội dung */
.row .framcontent {
    width: 100%;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid #e6e6e6;
}

/* Bảng */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Định dạng các ô trong bảng */
table th, table td {
    text-align: left;
    padding: 12px 15px;
    border: 1px solid #ddd;
}

/* Tiêu đề bảng */
table th {
    background-color: #3498db;
    color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
}

/* Các hàng lẻ và chẵn trong bảng */
table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:nth-child(odd) {
    background-color: #ffffff;
}

/* Hover hàng */
table tr:hover {
    background-color: #d1ecf1;
    cursor: pointer;
}

/* Hình ảnh sản phẩm */
table img {
    display: block;
    max-width: 100%;
    height: auto;
    max-height: 80px;
    object-fit: cover;
}

/* Nút chỉnh sửa và xóa */
table input[type="button"] {
    background-color: #3498db;
    color: #ffffff;
    border: none;
    padding: 8px 12px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

table input[type="button"]:hover {
    background-color: #2980b9;
}

/* Nút "Thêm danh mục" */
a input[type="submit"] {
    background-color: #1abc9c;
    color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    padding: 12px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    margin-top: 20px;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
}

a input[type="submit"]:hover {
    background-color: #16a085;
}

</style>

<div class="row">
          <div class="row fretitle">
            <h1>DANH SÁCH SẢN PHẨM</h1>
          </div>
          <div class="row framcontent">
            <div class="row mb10 dsloai">

              <table>
                <tr>
                  <th></th>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá sản phẩm</th>
                  <th>Mô tả</th>
                  <th>Danh Mục</th>
                  <th>Hình ảnh</th>
                  <th>Ngày Update</th>
                  <th></th>
                </tr>
                <?php 
                foreach($listsanpham as $sanpham){
                    extract($sanpham);
                    $suasp="index.php?act=suasp&san_pham_id=".$san_pham_id;
                    $xoasp="index.php?act=xoasp&san_pham_id=".$san_pham_id;
                   $anh_urlpath= "../upload/".$anh_url;
                    if(is_file($anh_urlpath)){
                      $anh_url = "<img src = '".$anh_urlpath."' height='80'>";
                    }else{
                      $anh_url = "Không có hình ảnh";
                    }
                   
                   
                    echo '<tr>
                  <td><input type="checkbox" name="" id=""></td>
                  <td>'.$san_pham_id.'</td>
                  <td>'.$ten_san_pham.'</td>
                  <td>'.$gia.'</td>
                  <td>'.$mo_ta.'</td>
                  <td>'.$danh_muc_id.'</td>
                  <td>'.$anh_url .'</td>
                  <td>'.$created_at.'</td>
                  <td> <a href="'.$suasp.'"><input type="button" value="Sửa"></a><a href="'.$xoasp.'"><input type="button" value="Xóa"></a></td>
                </tr>';
                }
                

                ?>
                
              </table>
              <a href="index.php?act=addsp"><input style="cursor: pointer" type="submit" value="Thêm danh mục"></a>
            </div>

          </div>
        </div>