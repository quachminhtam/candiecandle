<?php
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link);
$id = $_GET['id'];
?>

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
    include('header.php')
?>

<section class="container info">
    <h4 class="heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="search.php"> Sản phẩm </a></li>
                <?php 
                $result = chayTruyVanTraVeDL($link, "select * from tbl_products where tbl_products.pd_id= {$id}" );
                $row = mysqli_fetch_array($result);
                $cat_id = $row['category_id'];
                $category = chayTruyVanTraVeDL($link,"select * from tbl_categories where category_id = $cat_id");
                $ct_row = mysqli_fetch_array($category);
                $cat_name = $ct_row['category_name'];
                echo "<li class='breadcrumb-item'><a href='search.php?category=$cat_name'>$cat_name</a></li>";
                echo "<li class='breadcrumb-item active' aria-current='page'> ".$row['pd_name']."</a></li>"
                ;?>
            </ol>
        </nav>
    </h4>
    <br>

    <div class="box row">
        <div class="image col-lg-5" style="margin-bottom:2rem" >
            <img src="<?php echo $row['pd_img']?>" width="100%" row="421">
        </div>

        <div class="content col-lg-6">
            <h2 style="font-size: x-large; text-transform:none;">Nến thơm <?php echo $row['pd_name']?></h2>  

            <div class="row" style="background-color:rgb(245, 245, 245);">
                <div class="price col-3">Giá:</div>
                <div class="cost col-7" name="gia" value="<?php echo $row['pd_price']?>"><?php echo number_format($row['pd_price'])?> VND</div>
            </div> 

            <div class="row">
                <div class="quantity col-md-3">Số lượng:</div>
                <div class="buttons_added col-md-7" id="buy_amount">
                    <input class="minus is-form" id="minus" type="button" value="-" name="minus">
                    <input aria-label="quantity" class="input-qty" id="amount" max="20" min="1"  name="amount" type="number" value="1" >
                    <input class="plus is-form" id="plus" type="button" value="+" name="plus">
                </div>
            </div>  <br>

            <div class="row buttons">
                <div class="col-lg-6">
                    <form method="post" action="cart.php?id=<?php echo $row['pd_id']?>">
                        <input type="hidden" name="add-to-cart" value="<?php echo $row['pd_id']?>">
                        <input type="hidden" name= "pd_amount_dt" id = "pd_amount_dt" value ="1">
                        <input type="submit" class="button" id="pd-buttons" value="Thêm vào giỏ hàng">
                    </form>
                </div>

                <div class="col-lg-6">
                    <form method="post" action="cart.php?id=<?php echo $row["pd_id"]?>">                            
                        <input type="hidden" name="buy" value="<?php echo $row["pd_id"]?>">
                        <input type="submit" class="button" id="pd-buttons" value="MUA NGAY">
                    </form>
                </div>
            </div>

            <div class="row description">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#mota">Mô tả sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#chitiet">Thông tin chi tiết</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="mota" class="container tab-pane active"><br>
                    <?php 
                        $result = chayTruyVanTraVeDL($link, "select * from tbl_pd_details where tbl_pd_details.pd_id= {$id}" );
                        $row = mysqli_fetch_array($result);
                        echo "
                        <h3>".$row['pd_cat']."</h3>
                        <p style='text-align: justify'> ".$row['pd_description']."</p>
                    "; ?>
                    </div>

                    <div id="chitiet" class="container tab-pane fade"><br>
                    <?php 
                        $result = chayTruyVanTraVeDL($link, "select * from tbl_pd_details where tbl_pd_details.pd_id= {$id}" );
                        $row = mysqli_fetch_array($result);
                        echo "
                            <p>Mô tả hương: ".$row['pd_scent']."</p>
                            <p>Thành phần: ".$row['pd_ingredients_wax']."</p>
                            <p>Hương thơm ".$row['pd_ingredients_smell']."</p>
                            <p>Khối lượng: ".$row['pd_weight']."</p>
                            <p>Thời gian đốt: ".$row['pd_duration']."</p>
                    "; ?>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</section>


<section class="container others">
    <div class="head">
        <h2 style="font-size: x-large;">Cùng bộ sưu tập</h2>
    </div>
    <div class = "row justify-content-right m-0">
        <?php 
        $result= chayTruyVanTraVeDL($link,"select * from tbl_products where tbl_products.category_id= {$cat_id}");
            include 'products.php';
            showPd($result);
        ?>
    </div>
</section>
   
<?php
    giaiPhongBoNho($link, $result);
?>

<section class="footer">
    <div class="credit">CandieCandle Project. Created by Nhóm chúng mình</div>
</section>

<script  src="/candiecandle/js/script.js"></script>
</body>

</html>