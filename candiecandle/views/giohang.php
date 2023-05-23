<?php 
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link); 

if (!isset($_SESSION['user_id']))
	header("Location: dangnhap.php?msg=cart-fail");

	if(isset($_POST['order'])) {
	$cart = $_SESSION['cart'];
    $user_id = $_SESSION['user_id'];
	$order_date = date("Y-m-d", strtotime("now"));
    $query= "insert into `tbl_orders`(`user_id`,`order_date`)  values ('$user_id','$order_date')";
    $result_order = chayTruyVanKhongTraVeDL($link,$query);
	$order = "select max(order_id) as order_id from tbl_orders";
	$order_result = chayTruyVanTraVeDL($link, $order);
	while ($id_don_hang = mysqli_fetch_array($order_result)){
		$order_id = $id_don_hang['order_id'];
		
	}
	foreach ($cart as $value){
		$pd_id = $value['pd_id'];
		$qty = $value['qty'];
		$price = $value['pd_price'];
		$order_detail = "insert into `tbl_order_details` values ('$order_id','$pd_id','$qty','$price')";
		$result_detail = chayTruyVanKhongTraVeDL($link,$order_detail);
	}
	unset($_SESSION['cart']);
	}



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
<nav aria-label="breadcrumb" class="address">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
  </ol>
</nav>
	<h1>Giỏ hàng của bạn</h1>
	<div class='order-detail'>
		<table class='table align-middle mb-0 bg-white'>
			<thead class='table-borderless'>
				<tr>
					<th>Sản phẩm</th>
					<th>Giá</th>
					<th>Số lượng</th>
					<th>Thành tiền</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
        if (isset($_SESSION['cart'])) {
		$total = 0;
			foreach ($_SESSION['cart'] as  $value) { 
		$thanhtien = 0;
		$thanhtien = $value["pd_price"]*$value["qty"];
		$total += $thanhtien;  ?>
				<tr>
					<form method="post" action="xulygiohang.php">
						<td>
							<div class='d-flex align-items-center p-2'>
								<img src="<?php echo $value['pd_img'] ?>" style='width: 60px; height: 60px'/>
								<div class='ml-3'>
									<p class='mb-1'><?php echo $value['pd_name'] ?></p>
								</div>
								<input type="hidden" name="id" value="<?php echo $value['pd_id']; ?>">
							</div>
						</td>
						<td class='align-middle' name='gia'><?php echo number_format($value['pd_price'])?> VND</td>
						<td>
							<div class='buttons_added align-middle'>
								<input class="minus is-form" id="minus" type="button" value="-" name="minus">
								<input aria-label="quantity" class="input-qty" id="amount" max="20" min="1"  name="amount" type="number" value="<?php echo $value["qty"]; ?>">
								<input class="plus is-form" id="plus" type="button" value="+" name="plus">
							</div>
						</td>
						<td class='align-middle' name='thanhtien'> VND</td>
						<td  class='align-middle'>
							<input class="cart-buttons" type="submit" name="action" value="Cập nhật">
							<input class="cart-buttons" type="submit" name="action" value="Xóa">
						</td>
					</form>
				</tr>
				<?php } ?>
				<tr>
				<th colspan='3' class='text-align:right'>Tổng cộng</th>
				<th id='tong' ></th>
				<th></th>
				
			  </tr>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-12">
			<form method='post' action='giohang.php'>
				<input type='submit' class='button' id="order" name="order" value='ĐẶT HÀNG'>
			</form>
		</div>
	</div>
	<?php
	} else echo"<tr><th colspan='5'>Giỏ hàng của bạn trống!</th></tr>";?>
	
			

</section>



<script  src="/candiecandle/js/script.js"></script>
<script>
    for (let i = 0; i < minus.length; i++)
{
	let gia = parseInt(giatien[i].innerText);
	let amount = amountElement[i].value;
	let render = (amount) => {
		amountElement[i].value = amount;
	}

	minus[i].addEventListener('click', function(){
		if(amount > 1){
			amount--;
			render(amount);
			thanhtien[i].innerHTML = (gia*amount).toLocaleString('en-US') + ",000 VND";
			tong = tong - gia;
			total.innerHTML = tong.toLocaleString('en-US') +",000 VND";
		}
		return(0);
	}); 

	plus[i].addEventListener('click', function(){
		if(amount < 20){
			amount++;
			render(amount);
		}
		thanhtien[i].innerHTML = (gia*amount).toLocaleString('en-US')+ ",000 VND";
		tong = tong + gia;
		total.innerHTML = tong.toLocaleString('en-US') +",000 VND";
	});

	amountElement[i].addEventListener('input', function(){
		amount = amountElement.value;
		amount = parseInt (amount);
		amount = (isNaN(amount)||amount == 0)?1:amount;
		render(amount);
		
	});
	thanhtien[i].innerHTML = (gia*amount).toLocaleString('en-US')+ ",000 VND";
	tong = tong + gia*amount;
}

total.innerHTML = tong.toLocaleString('en-US') +",000 VND";

</script>
</body>

</html>
