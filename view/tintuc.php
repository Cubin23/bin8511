<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức Cây Cảnh - Trang Web Bán Cây Cảnh</title>
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
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .article {
            background-color: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            transition: transform 0.3s ease;
        }

        .article:hover {
            transform: translateY(-10px);
        }

        .article-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .article-content {
            margin-top: 15px;
        }

        .article-title {
            font-size: 20px;
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

            .articles {
                grid-template-columns: 1fr 1fr;
            }

            .article-title {
                font-size: 18px;
            }

            .article-description {
                font-size: 14px;
            }

            .title {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .articles {
                grid-template-columns: 1fr;
            }

            .title {
                font-size: 24px;
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
            <a href="index.html">Trang chủ</a> » <a href="tintuc.html">Tin Tức Cây Cảnh</a>
        </div>

        <!-- Tiêu đề -->
        <h1 class="title">Tin Tức Mới Nhất Về Cây Cảnh</h1>

        <!-- Danh sách bài viết -->
        <div class="articles">
            <!-- Bài viết 1 -->
            <div class="article">
                <img src="view/image/93_2.jpg" alt="Cây sen đá" class="article-img">
                <div class="article-content">
                    <h2 class="article-title">Cây Cảnh là lựa chọn hàng đầu cho việc trang trí</h2>
                    <p class="article-description">Cây sen đá là loại cây dễ chăm sóc và rất thích hợp để trồng trong nhà. Cây có thể sống tốt mà không cần nhiều ánh sáng, giúp không gian thêm xanh mát. Hãy tìm hiểu về các bước chăm sóc để cây luôn phát triển khỏe mạnh.</p>
                    <a href="bai-viet1.html" style="color: #007bff;">Xem thêm</a>
                </div>
            </div>

            <!-- Bài viết 2 -->
            <div class="article">
                <img src="view/image/91_2.jpg" alt="Cây bonsai" class="article-img">
                <div class="article-content">
                    <h2 class="article-title">Cây Cảnh giúp môi trường xanh</h2>
                    <p class="article-description">Cây bonsai không chỉ là cây cảnh mà còn là một nghệ thuật. Việc tạo dáng cho cây bonsai đòi hỏi sự tỉ mỉ và kiên nhẫn. Hãy khám phá các kỹ thuật và bí quyết tạo dáng để có một cây bonsai đẹp và ấn tượng.</p>
                    <a href="bai-viet2.html" style="color: #007bff;">Xem thêm</a>
                </div>
            </div>

            <!-- Bài viết 3 -->
            <div class="article">
                <img src="view/image/90_2.jpg" alt="Cây phong thủy" class="article-img">
                <div class="article-content">
                    <h2 class="article-title">Ý nghĩa cây phong thủy</h2>
                    <p class="article-description">Cây phong thủy không chỉ giúp trang trí không gian mà còn mang lại tài lộc và may mắn. Cùng tìm hiểu những loại cây phong thủy phổ biến và cách lựa chọn chúng sao cho phù hợp với không gian sống của bạn.</p>
                    <a href="bai-viet3.html" style="color: #007bff;">Xem thêm</a>
                </div>
            </div>
        </div>

        <!-- Comments -->
        <div class="comments">
            <h2>Bình luận</h2>
            <div class="fb-comments" data-href="http://yourwebsite.com/tintuc.html" data-numposts="5" data-width="100%"></div>
        </div>
    </div>

</body>
</html>
