<?php 
    session_start();

    require_once "../module/db_module.php";
    require_once "../model/user.php";

    $link = NULL;
    taoKetNoi($link);

    if(dangxuat()) {
        giaiPhongBoNho($link, true);
        header("Location: index.php");
    }else {
        giaiPhongBoNho($link, true);
        //header("Content-type: text/html; charset=utf8");
        echo "Không thể đăng xuất !";
    }
?>