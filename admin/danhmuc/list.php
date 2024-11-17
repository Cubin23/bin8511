<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách loại hàng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row">
        <div class="row fratitle">
            <h1>DANH SÁCH LOẠI HÀNG</h1>
        </div>
        <div class="row fracontent">
            <div class="row mb10 fredsloai">
                <table>
                    <tr>
                        <th><input type="checkbox" id="select_all"></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                    <?php
                    // Dữ liệu mẫu (thay thế bằng dữ liệu từ database của bạn)
                    $listDanhMuc = [
                        ['id' => 1, 'name' => 'Đồ điện tử'],
                        ['id' => 2, 'name' => 'Thời trang'],
                        ['id' => 3, 'name' => 'Đồ gia dụng']
                    ];

                    foreach ($listDanhMuc as $danhmuc) {
                        echo '<tr>
                            <td><input type="checkbox" name="selected[]" value="'.$danhmuc['id'].'"></td>
                            <td>'.$danhmuc['id'].'</td>
                            <td>'.$danhmuc['name'].'</td>
                            <td>
                                <button onclick="editCategory('.$danhmuc['id'].')">Sửa</button>
                                <button onclick="deleteCategory('.$danhmuc['id'].')">Xóa</button>
                            </td>
                        </tr>';
                    }
                    ?>
                </table>
            </div>

            <div class="row mb10">
                <input type="button" value="Chọn tất cả" onclick="selectAll()">
                <input type="button" value="Bỏ chọn tất cả" onclick="deselectAll()">
                <input type="button" value="Xóa các mục đã chọn" onclick="deleteSelected()">
                <a href="add.php"><input type="button" value="Thêm mới"></a>
            </div>
            
        </div>
    </div>

    <script>
        // JavaScript functions
        function selectAll() {
            document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = true);
        }

        function deselectAll() {
            document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
        }

        function deleteSelected() {
            const selected = Array.from(document.querySelectorAll('input[name="selected[]"]:checked'))
                                  .map(cb => cb.value);
            if (selected.length > 0) {
                alert('Xóa các mục: ' + selected.join(', '));
                // Xử lý xóa các mục đã chọn (gọi AJAX hoặc gửi request tới server)
            } else {
                alert('Vui lòng chọn ít nhất một mục để xóa.');
            }
        }

        function editCategory(id) {
            alert('Chỉnh sửa mục có ID: ' + id);
            // Chuyển hướng tới trang chỉnh sửa
            window.location.href = 'edit.php?id=' + id;
        }

        function deleteCategory(id) {
            if (confirm('Bạn có chắc chắn muốn xóa mục này?')) {
                alert('Xóa mục có ID: ' + id);
                // Xử lý xóa mục (gọi AJAX hoặc gửi request tới server)
            }
        }
    </script>
</body>
</html>
