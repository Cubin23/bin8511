<style>
        <!-- Add the CSS directly inside a <style> tag -->
    <style>
        /* General styling for the comments section */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding-top: 30px;
        }

        .row.fretitle {
            text-align: center;
            margin-bottom: 30px;
        }

        .row.fretitle h1 {
            font-size: 2.5rem;
            color: #007BFF;
            margin: 0;
            text-transform: uppercase;
        }

        .row.fracontent {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table.table-bordered {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-top: 20px;
        }

        table.table-bordered th,
        table.table-bordered td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        table.table-bordered th {
            background-color: #007BFF;
            color: #fff;
            font-weight: bold;
        }

        table.table-bordered tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table.table-bordered tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Styling for the delete button */
        button.btn.btn-danger {
            padding: 8px 15px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 14px;
        }

        button.btn.btn-danger:hover {
            background-color: #c82333;
        }

        button.btn.btn-danger:focus {
            outline: none;
        }

        /* Styling for individual table cells */
        td {
            font-size: 14px;
            color: #555;
        }

        /* Styling for empty fields */
        td:empty {
            color: #999;
            font-style: italic;
        }

        /* Adding a responsive design */
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            table.table-bordered th,
            table.table-bordered td {
                padding: 10px;
            }

            .row.fretitle h1 {
                font-size: 2rem;
            }
        }
    </style>
</style>

<?php if (isset($listbinhluan) && is_array($listbinhluan)): ?>
<div class="row fretitle">
    <h1>DANH SÁCH BÌNH LUẬN</h1>
</div>
<div class="row fracontent">
    <table class="table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nội dung</th>
                <th>Người dùng</th>
                <th>Sản phẩm</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listbinhluan as $binhluan): ?>
                <tr>
                    <td><?= htmlspecialchars($binhluan['binh_luan_id']) ?></td>
                    <td><?= htmlspecialchars($binhluan['noi_dung']) ?></td>
                    <!-- Check if nguoi_dung_id exists -->
                    <td><?= isset($binhluan['nguoi_dung_id']) ? htmlspecialchars($binhluan['nguoi_dung_id']) : 'Chưa xác định' ?></td>
                    <td><?= isset($binhluan['san_pham_id']) ? htmlspecialchars($binhluan['san_pham_id']) : 'Không xác định' ?></td>
                    <td><?= htmlspecialchars($binhluan['created_at']) ?></td>
                    <td>
                        <a href="index.php?act=xoabl&binh_luan_id=<?= $binhluan['binh_luan_id'] ?>" 
                           onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                            <button class="btn btn-danger">Xóa</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
