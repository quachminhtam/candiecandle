<?php 
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link); 

$od_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Candy Candle</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/candiecandle/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php
    include('header.php')
?>

<section class="container cart" id="buy">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="profile.php"> Thông tin người dùng </a></li>
            <?php 
            echo "<li class='breadcrumb-item active' aria-current='page'>Chi tiết đơn hàng</a></li>"
            ;?>
        </ol>
    </nav>

	<h1>Chi tiết đơn hàng</h1>

                    <table class="table align-middle mb-0 bg-white detail">
                    <thead class="table-borderless">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $result = chayTruyVanTraVeDL($link, " select * from tbl_order_details where order_id={$od_id}");
                        while ($row_dt = mysqli_fetch_array($result)) {
                            $thanhtien = $row_dt['pd_price'] * $row_dt['pd_quantity'];
                            $result_pd = chayTruyVanTraVeDL($link, " select * from tbl_products where pd_id={$row_dt['pd_id']}");
                            while ($row_pd = mysqli_fetch_array($result_pd)) {
                                echo "
                            <tr>
                                <td>
                                <div class='d-flex align-items-center p-2'>
                                    <img src=".$row_pd['pd_img']." style='width: 45px; height: 45px'/>
                                    <div class='ml-3'>
                                        <p class='mb-1'>".$row_pd['pd_name']."</p>
                                    </div>
                                </div>
                                </td>
                                <td  class='align-middle'>".number_format($row_dt['pd_price'])." VND</td>
                                <td  class='align-middle'>".$row_dt['pd_quantity']."</td>
                                <td  class='align-middle'>".number_format($thanhtien)." VND</td>
                            </tr>
                            ";}} ?>
                    </tbody>
                    </table>
</section>
                
</body>
</html>