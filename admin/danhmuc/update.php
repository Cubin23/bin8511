<style>
    /* Tổng quan */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
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
    text-align: center;
    color: #444;
    margin-bottom: 20px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
}

/* Form container */
.formcontent {
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Input fields */
input[type="text"], input[type="hidden"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    color: #555;
    box-sizing: border-box;
}

input[type="text"]:focus {
    border-color: #007BFF;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Buttons */
input[type="submit"], input[type="reset"], input[type="button"] {
    padding: 10px 15px;
    border: none;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
}

input[type="submit"] {
    background-color: #28a745;
    color: #fff;
}

input[type="submit"]:hover {
    background-color: #218838;
}

input[type="reset"] {
    background-color: #ffc107;
    color: #fff;
}

input[type="reset"]:hover {
    background-color: #e0a800;
}

input[type="button"] {
    background-color: #17a2b8;
    color: #fff;
}

input[type="button"]:hover {
    background-color: #117a8b;
}

/* Message box */
.mb10 {
    margin-bottom: 10px;
}

.mb10 input[type="text"] {
    font-size: 14px;
    color: #555;
}

.mb10 input[type="text"]::placeholder {
    color: #999;
}

/* Thông báo */
form > p {
    color: #28a745;
    font-size: 16px;
    margin-top: 10px;
    font-weight: bold;
    text-align: center;
}

</style>
<?php
if(is_array($dm)){
    extract($dm);
} 
?>

<div class="row">
            <div class="row formtitle">
                <h1>Cập nhật Danh Mục</h1>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=updatedm" method="post">
                    <div class="row mb10">
                        Mã loại <br>
                        <input type="text" name="danh_muc_id" disabled>
                    </div>
                    
                    <div class="row mb10">
                        Tên Danh Mục <br>
                        <input type="text" name="ten_danh_muc" value="<?php if(isset($ten_danh_muc)&&($ten_danh_muc!=""))echo $ten_danh_muc;?>">
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="danh_muc_id" value="<?php if(isset($danh_muc_id)&&($danh_muc_id>0))echo $danh_muc_id;?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                    if(isset($thongbao)&&($thongbao!=""))
                    echo $thongbao; 
                    ?>
                </form>
            </div>
        </div>
    </div>