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
include ('header.php')
?>

<section class="container about" id="about">

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/candiecandle/images/crs1.jpeg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="/candiecandle/images/crs2.png" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="/candiecandle/images/crs3.png" class="d-block w-100">
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>

  <div class="container abtus">
    <h1>CandieCandle</h1>
    <div class="col-12"></div>
    <h3 style="text-align: center;"><i>Nốt hương khởi đầu câu chuyện</i></h3>
    <p style="text-align: justify;">Giữa cuộc sống hiện đại ngày càng trở nên gấp gáp và bon chen, CandieCandle đặt ra sứ mệnh tạo nên những giá trị tinh thần quý báu, lan tỏa sự ấm áp từ trái tim đến trái tim cho cộng đồng người Việt thông qua những sản phẩm sáng tạo nghệ thuật và ứng dụng khoa học để đạt đến chất lượng tốt nhất. Một ngọn nến thắp lên, hãy cùng CandieCandle trải nghiệm những giây phút đầy an yên!</p>
  </div>
</section>

<section class="container allpd">
  <div class="title">
    <h1 style="font-size: x-large;">Sản phẩm</h1>
  </div>
  
  <div class="row justify-content-center m-0">
    <?php
      @include_once('../module/db_module.php');
      $link = null;
      taoKetNoi($link); 
      if(isset($_GET['page']))
      { $from_p = $_GET['page'];
        $from = 6 * ($from_p-1);
      }
      else
      { $_GET['page'] = 1; 
        $from = 0;
      }
      $result= chayTruyVanTraVeDL($link,"select * from tbl_products limit $from,6");
      $total= chayTruyVanTraVeDL($link,"select count(*) from tbl_products");
      include 'products.php';
      showPd($result);
      showPages($total,null,null);
    ?>
  </div>
</section>

<section class="container contact" id="contact">
    <h1 class="heading"> <span>LIÊN HỆ</span> </h1>
    <div class="row">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.472595619527!2d106.6947434!3d10.7830898!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f36c74caa99%3A0x743c446a2eef20a5!2sUniversity%20of%20Economics%20HCMC%20(UEH)%20-%20Campus%20A!5e0!3m2!1sen!2s!4v1682668987479!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>

        <form action="">
            <h3>Gửi thắc mắc cho chúng tôi</h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" placeholder="Tên của bạn">
            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" placeholder="Email của bạn">
            </div>
            <div class="inputBox">
                <span class="fas fa-phone"></span>
                <input type="number" placeholder="Số điện thoại của bạn">
            </div>
            <div class="inputBox">
                <span class="fas fa-pen"></span>
                <input type="text" placeholder="Nội dung">
            </div>
            <input type="submit" value="Gửi cho chúng tôi" class="button">
        </form>
    </div>
</section>

<section class="footer">
    <div class="share">
        <a class="fab fa-facebook-f"></a>
        <a class="fab fa-instagram"></a>
    </div>

    <div class="links">
        <a href="#home">Trang chủ</a>
        <a href="#about">Về Candie Candle</a>
        <a href="search.php">Sản phẩm</a>
        <a href="#contact">Liên hệ</a>
    </div>

    <div class="credit">CandieCandle Project. Created by Nhóm chúng mình</div>
</section>

<script  src="/candiecandle/js/script.js"></script>
</body>
</html>

