<style>
    input.register-btn {
    text-align: center;
    padding: 12px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 15px;
}
input.register-btn:hover {
    background-color: #45a049;
}
</style>
<div class="container">
            <h2>Thêm Danh Mục</h2>
            <form action="index.php?act=adddm" method="post">
            <div class="form-group">
                    <label>Mã Danh Mục</label>
                    <input type="text" id="danh_muc_id" name="danh_muc_id">
                </div>
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
      