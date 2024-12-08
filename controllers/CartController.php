<?php
// Hàm thêm sản phẩm vào giỏ hàng
function addToCart()
{
    if (isset($_GET["id_sp"])) {

        $productId = $_GET["id_sp"];
        $productQuantity = showOne('tb_san_pham', $productId)['so_luong'];

        // Nếu chưa có giỏ hàng SESSion thì tiến hành tạo
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }

        $quantity = $_GET["quantity"] ?? 1;

        // Thêm sản phẩm vào giỏ hàng trong session
        if (isset($_SESSION["cart"][$productId])) {
            // Nếu đã có sản phẩm trong giỏ hàng session thì + 1 vào số lượng
            if ($_SESSION["cart"][$productId]['quantity'] + $quantity > $productQuantity) {
                $_SESSION['error'] = 'Số lượng sản phẩm vượt quá số lượng hiện có';
            } else {
                $_SESSION["cart"][$productId]['quantity'] += $quantity;
            }
        } else {
            // Nếu chưa cso thì thêm sản phẩm mới và để số lượng là 1
            $_SESSION["cart"][$productId] = [
                'id' => $productId,
                "quantity" => $quantity,
                'product_name' => $_GET["product_name"],
                'product_image' => $_GET["product_image"],
                'product_price' => $_GET["product_price"],
            ];
        }
    }

    header('Location: ' . BASE_URL);
    exit;
}

// Hàm hiển thị giỏ hàng
function cartIndex()
{
    // Kiểm tra xem giỏ hàng đã được khởi tạo trong session chưa
    if (isset($_SESSION["cart"])) {
        $cartItems = $_SESSION["cart"];
    }

    require_once PATH_VIEW . 'cart.php';
}

// Hàm cập nhật số lượng của sản phẩm trong giỏ hàng
function updateQuantity()
{
    if (isset($_GET['change']) && isset($_GET['id_sp'])) {
        $productId = $_GET["id_sp"];

        $change = $_GET['change'];

        $realQuantity = showOne('tb_san_pham', $productId)['so_luong'];
        if ($_SESSION["cart"][$productId]['quantity'] + $change > $realQuantity) {
            $_SESSION['error'] = 'Số lượng sản phẩm vượt quá số lượng hiện có';
            $quantitySession = $_SESSION["cart"][$productId]['quantity']; // Số lượng mới trong session
        } else {
            $quantitySession = $_SESSION["cart"][$productId]['quantity'] + $change; // Số lượng mới trong session
        }

        // Kiểm tra nếu số lượng mới nhỏ hơn hoặc bằng 0, thì cập nhật lại thành 1
        if ($quantitySession <= 0) {
            $quantitySession = 1;
        }

        // Cập nhật số lượng trong session
        $_SESSION["cart"][$productId]['quantity'] = $quantitySession;
    }

    header('Location: ' . BASE_URL . '?act=cart');
    exit;
}


// Hàm xóa sản phẩm trong giỏ hàng
function remoteCartItem()
{
    if (isset($_GET["id_sp"])) {
        // Xóa sản phẩm khỏi giỏ hàng trong session
        unset($_SESSION['cart'][$_GET["id_sp"]]);

        header('Location: ' . BASE_URL . '?act=cart');
        exit;
    }
}

// Hàm xóa tất cả sản phẩm có trong giỏ hàng
function remoteAllCart()
{
    unset($_SESSION['cart']);
    header('Location: ' . BASE_URL . '?act=cart');
    exit;
}
