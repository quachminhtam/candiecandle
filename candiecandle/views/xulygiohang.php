<?php 
session_start();
function xoahang(){
$id = $_POST["id"];
	if (isset($_SESSION["cart"][$id])) {
		unset($_SESSION["cart"][$id]);
		header("location:giohang.php");
	}
	}
function capnhatgiohang($id,$soluong){
	if (isset($_SESSION['cart'])){

		$giohang = array();
		$giohang = $_SESSION['cart'];
		$giohang[$id]['qty']=$soluong; 
		$_SESSION['cart'] = $giohang;
		header("location:giohang.php");
	}
}
		if (isset($_POST['action'])) {
			switch ($_POST['action']){
				case "Cập nhật":
					capnhatgiohang($_POST['id'],$_POST['amount']);
					header("location:giohang.php");
					break;
				case "Xóa":
					xoahang();
					header("location:giohang.php");
					break;
			}
		}




 ?>