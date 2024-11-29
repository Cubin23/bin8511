<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiến Thức Cây Cảnh</title>
    <style>
        /* Cài đặt chung cho body */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Phần container chính */
        .content {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Breadcrumb */
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

        /* Tiêu đề trang */
        .title {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        /* Danh sách bài viết */
        .articles {
            margin-top: 20px;
           
        }
        .articles a {
            text-decoration: none;
        }

        .article {
            display: flex;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .article-img {
            width: 30%;
            height: auto;
            border-radius: 8px;
            margin-right: 20px;
        }

        .article-content {
            width: 70%;
        }

        .article-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .article-description {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
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

        /* Facebook Comments Styling */
        .fb-comments {
            margin-top: 20px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .content {
                width: 90%;
            }

            .article {
                flex-direction: column;
                text-align: center;
            }

            .article-img {
                width: 100%;
                margin-bottom: 15px;
            }

            .article-content {
                width: 100%;
            }

            .title {
                font-size: 28px;
            }

            .article-title {
                font-size: 20px;
            }

            .article-description {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <!-- Facebook SDK -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0"></script>

    <!-- Phần nội dung -->
    <div class="content">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="index.html">Trang chủ</a> » <a href="kienthuc.html">Kiến Thức Cây Cảnh</a>
        </div>

        <!-- Tiêu đề -->
        <h1 class="title">Kiến Thức Cây Cảnh</h1>

        <!-- Danh sách bài viết -->
        <div class="articles">
            <!-- Bài viết 1 -->
            <a href="index.php?act=chamsoccaycanh">
            <div class="article">
           
                <img src="view/img/sen-da-nau.jpg" alt="Cây sen đá" class="article-img"> 
                <div class="article-content">
                    <h2 class="article-title">Cách chăm sóc cây sen đá</h2>
                    <p class="article-description">Cây sen đá là loại cây dễ chăm sóc và rất thích hợp để trồng trong nhà. Cây có thể sống tốt mà không cần nhiều ánh sáng, giúp không gian thêm xanh mát. Hãy tìm hiểu về các bước chăm sóc để cây luôn phát triển khỏe mạnh.</p>
                </div>
               
            </div>
            </a>

            <!-- Bài viết 2 -->
            <div class="article">
                <img src="view/img/taixuong.jpg" alt="Cây bonsai" class="article-img">
                <div class="article-content">
                    <h2 class="article-title">Bí quyết tạo dáng cây bonsai</h2>
                    <p class="article-description">Cây bonsai không chỉ là cây cảnh mà còn là một nghệ thuật. Việc tạo dáng cho cây bonsai đòi hỏi sự tỉ mỉ và kiên nhẫn. Hãy khám phá các kỹ thuật và bí quyết tạo dáng để có một cây bonsai đẹp và ấn tượng.</p>
                </div>
            </div>

            <!-- Bài viết 3 -->
            <div class="article">
                <img src="view/img/phongthy.jpg" alt="Cây phong thủy" class="article-img">
                <div class="article-content">
                    <h2 class="article-title">Ý nghĩa cây phong thủy</h2>
                    <p class="article-description">Cây phong thủy không chỉ giúp trang trí không gian mà còn mang lại tài lộc và may mắn. Cùng tìm hiểu những loại cây phong thủy phổ biến và cách lựa chọn chúng sao cho phù hợp với không gian sống của bạn.</p>
                </div>
            </div>
        </div>

        <!-- Comments -->
        <div class="comments">
            <h2>Bình luận</h2>
            <div class="fb-comments" data-href="http://yourwebsite.com/kienthuc.html" data-numposts="5" data-width="100%"></div>
        </div>
    </div>

</body>
</html>
