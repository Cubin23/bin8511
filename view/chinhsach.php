<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cây Cảnh - Thiên Nhiên Và Nghệ Thuật</title>
    
    <style>
        /* Cài đặt chung cho body */

        /* Cấu trúc container chính */
        .container {
            width: 1000px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        /* Thanh breadcrumb */
        .breadcrumb {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* Tiêu đề chính */
        .title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        /* Nội dung phần giới thiệu */
        .intro, .conclusion {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        /* Danh sách cây */
        .list {
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
            line-height: 1.6;
            padding-left: 20px;
        }

        .list li {
            margin-bottom: 10px;
        }

        /* Phần bình luận */
        .comments {
            margin-top: 30px;
        }

        .comments h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 15px;
        }

        /* Chỉnh sửa phong cách các nút và phần nội dung */
        .content {
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 900px;
        }

        /* Facebook Comments styling */
        .fb-comments {
            margin-top: 20px;
        }

        /* Responsive design cho màn hình nhỏ */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            .title {
                font-size: 22px;
            }

            .list li {
                font-size: 14px;
            }

            .intro, .conclusion {
                font-size: 14px;
            }
        }
    </style>

</head>
<body>

<div class="container">
    <div class="breadcrumb">
        <a href="index.php">Trang chủ</a> » <a href="tintuc.php">Tin Tức</a>
    </div>
    
    <div class="content">
        <h1 class="title">Cây cảnh là một trong những tạo hóa đẹp nhất mà thiên nhiên đã đem đến cho con người chúng ta.</h1>
        
        <p class="intro">
            Trang bán cây cảnh là một nền tảng trực tuyến chuyên cung cấp các loại cây cảnh đa dạng, phù hợp với nhiều nhu cầu khác nhau của khách hàng. Đây là nơi mà người yêu cây có thể tìm thấy từ những loại cây dễ chăm sóc như sen đá, xương rồng đến những cây kiểng sang trọng như bonsai, cây cảnh mini, hoặc cây phong thủy.
        </p>
        
        <ul class="list">
            <li><b>Cây sen đá và xương rồng:</b> Những loại cây nhỏ gọn, dễ chăm sóc và thường được trồng trong các chậu mini để trang trí bàn làm việc hoặc nhà cửa.</li>
            <li><b>Cây bonsai:</b> Đây là loại cây cảnh có giá trị cao, được chăm sóc tỉ mỉ để tạo nên những dáng thế độc đáo, mang ý nghĩa về sự kiên nhẫn và nghệ thuật tạo hình.</li>
            <li><b>Cây phong thủy:</b> Những loại cây này giúp làm sạch không khí, trang trí không gian và mang lại cảm giác gần gũi với thiên nhiên. Một số loại phổ biến bao gồm cây lưỡi hổ, cây bàng Singapore, cây cau vàng.</li>
            <li><b>Cây cảnh trong nhà:</b> Những loại cây này giúp làm sạch không khí và tạo không gian sống xanh mát.</li>
        </ul>
        
        <p class="conclusion">
            Các trang bán cây cảnh thường cung cấp thông tin chi tiết về từng loại cây, cách chăm sóc, cũng như ý nghĩa phong thủy và trang trí của chúng. Bên cạnh đó, các trang này còn có dịch vụ tư vấn về cách bố trí cây cảnh sao cho phù hợp với không gian sống, phong thủy và sở thích của người dùng.
        </p>
        
        <div class="comments">
            <h2>Comments</h2>
            <div class="fb-comments" data-href="http://yourwebsite.com/gioithieu.php" data-numposts="5" data-width=""></div>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0"></script>

</body>
</html>
