<style>
    /* Định dạng cho bảng */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Định dạng cho các hàng và cột trong bảng */
table, th, td {
    border: 1px solid #ddd;
}

/* Định dạng cho các tiêu đề cột */
th {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 12px;
}

/* Định dạng cho các ô dữ liệu */
td {
    text-align: center;
    padding: 8px;
}

/* Định dạng cho các hàng */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Định dạng cho các nút hành động */
input[type="button"] {
    padding: 8px 16px;
    background-color: #4CAF50;
    border: none;
    color: white;
    cursor: pointer;
    border-radius: 4px;
    margin: 0 5px;
}

/* Thay đổi màu của nút khi hover */
input[type="button"]:hover {
    background-color: #45a049;
}

/* Định dạng cho các input chọn và input tìm kiếm */
input[type="text"], select {
    padding: 8px;
    margin: 10px 0;
    width: 200px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Định dạng cho form tìm kiếm */
form {
    margin-bottom: 20px;
}

/* Định dạng cho tiêu đề */
.formtitle h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

/* Định dạng cho các nút tìm kiếm */
input[type="submit"] {
    padding: 8px 16px;
    background-color: #008CBA;
    border: none;
    color: white;
    cursor: pointer;
    border-radius: 4px;
}

input[type="submit"]:hover {
    background-color: #007B9E;
}

/* Định dạng cho các hàng checkbox và hành động */
input[type="checkbox"] {
    margin: 0;
}

/* Định dạng cho các nút chọn tất cả, bỏ chọn và xóa */
.row.mb10 input[type="button"] {
    margin-right: 10px;
}

/* Thêm một số định dạng cho các hình ảnh trong bảng */
img {
    max-width: 100px;
    height: auto;
    border-radius: 4px;
}

</style>
<div class="row">
            <div class="row formtitle mb">
                <h1>Danh sách loại hàng hóa</h1>
            </div>
            <form action="index.php?act=listsp" method="post">
                        <input type="text" name="kyw" id="">
                        <select name="danh_muc_id" id="">
                            <option value="0" selected>Tất cả</option>
                            <?php 
                            foreach($listsanpham as $danhmuc){
                                extract($danhmuc);
                                echo '<option value="'.$danh_muc_id.'">'.$danh_muc_id.'</option>';
                            }
                            ?>
                            <input type="submit"  name="listok" value="Tìm">
                        </select>
                    </form>
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                    
                    <table>
                        <tr>
                            <th></th>
                            <th>Mã loại</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình</th>
                            <th>Giá sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Lượt Xem</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php 
                        foreach ($listsanpham as $sanpham){
                            extract($sanpham);
                            $suasp="index.php?act=suasp&san_pham_id=".$san_pham_id;
                            $xoasp="index.php?act=xoasp&san_pham_id=".$san_pham_id;
                            $anh_urlpath="../upload/".$anh_url;
                            if(is_file($anh_urlpath)){
                                $anh_url="<img src='$anh_urlpath' height='80'>";
                            }else{
                                $hinh = "no photo";
                            }
                            echo '<tr>
                                  <td><input type="checkbox" name="" id=""></td>
                                  <td>'.$san_pham_id.'</td>
                                  <td>'.$ten_san_pham.'</td>
                                  <td>'.$anh_url.'</td>
                                  <td>'.$gia.'</td>
                                  <td>'.$mo_ta.'</td>
                                  <td>'.$luot_xem.'</td>
                                  <td><a href="'.$suasp.'"><input type="button" name="" value="Sửa"></a> <a href="'.$xoasp.'"><input type="button" value="Xóa"></a></td>
                                </tr>';
                        }
                        ?>
                       
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=listsp"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>