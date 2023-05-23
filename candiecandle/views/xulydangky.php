<?php 
    session_start();

    require_once '../module/db_module.php';
    require_once '../model/user.php';

    function validateLenUP($up){
        return strlen($up)>=8&&strlen($up)<=30;
    }

    function validateEmail($user_email){
        return filter_var($user_email, FILTER_VALIDATE_EMAIL)!=false?true:false;
    }

    function validatePhone($up){
        return strlen($up)==10;
    }

    function existUserphone($link, $user_phone){
        $result = chayTruyVanTraVeDL($link, "select count(*) from tbl_users where user_phone='".$user_phone."'");
        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);
        return $row[0]>0;
    }

    function existUsername($link, $user_name){
        $result = chayTruyVanTraVeDL($link, "select count(*) from tbl_users where user_name='".$user_name."'");
        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);
        return $row[0]>0;
    }

    $link = NULL;
    taoKetNoi($link);

    if(isset($_POST['user_phone'])&&isset($_POST['user_password'])&&isset($_POST['user_password2'])&&isset($_POST['user_email'])) {
        $valid = $_POST['user_password']==$_POST['user_password2'];
        $valid = $valid&&validateLenUP($_POST['user_password']);
        $valid = $valid&&validateEmail($_POST['user_email']);
        $valid = $valid&&validatePhone($_POST['user_phone']);
        if ($valid) {
            if (existUserphone($link, $_POST['user_phone'])){
                giaiPhongBoNho($link, true);
                header("Location: dangky.php?msg=duplicate&userphone=".$_POST['user_phone']);
            }else {
                dangky($link, $_POST['user_name'], $_POST['user_email'], $_POST['user_password'],  $_POST['user_phone'],  $_POST['user_address']);
                giaiPhongBoNho($link, true);
                header("Location: dangky.php?msg=done");
            }
        }else {
            giaiPhongBoNho($link, true);
            header("Location: dangky.php?msg=unvalidate-data&userphone=".$_POST['user_phone']);
        }
    }
?>