<style>
/* Định dạng container */
.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e6e6e6;
    font-family: 'Roboto', sans-serif;
}

/* Tiêu đề */
.container h2 {
    font-size: 30px;
    text-align: center;
    margin-bottom: 25px;
    color: #2c3e50;
    font-weight: bold;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

/* Định dạng form-group */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #34495e;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    background-color: #fff;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 8px rgba(52, 152, 219, 0.2);
}

/* Định dạng nút */
.register-btn {
    width: calc(50% - 10px);
    padding: 12px 15px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    background-color: #1abc9c;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    margin: 10px 5px 0;
    display: inline-block;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.register-btn:hover {
    background-color: #16a085;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Nút liên kết "Danh sách" */
.register-btn:last-of-type {
    background-color: #3498db;
}

.register-btn:last-of-type:hover {
    background-color: #2980b9;
}

/* Định dạng textarea */
textarea {
    resize: none;
    font-family: 'Roboto', sans-serif;
}

/* Thông báo */
.container div {
    margin-top: 20px;
    text-align: center;
    color: #e74c3c;
    font-size: 16px;
    font-weight: bold;
}

/* Tạo khoảng cách giữa các phần tử */
.form-group input[type="file"] {
    padding: 5px;
}


}
</style>
<div class="container">
            <h2>Thêm Sản Phẩm</h2>
            <form action="index.php?act=addsp" method="post">
            <div class="form-group">
                    <label>Mã sản phẩm</label>
                    <input type="text" id="maloai" name="masp">
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="tensp" >
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="text" name="price" >
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="hinh" >
                </div>

                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea style="width: 340px; height: 200px" type="text" name="mota" > </textarea>
                </div>
                <div>
                <button type="submit" class="register-btn" name="them" value="them">Thêm</button>
                <a href="index.php?act=listsp"><input class="register-btn" value="Danh sách"></input></a>
                </div>
                <?php 
            if(isset($thongbao)&&($thongbao!=""))
            echo $thongbao;
            ?>
            </form>
            
        </div>
      