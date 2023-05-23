<?php
    function showPd($result)
    {   echo" <div class = 'row justify-content-center m-0'>";
        while ($rows = mysqli_fetch_assoc($result)) {
        echo "
            <div class='card col-lg-3 col-md-5 hoverable'>
                <a href='pd_detail.php?id=" . $rows['pd_id'] . "'>
                    <img 'img' src='" .$rows['pd_img']. "' class='card-img'>
                    <div class='card-body'>
                        <h5 class='pdname' style='text-transform:none'>" .$rows['pd_name']. "</h5>
                        <p>".number_format($rows['pd_price'])." VND</p>
                    </div>
                </a>
                <div class='card-footer d-flex justify-content-center'>
                    <a href='cart.php?id=".$rows['pd_id']."'>
                        <form method='post' action='cart.php?id=".$rows['pd_id']."'>
                            <input type='hidden' name='add-to-cart' value='".$rows['pd_id']."'>
                            <button type='submit' class='button' onclick='showAlert()'>Thêm vào giỏ hàng</button>
                        </form>
                    </a>
                </div>
            </div>
        ";}
        echo "</div>";
    }

    function showPages($result, $key ,$condition)
    {   if ($result != null)
        {
            $total_r = mysqli_fetch_row($result);
            $total = $total_r[0];
            if (($total) == 0)  echo "<p id='noti'>Không có sản phẩm phù hợp</p>";
            $pages = ceil($total/6);
            echo "<div class ='col-12 '>
                        <nav aria-label='...'>
                        <ul class='pagination justify-content-center'>";
            for($i=1; $i<=$pages; $i++)            
            {   if ($key != null)
                echo "<li class='page-item'><a class='page-link' href='?$key=$condition&page=".$i.".'>".$i."</a></li>";
                else
                echo "<li class='page-item'><a class='page-link' href='?page=".$i.".'>".$i."</a></li>";
            }
            echo "      </ul>
                        </nav>
                </div>";
        }
    }

?> 


