<style>
   /* Định dạng container */
.container {
    max-width: 500px;
    margin: 50px auto;
    padding: 25px 30px;
    background: #fdfdfd;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid #eaeaea;
    font-family: 'Roboto', sans-serif;
}

/* Tiêu đề */
.container h2 {
    font-size: 28px;
    text-align: center;
    margin-bottom: 20px;
    color: #2c3e50;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Định dạng form-group */

.form-group input {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    transition: all 0.3s ease;
    background-color: #fff;
}

.form-group input:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 8px rgba(52, 152, 219, 0.2);
}

/* Nút bấm */
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
    margin-top: 10px;
    text-align: center;
    text-decoration: none;
    transition: all 0.3s ease;
}

.register-btn:hover {
    background-color: #16a085;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.register-btn:last-of-type {
    background-color: #3498db;
}

.register-btn:last-of-type:hover {
    background-color: #2980b9;
}

/* Hiển thị thông báo */
.container div {
    margin-top: 20px;
    text-align: center;
    color: #e74c3c;
    font-size: 16px;
    font-weight: bold;
}

/* Tạo khoảng cách giữa các nút */
.container div a {
    margin-left: 10px;
}

</style>
<div class="container">
            <h2>Thêm Danh Mục</h2>
            <form action="index.php?act=adddm" method="post">
                <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <input type="text" name="ten_danh_muc" >
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="" name="mo_ta" >
                </div>
                <div>
                <button type="submit" class="register-btn" name="them" value="them">Thêm</button>
                <a href="index.php?act=listdm"><input class="register-btn" value="Danh sách"></input></a>
                </div>
                <?php 
            if(isset($thongbao)&&($thongbao!=""))
            echo $thongbao;
            ?>
            </form>
            
        </div>
      