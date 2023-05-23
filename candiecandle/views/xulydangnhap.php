<?php 
    session_start();

    require_once ('../module/db_module.php');
    require_once ('../model/user.php');

    $link = NULL;
    taoKetNoi($link);

    if(isset($_POST['user_phone']) && isset($_POST['user_password'])) {
        if (dangnhap($link, $_POST["user_phone"], $_POST["user_password"])) {
            giaiPhongBoNho($link, true);
            header("Location: index.php");
        }else {
            giaiPhongBoNho($link, true);
            header("Location: dangnhap.php?msg=login-fail");
        }
    }else {
        giaiPhongBoNho($link, true);
            header("Location: profile.php");
    }
?>