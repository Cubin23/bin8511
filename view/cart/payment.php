<?php
tongdonhang();

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
</head>
<body>

<h2>Thông tin thanh toán</h2>
<form action="process_payment.php" method="POST">
    <label for="fullname">Họ và tên:</label>
    <input type="text" id="fullname" name="fullname" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="address">Địa chỉ:</label>
    <input type="text" id="address" name="address" required><br>

    <label for="card_number">Số thẻ (Visa/MasterCard):</label>
    <input type="text" id="card_number" name="card_number" required><br>

    <label for="amount">Số tiền (VND):</label>
    <input type="number" id="amount" name="amount" value="<?php echo $ttien; ?>" readonly><br>

    <button type="submit">Thanh toán</button>
</form>

</body>
</html>
