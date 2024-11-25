<div class="footer">
    <div class="column">
      <h3>Liên hệ</h3>
        <div class="contact">
          <strong>
          <p>Công ty TNHH Thương mại Laria</p>
        </strong>
          <p>Cấp ngày 27/06/2018</p>
          <p>DC: 496 Nguyễn Thị Minh Khai, P.2, Q.3, TP.HCM</p>
          <p>hungabc8511@gmail.com</p>
          <p>Hotline: 1900636950</p>
        </div>
    </div>
    <div class="column">
      <h3>Giới thiệu</h3>
        <div class="about">
          <a href="">Về Framer Market</a>
          <a href="">Chính sách bảo mật</a>
          <a href="">Cam Kết chất lượng</a>
          <a href="">Hướng dẫn đặt hàng</a>
        </div>
    </div>
    <div class="column">
      <h3>Bản đồ</h3>
        <div class="about">
          <iframe allowfullscreen="" class="map" loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.015847973204!2d105.841171315402!3d21.028511993108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab8d5a1b1b1b%3A0x1b1b1b1b1b1b1b1b!2sH%C3%A0%20N%E1%BB%99i!5e0!3m2!1sen!2s!4v1633072800000!5m2!1sen!2s">
          </iframe>
        </div>
    </div>
    <div class="column">
      <h3>Kết nối</h3>
        <div class="about">
          <a href=""><img alt="Facebook page of Hội Đam Mê Cây Cảnh" height="100" src="image/z6019714294162_cfca33e6338857809167bf23c715dd2e.jpg" width="200"/></a>
        </div>
    </div>

  </div>
    <!-- js cho slide show -->
     <script>
            let slideIndex = 0;
        showSlides();

        function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
     </script>
</body>
</html>