<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slideshow</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* Hiệu ứng hover chỉ thay đổi màu nền nhẹ */
.product:hover {
    background-color: gray;
    cursor: pointer;
}

/* Hover thay đổi màu sắc icon giỏ hàng */
.product a:hover i {
    color: red; /* Màu tối hơn khi hover vào icon */
}

    /* Slideshow container */
.slideshow-container {
  position: relative;
  max-width: 1250px;
  margin-left: 100px; /* Tạo khoảng cách 100px từ lề trái */
  overflow: hidden;
  height: 500px; /* Cố định chiều cao của slideshow container */
}



/* Hide the images by default */
.mySlides {
  display: none;
}

/* Image styling */
.slide-image {
  width: 100%; /* Chiều rộng ảnh luôn chiếm 100% chiều rộng của container */
  height: 500px; /* Cố định chiều cao ảnh là 500px (bạn có thể thay đổi giá trị này tùy ý) */
  object-fit: cover; /* Đảm bảo ảnh sẽ bao phủ toàn bộ khu vực mà không bị méo */
}



/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* Dots */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fade animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

  </style>
</head>
<body>
<br>
  <!-- Slideshow container -->
  <div class="slideshow-container">

    <!-- Slide 1 -->
    <div class="mySlides fade">
      <img src="view/image/baner2.jpg" alt="Image 1" class="slide-image">
    </div>

    <!-- Slide 2 -->
    <div class="mySlides fade">
      <img src="view/image/Baner3.jpg" alt="Image 2" class="slide-image">
    </div>

    <!-- Slide 3 -->
    <div class="mySlides fade">
      <img src="view/image/banner-bancaydep.jpg" alt="Image 3" class="slide-image">
    </div>


    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>

  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    
  </div>
  
<script>
    let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

// Auto slide with 1.5 seconds interval
let autoSlide = setInterval(function() {
  plusSlides(1);
}, 1500); // Change slide every 1.5 seconds

// Clear auto slide when user interacts with buttons
document.querySelector('.prev').addEventListener('click', () => clearInterval(autoSlide));
document.querySelector('.next').addEventListener('click', () => clearInterval(autoSlide));

</script>


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
    <div class="product">
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
    
    </body>
</html>
   