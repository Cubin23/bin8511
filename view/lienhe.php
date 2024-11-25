<div class="content">
    <h1>Liên hệ</h1>
    <p>
        Hãy liên hệ với chúng tôi nếu bạn có bất kỳ câu hỏi nào về sản phẩm hoặc dịch vụ.
    </p>
    <div class="contact-info">
        <p><strong>Địa chỉ:</strong> 496 Nguyễn Thị Minh Khai, P.2, Q.3, TP.HCM</p>
        <p><strong>Email:</strong> hungabc8511@gmail.com</p>
        <p><strong>Hotline:</strong> 1900 636 950</p>
    </div>
    <form action="#" method="POST">
        <h2>Gửi tin nhắn cho chúng tôi</h2>
        <label for="name">Họ và tên:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Nội dung:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br>
        <button type="submit">Gửi</button>
    </form>
</div>
<style>
    /* Phong cách chung cho nội dung */
.content {
    width: 1100px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    font-family: Arial, sans-serif;
}

/* Tiêu đề */
.content h1 {
    font-size: 2.5em;
    color: #4CAF50;
    text-align: center;
    margin-bottom: 20px;
}

/* Phần giới thiệu */
.content p {
    font-size: 1.1em;
    line-height: 1.6;
    color: #333;
    margin-bottom: 20px;
}

/* Thông tin liên hệ */
.contact-info p {
    font-size: 1.1em;
    color: #555;
}

.contact-info strong {
    color: #333;
}

/* Form liên hệ */
form {
    margin-top: 30px;
}

form h2 {
    font-size: 1.8em;
    color: #4CAF50;
    margin-bottom: 15px;
}

/* Nhãn form */
form label {
    font-size: 1.1em;
    color: #333;
    display: block;
    margin-bottom: 5px;
}

/* Input và textarea */
form input[type="text"],
form input[type="email"],
form textarea {
    width: 100%;
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    box-sizing: border-box;
}

form textarea {
    resize: vertical;
}

/* Nút gửi */
form button {
    padding: 10px 20px;
    font-size: 1.1em;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #45a049;
}

</style>
