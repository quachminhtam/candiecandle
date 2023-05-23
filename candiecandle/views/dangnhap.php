<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Đăng nhập</title>
   <link rel="stylesheet" href="/candiecandle/css/style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div style="margin-bottom: 20rem;"></div>
    <?php require_once "msg.php" ?>
    <form action="xulydangnhap.php" method="post" class="loginform">
        <h1 style="text-align:center; padding:5px; color:#e79a92; font-size:30px">Đăng nhập</h1>
        <div class="frm_row">
            <div class="cls_caption">Số điện thoại:</div>
            <div class="cls_input"><input type="text" name="user_phone" /></div>
        </div><br style="clear: both;" />
        <div class="frm_row">
        <div class="cls_caption">Mật khẩu:</div>
            <div class="cls_input"><input type="password" name="user_password" /></div>    
        </div><br style="clear: both;" />
        <div class="img_row">
            <input type="submit" value="Đăng nhập" />
        </div><br style="clear: both;" />
        <p style="text-align:center">Chưa có tài khoản? <a style="color:#e79a92" href="dangky.php">Đăng ký ngay</a></p>

    </form>
    

</body>
</html>