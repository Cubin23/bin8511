<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>

    <!-- Add the CSS directly inside a <style> tag -->
    <style>
        /* General styling for the comments section */
        .row.fretitle {
            text-align: center;
            margin-bottom: 20px;
        }

        .row.fretitle h1 {
            font-size: 2rem;
            color: #333;
            margin: 0;
        }

        .row.fracontent {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        table.table-bordered {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        table.table-bordered th,
        table.table-bordered td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table.table-bordered th {
            background-color: #f4f4f4;
            font-weight: bold;
            color: #333;
        }

        table.table-bordered tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table.table-bordered tbody tr:hover {
            background-color: #eaeaea;
        }

        button.btn.btn-danger {
            padding: 5px 10px;
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.btn.btn-danger:hover {
            background-color: #c9302c;
        }

        button.btn.btn-danger:focus {
            outline: none;
        }

        /* Styling for individual table cells */
        td {
            font-size: 14px;
            color: #555;
        }

        /* Styling for empty product field */
        td:empty {
            color: #999;
            font-style: italic;
        }
    </style>
</head>

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
                    <td><?= $binhluan['binh_luan_id'] ?></td>
                    <td><?= htmlspecialchars($binhluan['noi_dung']) ?></td>
                    <td><?= htmlspecialchars($binhluan['nguoi_dung']) ?></td>
                    <td><?= htmlspecialchars($binhluan['san_pham']) ?? 'Không xác định' ?></td>
                    <td><?= $binhluan['created_at'] ?></td>
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
