<?php 
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link); 
if (!isset($_SESSION['user_id']))
	header("Location: dangnhap.php");
$id = $_SESSION['user_id'];
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
<div class="container-fluid">
<div class="title" style="margin: 10rem 0 2rem 0">
    <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thông tin người dùng</li>
        </ol>
        </nav>
    </div>
    <h1> Xin chào </h1>
</div>

<div class="container userinfo">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#user">Thông tin tài khoản</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#order">Lịch sử đơn hàng</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="user" class="container tab-pane active"><br>
            <?php 
                $result = chayTruyVanTraVeDL($link, "select * from tbl_users where user_id= '$id' ");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo"
                            <p>Tên của bạn: ".$row['user_name']."</p>
                            <p>Số điện thoại: ".$row['user_phone']."</p>
                            <p>Email: ".$row['user_email']."</p>
                            <p>Địa chỉ: ".$row['user_address']."</p>
                    ";
            }?>
        </div>

        <div id="order" class="container tab-pane fade">
        <table class='table align-middle table-striped'>
                            <thead class='table-borderless'>
                                <tr>
                                    <th>STT</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody> 
            <?php 
                $result = chayTruyVanTraVeDL($link, " select * from tbl_orders where tbl_orders.user_id='$id'");
                $stt=0;
                if (isset($result)) {
                    foreach ($result as $value){
                        $stt +=1;
                         echo " 
                            <tr>
                                <td  class='align-middle'>".$stt."</td>
                                <td class='align-middle'>".$value['order_date']." </td>
                                <td class='align-middle'>
                                <a href='order_detail.php?id=".$value['order_id']."'>
                                <form method='get' action='order_detail.php'>
                                    <input type='hidden' name='add-to-cart' value='".$value['order_id']."'>
                                    <input type='button' class='button' value='Xem chi tiết đơn hàng'>
                                </form>
                                </a>
                                   
                                </td>
                            </tr> 
                         ";}}
                        else {
                            echo "<p id='noti'>Bạn chưa có đơn hàng nào</p>";
                    };
                    ?>
                        </tbody>
                        </table>
                          
                        
        </div>    
        
    <div class="logout ml-auto">
        <a href="dangxuat.php">
        Đăng xuất
        <i class="fa fa-right-from-bracket"></i>
        </a>
    </div>

</div>
  
<?php
    giaiPhongBoNho($link, $result);
    ?>
</div>


<script  src="/candiecandle/js/script.js"></script>
</body>

</html>