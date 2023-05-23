<?php
session_start();
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link); 
$id = $_GET['id'];
$result = chayTruyVanTraVeDL($link, "select * from tbl_products where pd_id = $id");

$product_cart = array();
foreach ($result as $value) {
    $product_cart[$value['pd_id']] = $value;
}


if(isset($_POST['add-to-cart'])&&isset($_POST['pd_amount_dt'])) {
    if (!isset($_SESSION['cart']) || $_SESSION['cart']== NULL) {
        $product_cart[$id]['qty'] = $_POST['pd_amount_dt'];
        $_SESSION['cart'][$id] = $product_cart[$id];
    }
    else {
        if (array_key_exists($id, $_SESSION['cart'])) {
            $_SESSION['cart'][$id]['qty'] += $_POST['pd_amount_dt'];
        }
        else {
            $product_cart[$id]['qty'] = $_POST['pd_amount_dt'];
            $_SESSION['cart'][$id] = $product_cart[$id];
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
else 
    if(isset($_POST['add-to-cart'])) {
    if (!isset($_SESSION['cart']) || $_SESSION['cart']== NULL) {
        $product_cart[$id]['qty'] = 1;
        $_SESSION['cart'][$id] = $product_cart[$id];
    }
    else {
        if (array_key_exists($id, $_SESSION['cart'])) {
            $_SESSION['cart'][$id]['qty'] += 1;
        }
        else {
            $product_cart[$id]['qty'] = 1;
            $_SESSION['cart'][$id] = $product_cart[$id];
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

if(isset($_POST['buy'])) {
        unset ($_SESSION["cart"]);
            $product_cart[$id]['qty'] = 1;
            $_SESSION['cart'][$id] = $product_cart[$id];
    header("location: giohang.php");

}

?>