<!-- lấy id sp -->
<?php
@include_once('../module/db_module.php');
$link = null;
taoKetNoi($link);
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

</head>

<body>


<?php
include ('header.php');
?>


<?php
    include_once('../module/db_module.php');
    include 'products.php';
    $link = NULL;
    taoKetNoi($link);
    
    if(isset($_GET['page']))
    {
        $from_p = $_GET['page'];
        $from = 6 * ($from_p-1);
    }
    else
    {   
        $_GET['page'] = 1; 
        $from = 0;
    }
    ?>
<div class="container-fluid searchpg">
    <div class="container">  
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
        </nav>
    </div>
    <div class="filter" id="filter">Bộ lọc
            <i class="fa fa-filter" id="filter-btn"></i>
        </div>
    <div class="row justify-content-center m-0">
        <div class ="filter-search col-lg-3 col-md-3 btn-group flex-column ">
            <form class = "row" method="get" action="search.php">
                <div class="col-12 bg-white">
                    <div class="filter-button d-flex justify-content-between" type="button" data-toggle="collapse" data-target="#cat" aria-expanded="false" aria-controls="collapseExample">
                        <span>Bộ sưu tập</span>
                        <i class="fas fa-chevron-down" ></i>
                    </div>
                    <div class="collapse" id="cat">
                                <?php
                                    $category = chayTruyVanTraVeDL($link,"select * from tbl_categories");                   
                                    while ($cat = mysqli_fetch_assoc($category)) {
                                    echo "   
                                    <div class='dropdown-item form-check'>
                                        <input class='form-check-input' type='radio' name='category' value='".$cat['category_name']."'>
                                        <label class='form-check-label' > ".$cat['category_name']." </label>
                                    </div>        
                                    ";
                                    }                    
                                ?>
                    </div>  
                </div>  

                <div class="col-12 bg-white">       
                    <div class="filter-button d-flex justify-content-between" type="button" data-toggle="collapse" data-target="#price" aria-expanded="false" aria-controls="collapseExample">
                        <span>Giá</span>
                        <i class="fas fa-chevron-down" ></i>
                    </div>
                    <div class="collapse" id="price">
                                <div class="form-check col-12">
                                <input class="form-check-input" type="checkbox" name="b-price" value="150000">
                                <label class="form-check-label" > Dưới 150.000 VND</label>
                                </div>
                                <div class="form-check col-12">
                                <input class="form-check-input" type="checkbox" name="m-price" value="50000">
                                <label class="form-check-label" > Từ 150.000 - 200.000 VND</label>
                                </div>   
                                <div class="form-check col-12">
                                <input class="form-check-input" type="checkbox" name="t-price" value="200000">
                                <label class="form-check-label" > Trên 200.000 VND</label>
                                </div>
                    </div>
                </div>         
                    <input type="submit" class="col-12 button mt-3" value="Lọc sản phẩm"> 
            </form>  
        </div>
        <div class="col-lg-8 col-md-8 col-sm-11 result " id = "result">
            <div class="row justify-content-center">
                <?php
                if (isset($_GET['keyword'])) { //chạy tìm kiếm
                    $result = chayTruyVanTraVeDL($link, "select * from tbl_products 
                                                        where pd_name like '%".$_GET['keyword']."%' limit $from,6");
                    showPd($result);
                    $key ='keyword';
                    $condition = $_GET['keyword'];
                    $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products 
                                                        where pd_name like '%".$_GET['keyword']."%'");}
                else { //chạy trang chủ
                    if (isset($_GET['category']))
                            {
                                $key = 'category';
                                $condition = $_GET['category'];
                                
                                if (isset($_GET['b-price'])&&isset($_GET['m-price'])&&isset($_GET['t-price']))
                                {
                                    unset($key);
                                    unset($condition);
                                }
                                if (isset($_GET['b-price'])&&isset($_GET['m-price']))
                                {
                                    $result = chayTruyVanTraVeDL($link, "select * from tbl_products inner join tbl_categories
                                                                            on tbl_products.category_id = tbl_categories.category_id 
                                                                            where (pd_price between 0 and ".$_GET['b-price']+$_GET['m-price'].")
                                                                            and
                                                                            (tbl_categories.category_name = '".$_GET['category']."')
                                                                            limit $from,6
                                                                            ");
                                    $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products inner join tbl_categories
                                                                            on tbl_products.category_id = tbl_categories.category_id 
                                                                            where (pd_price between 0 and ".$_GET['b-price']+$_GET['m-price'].")
                                                                            and
                                                                            (tbl_categories.category_name = '".$_GET['category']."')
                                                                            ");
                                    $key = "b-price=".$_GET['b-price']."&m-price=".$_GET['m-price']."&category=".$_GET['category'];
                                    $condition = null;   
                                }
                                if (isset($_GET['b-price'])&&isset($_GET['t-price']))
                                {
                                    $result = chayTruyVanTraVeDL($link, "select * from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id 
                                                                        where (pd_price < ".$_GET['b-price']." or pd_price >".$_GET['t-price'].")
                                                                        and
                                                                        (tbl_categories.category_name = '".$_GET['category']."')
                                                                        limit $from,6
                                                                        ");
                                    $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id 
                                                                        where (pd_price < ".$_GET['b-price']." or pd_price >".$_GET['t-price'].")
                                                                        and
                                                                        (tbl_categories.category_name = '".$_GET['category']."')
                                                                        ");
                                    $key = "b-price=".$_GET['b-price']."&t-price=".$_GET['t-price']."&category=".$_GET['category'];
                                    $condition = null;
                                }
                                if (isset($_GET['m-price'])&&isset($_GET['t-price']))
                                {
                                    $result = chayTruyVanTraVeDL($link, "select * from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id 
                                                                        where (pd_price > ".$_GET['t-price']-$_GET['m-price']." + 1)
                                                                        and
                                                                        (tbl_categories.category_name = '".$_GET['category']."')
                                                                        limit $from,6
                                                                        ");
                                    $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id 
                                                                        where (pd_price > ".$_GET['t-price']-$_GET['m-price']." + 1)
                                                                        and
                                                                        (tbl_categories.category_name = '".$_GET['category']."')
                                                                        ");
                                    $key = "m-price=".$_GET['m-price']."&t-price=".$_GET['t-price']."&category=".$_GET['category'];
                                    $condition = null;
                                }
                                else 
                                {
                                    if (isset($_GET['b-price'])&&!isset($_GET['m-price'])&&!isset($_GET['t-price'])) 
                                    {
                                        $result = chayTruyVanTraVeDL($link, "select * from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id 
                                                                        where (pd_price between 0 and ".$_GET['b-price'].")
                                                                        and
                                                                        (tbl_categories.category_name = '".$_GET['category']."')
                                                                        limit $from,6
                                                                        ");
                                        $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id 
                                                                        where (pd_price between 0 and ".$_GET['b-price'].")
                                                                        and
                                                                        (tbl_categories.category_name = '".$_GET['category']."')
                                                                        ");
                                        $key = "b-price=".$_GET['b-price']."&category=".$_GET['category'];
                                        $condition = null;
                                    }
                                    if (isset($_GET['m-price'])&&!isset($_GET['b-price'])&&!isset($_GET['t-price'])) 
                                    {
                                        $upper = 150000+$_GET['m-price'];
                                        $result = chayTruyVanTraVeDL($link, "select * from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id 
                                                                        where (pd_price between 150001 and $upper)
                                                                        and
                                                                        (tbl_categories.category_name = '".$_GET['category']."')
                                                                        limit $from,6
                                                                        ");
                                        $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id 
                                                                        where (pd_price between 150001 and $upper)
                                                                        and
                                                                        (tbl_categories.category_name = '".$_GET['category']."')
                                                                        ");
                                        $key = "m-price=$upper&category=".$_GET['category'];
                                        $condition = null;
                                    }
                                    if (isset($_GET['t-price'])&&!isset($_GET['m-price'])&&!isset($_GET['b-price'])) 
                                    {
                                        $result = chayTruyVanTraVeDL($link, "select * from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id 
                                                                        where (pd_price > ".$_GET['t-price'].")
                                                                        and
                                                                        (tbl_categories.category_name = '".$_GET['category']."')
                                                                        limit $from,6
                                                                        ");
                                        $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id 
                                                                        where (pd_price > ".$_GET['t-price'].")
                                                                        and
                                                                        (tbl_categories.category_name = '".$_GET['category']."')
                                                                        ");
                                        $key = "t-price=".$_GET['t-price']."&category=".$_GET['category'];
                                        $condition = null;
                                    }
                                    if (!isset($_GET['t-price'])&&!isset($_GET['m-price'])&&!isset($_GET['b-price']))
                                    {
                                        
                                        $result = chayTruyVanTraVeDL($link, "select * from tbl_products inner join tbl_categories
                                                                on tbl_products.category_id = tbl_categories.category_id
                                                                where tbl_categories.category_name = '".$_GET['category']."'
                                                                limit $from,6");
                                        $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products inner join tbl_categories
                                                                        on tbl_products.category_id = tbl_categories.category_id
                                                                        where tbl_categories.category_name = '".$_GET['category']."'
                                                                        ");
                                    }
                                    
                                }                                
                            }
                            else // lọc theo giá
                            {
                                if (isset($_GET['b-price'])&&isset($_GET['m-price'])&&isset($_GET['t-price']))
                                {
                                    unset($key);
                                    unset($condition);
                                }
                                if (isset($_GET['b-price'])&&isset($_GET['m-price']))
                                {
                                    $result = chayTruyVanTraVeDL($link, "select * from tbl_products where pd_price between 0 and ".$_GET['b-price']+$_GET['m-price']." limit $from,6");
                                    $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products where pd_price between 0 and ".$_GET['b-price']+$_GET['m-price']);
                                    $key = "b-price=".$_GET['b-price']."&m-price";
                                    $condition = $_GET['m-price'];
                                }
                                if (isset($_GET['b-price'])&&isset($_GET['t-price']))
                                {
                                    $result = chayTruyVanTraVeDL($link, "select * from tbl_products where pd_price < ".$_GET['b-price']." or pd_price >".$_GET['t-price']." limit $from,6");
                                    $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products where pd_price < ".$_GET['b-price']." or pd_price >".$_GET['t-price']);
                                    $key = "b-price=".$_GET['b-price']."&t-price";
                                    $condition = $_GET['t-price'];
                                }
                                if (isset($_GET['m-price'])&&isset($_GET['t-price']))
                                {
                                    $result = chayTruyVanTraVeDL($link, "select * from tbl_products where pd_price > ".$_GET['t-price']-$_GET['m-price']." + 1 limit $from,6");
                                    $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products where pd_price > ".$_GET['t-price']-$_GET['m-price']." + 1");
                                    $key = "m-price=".$_GET['m-price']."&t-price";
                                    $condition = $_GET['t-price'];
                                }
                                else 
                                {
                                    if (isset($_GET['b-price'])&&!isset($_GET['m-price'])&&!isset($_GET['t-price'])) 
                                    {
                                        $result = chayTruyVanTraVeDL($link, "select * from tbl_products where pd_price between 0 and ".$_GET['b-price']." limit $from,6");
                                        $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products where pd_price between 0 and ".$_GET['b-price']);
                                        $key = 'b-price';
                                        $condition = $_GET['b-price'];
                                    }
                                    if (isset($_GET['m-price'])&&!isset($_GET['b-price'])&&!isset($_GET['t-price'])) 
                                    {
                                        $upper = 150000+$_GET['m-price'];
                                        $result = chayTruyVanTraVeDL($link, "select * from tbl_products where pd_price between 150001 and $upper limit $from,6");
                                        $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products where pd_price between 150001 and $upper");
                                        $key = 'm-price';
                                        $condition = $upper;
                                    }
                                    if (isset($_GET['t-price'])&&!isset($_GET['m-price'])&&!isset($_GET['b-price'])) 
                                    {
                                        $result = chayTruyVanTraVeDL($link, "select * from tbl_products where pd_price > ".$_GET['t-price']." limit $from,6");
                                        $totalPd = chayTruyVanTraVeDL($link, "select count(*) from tbl_products where pd_price > ".$_GET['t-price']);
                                        $key = 't-price';
                                        $condition = $_GET['t-price'];
                                    }
                                    
                                }
                            }
                            if( !isset($key) && !isset($condition) && !isset($_GET['category'])) 
                                {
                                    
                                    $result = chayTruyVanTraVeDL($link, "select * from tbl_products limit $from,6");
                                    $totalPd =  chayTruyVanTraVeDL($link, "select count(*) from tbl_products");
                                    $condition = null;
                                    $key = null;
                                }
                            showPd($result);
                    }    
                ?>
                    <?php
                        showPages($totalPd,$key,$condition);
                    ?>          
            </div>
        </div>
    </div>
</div>

<?php
giaiPhongBoNho($link, $result);
?>

<script  src="/candiecandle/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
    document.querySelector('#filter').onclick = () => {
	filtersearch.classList.toggle('active');
}
</script>
</body>

</html>

