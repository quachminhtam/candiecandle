<!DOCTYPE html>
<html>
<body>
<section class="container-fluid header">
	<div class="row head"  style="align-items: center;">
        <div class="icons" >
            <a class="fas fa-bars" id="menu-btn"></a>
        </div>
        <img src="/candiecandle/images/logo.PNG" class="logo"></a>
	</div>
			
    <nav class="navbar">
        <a href="/candiecandle/views/index.php">Trang chủ</a>
        <a href="/candiecandle/views/index.php#about">Về Candie Candle</a>
        <a href="/candiecandle/views/search.php">Sản phẩm</a>
        <a href="/candiecandle/views/index.php#contact">Liên hệ</a>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-search" id="search-btn"></a>
        <a href="/candiecandle/views/profile.php" class="fas fa-user" id="login-btn"></a>
        <a href="/candiecandle/views/giohang.php" id="cart-btn">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>

    <form method="get" class="search-form" action="search.php">
        <input class="col-9 form-input-control" name="keyword" id="search-box" placeholder="Tìm tên sản phẩm ở đây">
        <input type="submit" class="col-3 btn-search btn_success" value="Tìm Kiếm" />
    </form>
	
</section>
</body>
</html>