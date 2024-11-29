<style>
/* General form styling */
form {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Title styling */
.formtitle h1 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Form content */
.formcontent {
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
}

/* Input field styling */
input[type="text"],
textarea,
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

input[type="text"]:focus,
textarea:focus,
select:focus {
    border-color: #6c757d;
    outline: none;
}

/* Label styling */
label {
    font-size: 14px;
    color: #555;
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

/* Button styling */
input[type="submit"],
input[type="reset"],
button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    margin-right: 10px;
}

input[type="submit"]:hover,
input[type="reset"]:hover,
button:hover {
    background-color: #0056b3;
}

/* Image preview styling */
img {
    margin-top: 10px;
    border-radius: 5px;
}

/* Error messages */
.error {
    color: red;
    font-size: 12px;
    margin-top: -15px;
    margin-bottom: 10px;
}

/* Responsive design */
@media (max-width: 768px) {
    form {
        width: 100%;
        padding: 15px;
    }

    .formtitle h1 {
        font-size: 20px;
    }

    .row {
        margin-bottom: 15px;
    }

    input[type="text"],
    textarea,
    select,
    input[type="file"] {
        font-size: 16px;
    }

    input[type="submit"],
    input[type="reset"],
    button {
        width: 100%;
        padding: 12px;
        margin-top: 10px;
    }
}

</style>
<?php
if(is_array($sanpham)){
    extract($sanpham);
} 
$anh_urlpath="../upload/".$anh_url;
if(is_file($anh_urlpath)){

    $anh_url="<img src='$anh_urlpath' height='80'>";
    
}else{
            $anh_url = "no photo";
                 }
?>

<div class="row">
            <div class="row formtitle">
                <h1>Cập nhật loại hàng hóa</h1>
            </div>
            <div class="row formcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
    <input type="hidden" name="san_pham_id" value="<?=$san_pham_id?>">
    <div class="row mb10">
        <label for="iddanhmuc">Danh mục</label>
        <select name="iddanhmuc" id="iddanhmuc">
            <?php foreach ($listdanhmuc as $danhmuc): ?>
                <option value="<?=$danhmuc['danh_muc_id']?>" <?=($danh_muc_id == $danhmuc['danh_muc_id']) ? 'selected' : ''?>><?=$danhmuc['ten_danh_muc']?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="row mb10">
        <label for="san_pham_id">Mã Sản Phẩm</label>
        <input type="text" name="san_pham_id" id="san_pham_id" value="<?=$san_pham_id?>" readonly>
    </div>
    <div class="row mb10">
        <label for="ten_san_pham">Tên sản phẩm</label>
        <input type="text" name="ten_san_pham" id="ten_san_pham" value="<?=$ten_san_pham?>">
    </div>
    <div class="row mb10">
        <label for="gia">Giá sản phẩm</label>
        <input type="text" name="gia" id="gia" value="<?=$gia?>">
    </div>
    <div class="row mb10">
                        Hình ảnh <br>
                        <input type="file" name="anh_url" >
                        <?=$anh_url?>
                    </div>
    <div class="row mb10">
        <label for="mo_ta">Mô tả</label>
        <textarea name="mo_ta" id="mo_ta"><?=$mo_ta?></textarea>
    </div>
    <div class="row mb10">
        <input type="submit" name="capnhat" value="Cập nhật">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listsp"><button type="button">Danh sách</button></a>
    </div>
</form>

            </div>
        </div>
    </div>