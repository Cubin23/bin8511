<div class="main">
    <div class="content">
      <!-- Slideshow container -->
            <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
           
            <img src="view/img/banner-bancaydep.jpg" style="width:100%">
            <div class="text"></div>
            </div>

            <div class="mySlides fade">
           
            <img src="view/img/baner2.jpg" style="width:100%">
     
            </div>

            <div class="mySlides fade">
            
            <img src="view/img/Baner3.jpg" style="width:100%">
           
            </div>

            <!-- Next and previous buttons -->
        
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            </div>
    </div>
</div>
<div class="line">
<h1 style="color:white">
    Danh Sách Sản Phẩm
   </h1>
</div>
<div class="av">
<i class="fas fa-leaf icon">
</i>
</div>
<div class="av">
    Danh mục tổng hợp các loại cây cảnh mới nhất của Tiny Garden
</div>
<div class="products">
<?php 
$i = 0;
foreach ($spnew as $sp) {
    extract($sp);
    $linksp="index.php?act=sanphamchitiet&san_pham_id=".$san_pham_id;

    // Kiểm tra nếu đường dẫn ảnh không hợp lệ
    if (empty($anh_url)) {
        echo "Ảnh không tồn tại cho sản phẩm: $ten_san_pham<br>";
        continue;
    }

    // Tạo đường dẫn URL tuyệt đối
    $anh_url = "/DA1/upload/" . $anh_url;

    // Kiểm tra file tồn tại
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $anh_url)) {
        echo "File ảnh không tồn tại: " . $anh_url . "<br>";
        continue;
    }

    // Xác định class "mr"
    $product = (($i == 2) || ($i == 5) || ($i || 8)) ? "product" : "";

    // Hiển thị HTML
    echo '<div class="' . $product . '">
        <a href="'.$linksp.'"><img alt="Cây cảnh văn phòng" height="200" src="' . $anh_url . '" width="300"/>
        <p>' . $ten_san_pham . '</p>
        <p>' . $gia . ' VNĐ || </p></a>
        
        <form action="index.php?act=addtocart" method="post">

        <input type="hidden" name = "san_pham_id" value="'.$san_pham_id.'"> 
        <input type="hidden" name = "ten_san_pham" value="'.$ten_san_pham.'"> 
        <input type="hidden" name = "anh_url" value="'.$anh_url.'"> 
        <input type="hidden" name = "gia" value="'.$gia.'"> 
        <input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="btn-icon-only">




        
        </form>
        
        
        
    </div>';

    $i += 1;
}
?>
</div>
<div class="line">
    <h1 style="color:white">
        Top những sản phẩm bán chạy
       </h1>
    </div>
    <div class="av">
    <i class="fas fa-leaf icon">
    </i>
    </div>
    <div class="av">
        Cập nhật liên tục thông tin đầy đủ, chính xác chất liệu, hình ảnh, video về sản phẩm phù hợp xu hướng mới nhất.
    </div>  
    <div class="products">
    <?php 
$i = 0;
foreach ($dstop10 as $sp) {
    extract($sp);
    $linksp="index.php?act=sanphamchitiet&san_pham_id=".$san_pham_id;

    // Kiểm tra nếu đường dẫn ảnh không hợp lệ
    if (empty($anh_url)) {
        echo "Ảnh không tồn tại cho sản phẩm: $ten_san_pham<br>";
        continue;
    }

    // Tạo đường dẫn URL tuyệt đối
    $anh_url = "/DA1/upload/" . $anh_url;

    // Kiểm tra file tồn tại
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $anh_url)) {
        echo "File ảnh không tồn tại: " . $anh_url . "<br>";
        continue;
    }

    // Xác định class "mr"
    $product = (($i == 2) || ($i == 5) || ($i || 8)) ? "product" : "";

    // Hiển thị HTML
    echo '<div class="product">
        <a href="'.$linksp.'"><img alt="Cây cảnh văn phòng" height="200" src="' . $anh_url . '" width="300"/>
        <p>' . $ten_san_pham . '</p>
        <p>' . $gia . ' VNĐ || <a href="index.php?act=viewcart"><i class="fas fa-shopping-cart"></a></i></p> </a>
    </div>';

    $i += 1;
}
?>
    </div>