<style>
    /* Container của form */
.container {
    width: 70%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề form */
.container h2 {
    text-align: center;
    color: #333;
    font-size: 28px;
    margin-bottom: 20px;
}

/* Các nhóm input */
.form-group {
    margin-bottom: 20px;
}

/* Label của các input */
.form-group label {
    display: block;
    font-size: 16px;
    color: #333;
    margin-bottom: 8px;
}

/* Input và textarea */
.form-group input[type="text"],
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-group textarea {
    resize: vertical;
}

/* Style cho nút submit */
button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

/* Style cho nút quay lại */
button[type="button"] {
    background-color: #f44336;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-left: 10px;
    transition: background-color 0.3s;
}

button[type="button"]:hover {
    background-color: #d32f2f;
}

/* Style cho hình ảnh hiện tại */
.form-group img {
    margin-top: 10px;
    border-radius: 5px;
}

/* Cải thiện độ sáng cho ảnh và các phần thông báo */
small {
    color: #777;
    font-size: 12px;
    margin-top: 5px;
    display: inline-block;
}

/* Style cho các phần tử nhập liệu khi có lỗi */
input:invalid, textarea:invalid, select:invalid {
    border-color: #f44336;
}

/* Cải thiện hiển thị các trường đã điền thông tin */
input:focus, textarea:focus, select:focus {
    border-color: #4CAF50;
    outline: none;
}

</style>

<?php
// Giả sử bạn đã lấy thông tin sản phẩm từ cơ sở dữ liệu theo ID sản phẩm
// Ví dụ: $sanpham = get_sanpham_by_id($san_pham_id);

if(is_array($sanpham)){
    extract($sanpham);
}
?>

<div class="container">
    <h2>Cập Nhật Sản Phẩm</h2>
    <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label>Mã Sản phẩm</label>
            <input type="text" name="san_pham_id" value="<?php echo htmlspecialchars($sanpham['san_pham_id']); ?>" required>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="ten_san_pham" value="<?php echo htmlspecialchars($sanpham['ten_san_pham']); ?>" required>
        </div>
        <div class="form-group">
            <label>Giá sản phẩm</label>
            <input type="text" name="gia" value="<?php echo htmlspecialchars($sanpham['gia']); ?>" required>
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="mo_ta" rows="5" required><?php echo htmlspecialchars($sanpham['mo_ta']); ?></textarea>
        </div>
        <div class="form-group">
            <label>Danh Mục</label>
            <select name="danh_muc_id" >
    <?php 
    // Kiểm tra xem danh mục có dữ liệu không
    if (!empty($listcategory)) {
        foreach ($listcategory as $danhmuc) {
            // Kiểm tra nếu danh mục của sản phẩm hiện tại bằng danh mục trong vòng lặp
            $selected = ($danhmuc['danh_muc_id'] == $sanpham['danh_muc_id']) ? 'selected' : '';
            echo '<option value="' . $danhmuc['danh_muc_id'] . '" ' . $selected . '>' . $danhmuc['ten_danh_muc'] . '</option>';
        }
    } else {
        echo '<option value="">Không có danh mục</option>';
    }
    ?>
</select>

        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="anh_url">
            <br>
            <img src="../upload/<?php echo $sanpham['anh_url']; ?>" alt="Hình ảnh sản phẩm hiện tại" width="80">
            <br>
            <small>Chọn ảnh mới để thay đổi hình ảnh.</small>
        </div>
        <div>
            <button type="submit" name="update" value="update">Cập nhật</button>
            <a href="index.php?act=listsp"><button type="button">Quay lại danh sách</button></a>
        </div>
    </form>
</div>
