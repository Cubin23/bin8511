<div class="main">
    <span>
    <div class="content">
      <!-- Slideshow container -->
            <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
           
            <img src="view/image/banner-bancaydep.jpg" style="width:100%">
            <div class="text"></div>
            </div>

            <div class="mySlides fade">
           
            <img src="view/image/baner2.jpg" style="width:100%">
     
            </div>

            <div class="mySlides fade">
            
            <img src="view/image/Baner3.jpg" style="width:100%">
           
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
</span>
    <span class="content2">
        <img src="view/image/bannerheader.jpg" alt="" width="100%">
        <img src="view/image/bannerheader.jpg" alt="" width="100%">
    </span>
</div>
<div class="line">
<h1>
    Danh Mục Sản Phẩm
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
    $mr = (($i == 1) || ($i == 3) || ($i == 7)) ? "mr" : "";

    // Hiển thị HTML
    echo '<div class="' . $mr . '">
        <img alt="Cây cảnh văn phòng" height="200" src="' . $anh_url . '" width="300"/>
        <p>' . $ten_san_pham . '</p>
        <p>$' . $gia . '  || <a href=""><i class="fas fa-shopping-cart"></a></i></p> 
    </div>';

    $i += 1;
}
?>



    <!-- <div class="product">
        <img alt="Cây cảnh văn phòng" height="200" src="view/image/93_2.jpg" width="300"/>
     <p>
      Đồ vật trang trí
     </p>
     <p>200.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p> 
    </div>
    <div class="product">
        <img alt="Cây cảnh văn phòng" height="200" src="view/image/102_2.jpg" width="300"/>
     <p>
      Cây cảnh để bàn
     </p>
     <p>170.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
    </div>
    <div class="product">
        <img alt="Cây cảnh văn phòng" height="200" src="view/image/90_2.jpg" width="300"/>
     <p>
      Chậu cây sen đá
     </p>
     <p>50.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
    </div>
    <div class="product">
        <img alt="Cây cảnh văn phòng" height="200" src="view/image/91_2.jpg" width="300"/>
     <p>
      Bình cây cảnh mini
     </p>
     <p>250.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
    </div>
    <div class="product">
        <img alt="Cây cảnh văn phòng" height="200" src="view/image/cay-cau-vang_450x450.jpg" width="300"/>
     <p>
      Cây cọ cảnh
     </p>
     <p>300.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
    </div>
    <div class="product">
        <img alt="Cây cảnh văn phòng" height="200" src="view/image/cay-co-canh_450x450.jpg" width="300"/>
     <p>
      Cây cảnh văn phòng
     </p>
     <p>290.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
    </div>
    <div class="product">
        <img alt="Cây cảnh văn phòng" height="200" src="view/image/cay-nguyet-que_450x450.jpg" width="300"/>
     <p>
      Cây nguyệt quế
     </p>
     <p>400.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
    </div>
    <div class="product">
        <img alt="Cây cảnh văn phòng" height="200" src="view/image/nha-mini_450x450.jpg" width="300"/>
     <p>
      Nhà Mini
     </p>
     <p>20.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
    </div>
     -->
</div>
<div class="line">
    <h1>
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
        <div class="product">
            <img alt="Cây cảnh văn phòng" height="200" src="view/image/cay-van-loc-1308199.jpg" width="300"/>
         <p>
          Cây vạn lộc
         </p>
         <p>500.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
        </div>
        <div class="product">
            <img alt="Cây cảnh văn phòng" height="200" src="view/image/images.jpg" width="300"/>
         <p>
          Cây mai vạn phúc
         </p>
         <p>320.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
        </div>
        <div class="product">
            <img alt="Cây cảnh văn phòng" height="200" src="view/image/kimtien002.jpg" width="300"/>
         <p>
          Cây Kim tiền
         </p>
         <p>430.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
        </div>
        <div class="product">
            <img alt="Cây cảnh văn phòng" height="200" src="view/image/img_20190515_162951-6909.jpg" width="300"/>
         <p>
          Cây trang thái vàng
         </p>
         <p>120.000 VNĐ || <a href=""><i class="fas fa-shopping-cart"></a></i></p>
        </div>
    </div>