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

<?php 
if(is_array($dm)){
    extract($dm);
}

?>

<div class="container">
            <h2>Cập nhật hàng hóa</h2>
            <form action="index.php?act=updatedm" method="post">
            <div class="form-group">
                    <label>Mã loại</label>
                    <input type="text" id="maloai" name="maloai" value='<?=$category_id?>'>
                </div>
                <div>
                <form method="post" action="index.php?act=updatedm">
                <input type="hidden" name="category_id" value="<?= htmlspecialchars($dm['category_id']) ?>">
                 <input type="text" name="tensp" value="<?= htmlspecialchars($dm['name']) ?>" required>
                <textarea style=" width: 300px;height: 200px" name="mota" required><?= htmlspecialchars($dm['description']) ?></textarea>
                <button type="submit" class="register-btn" name="capnhat">Cập nhật</button>
                 <a href="index.php?act=listdm" class="register-btn">Danh sách</a>
</form>
                </div>
                <?php 
            if(isset($thongbao)&&($thongbao!=""))
            echo $thongbao;
            ?>
            </form>
            
        </div>