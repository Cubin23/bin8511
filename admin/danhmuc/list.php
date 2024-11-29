<style>
    /* Tổng quan */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

.row {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 15px;
}

/* Tiêu đề */
.formtitle h1 {
    font-size: 24px;
    color: #444;
    text-align: center;
    margin-bottom: 20px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
}

/* Bảng */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

table th, table td {
    border: 1px solid #ddd;
    text-align: left;
    padding: 10px;
}

table th {
    background-color: #f8f8f8;
    color: #333;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

table td input[type="button"] {
    padding: 5px 10px;
    border: none;
    background-color: #007BFF;
    color: #fff;
    cursor: pointer;
    border-radius: 3px;
    font-size: 14px;
}

table td input[type="button"]:hover {
    background-color: #0056b3;
}

/* Nút chức năng */
.mb10 {
    margin-bottom: 10px;
}

.mb10 input[type="button"] {
    padding: 8px 12px;
    border: none;
    background-color: #28a745;
    color: #fff;
    cursor: pointer;
    border-radius: 3px;
    margin-right: 5px;
    font-size: 14px;
}

.mb10 input[type="button"]:hover {
    background-color: #218838;
}

.mb10 a input[type="button"] {
    background-color: #17a2b8;
}

.mb10 a input[type="button"]:hover {
    background-color: #117a8b;
}

/* Checkbox */
input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
}

/* Form container */
.formcontent {
    padding: 15px;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

</style>
<div class="row">
            <div class="row formtitle">
                <h1>Danh sách loại hàng hóa</h1>
            </div>
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                    <table>
                        <tr>
                            <th></th>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th></th>
                        </tr>
                        <?php 
                        foreach ($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            $suadm="index.php?act=suadm&danh_muc_id=".$danh_muc_id;
                            $xoadm="index.php?act=xoadm&danh_muc_id=".$danh_muc_id;
                            echo '<tr>
                                  <td><input type="checkbox" name="" id=""></td>
                                  <td>'.$danh_muc_id.'</td>
                                  <td>'.$ten_danh_muc.'</td>
                                  <td><a href="'.$suadm.'"><input type="button" name="" value="Sửa"></a> <a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
                                </tr>';
                        }
                        ?>
                       
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>