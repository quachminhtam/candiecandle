<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Đăng ký</title>
   <link rel="stylesheet" href="/candiecandle/css/style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div style="margin-bottom: 20rem;"></div>
    <?php require_once "msg.php" ?>
    
    <form action="xulydangky.php" method="post" class="loginform">
        <h1 style="text-align:center; padding:5px; color:#e79a92; font-size:30px">Đăng ký</h1>
        
        <div class="frm_row">
            <div class="cls_caption">Số điện thoại:</div>
            <div class="cls_input"><input type="int" name="user_phone" /></div>    
        </div><br style="clear: both;" />

        <div class="frm_row">
            <div class="cls_caption">Tên tài khoản:</div>
            <div class="cls_input">
                <input type="text" name="user_name" value="<?php echo isset($_GET['user_name'])?$_GET['user_name']:""; ?>" />
            </div>
        </div><br style="clear: both;" />
        
        <div class="frm_row">
            <div class="cls_caption">Mật khẩu:</div>
            <div class="cls_input"><input type="password" name="user_password" placeholder="Ít nhất 8 ký tự"/></div>    
        </div><br style="clear: both;" />
        
        <div class="frm_row">
            <div class="cls_caption">Nhập lại mật khẩu:</div>
            <div class="cls_input"><input type="password" name="user_password2" /></div>    
        </div><br style="clear: both;" />
        
        <div class="frm_row">
            <div class="cls_caption">Email:</div>
            <div class="cls_input">
                <input type="email" name="user_email" value="<?php echo isset($_GET['user_email'])?$_GET['user_email']:""; ?>" />
            </div>
        </div><br style="clear: both;" />

        <div class="frm_row">
            <div class="cls_caption">Địa chỉ:</div>
            <div class="cls_input"><input type="text" name="user_address" /></div>    
        </div><br style="clear: both;" />

        <div class="img_row">
            <input type="submit" value="Đăng ký" />
            </div>
        </div><br style="clear: both;" />
        <p style="text-align:center">Bạn đã có tài khoản? <a style="color:#e79a92" href="dangnhap.php">Đăng nhập ngay</a></p>
    
    </form>

</body>
</html>