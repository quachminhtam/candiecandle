<?php
    if(isset($_GET['msg'])) {
        if($_GET['msg']=="done"){
            echo " <div class='msg' style='background-color:green; color:white;'>
                    Bạn đã đăng ký thành công ! 
                    </div> ";
        }else if($_GET['msg']=="unvalidate-data") {
            echo " <div class='msg' style='background-color:red; color:white;'>
                    Vui lòng kiểm tra dữ liệu nhập vào !      
                    </div> ";
        }else if($_GET['msg']=="duplicate") {
            echo " <div class='msg' style='background-color:orange; color:white;'>
                    Tài khoản đã tồn tại, vui lòng chọn số điện thoại khác !      
                    </div> ";
        }else if($_GET['msg']=="login-fail") {
            echo " <div class='msg' style='background-color:red; color:white;'>
                    Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng kiểm tra lại!      
                    </div> ";
        }else if($_GET['msg']=="cart-fail") {
            echo " <div class='msg' style='background-color:orange; color:white;'>
                    Hãy đăng nhập để sử dụng chức năng này!      
                    </div> ";
        };
    }
?>

<style>
    body{font-family: 'Montserrat', sans-serif; font-size: 13px;}
    .msg{
        width: 480px;
        margin: 0px auto;
        padding: 5px;
        text-align: center;
    }

    form{width: 480px; margin: 0 auto; background-color: #fff; border-radius: 5px; padding: 1rem;}
    .cls_caption{width: 150pxl; float:left; font-size: 18px; text-align:left; margin: 1.5rem 1.5rem 0 2rem;}
    .cls_input{width: 200px; float: right; font-size: 18px; padding-right: 1rem;  margin: 1.5rem 2rem 0 1.5rem; }
    .cls_input input{width: 200px; height: 30px; float: right; padding-right: 1rem; border: solid 1px #ebebeb;}
    .img_row{text-align: center; margin-top: 2rem;}
    .img_row input{font-size: 15px; padding:1rem; margin: 0 2rem; color:#fff; background-color: #e79a92; border-radius: 2px;}
    .img_row input:hover{color:#e79a92; font-weight: bold; background-color: #fff; border: solid 2px #e79a92;}
    .frm_row{margin-top: 5px;}
    #menu{margin-bottom: 100px; text-align: right;}

</style>
