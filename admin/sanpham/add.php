<style>
    /* Tổng thể cho form */
.row {
    margin: 10px 0;
}

.formtitle h1 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

.formcontent {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: 0 auto;
}

.mb10 {
    margin-bottom: 10px;
}

/* Input và nút */
input[type="text"], 
input[type="submit"], 
input[type="reset"], 
input[type="button"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

input[type="text"]:focus {
    border-color: #007BFF;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

input[type="submit"], 
input[type="reset"], 
input[type="button"] {
    background-color: #007BFF;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border: none;
    margin-top: 5px;
}

input[type="submit"]:hover, 
input[type="reset"]:hover, 
input[type="button"]:hover {
    background-color: #0056b3;
}

/* Thông báo */
form .row:last-child {
    margin-top: 15px;
    font-size: 14px;
    color: green;
    text-align: center;
}

</style>

<div class="row">
            <div class="row formtitle">
                <h1>Thêm mới sản phẩm</h1>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                    <div class="row mb10">
                        Danh mục <br>
                        <select name="danh_muc_id" id="">
                            <?php
                            foreach($listdanhmuc as $danhmuc){
                                extract($danhmuc);
                                echo '<option value="'.$danh_muc_id.'">'.$ten_danh_muc.'</option>';
                            } 
                            ?>
                        
                        </select>
                    </div>
                    
                    <div class="row mb10">
                        Tên sản phẩm <br>
                        <input type="text" name="ten_san_pham">
                    </div>
                    <div class="row mb10">
                        Giá sản phẩm <br>
                        <input type="text" name="gia">
                    </div>
                    <div class="row mb10">
                        Hình ảnh <br>
                        <input type="file" name="anh_url">
                    </div>
                    <div class="row mb10">
                        Mô tả <br>
                        <textarea name="mo_ta" id="" cols="50" rows="10"></textarea>
                    </div>
                    

                    <div class="row mb10">
                        <input type="submit" name="themmoi" value="Thêm mới">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                    if(isset($thongbao)&&($thongbao!=""))
                    echo $thongbao; 
                    ?>
                </form>
            </div>
        </div>
    </div>