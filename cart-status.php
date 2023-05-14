<?php 
include("./includes/header.php");
if (!isset($_SESSION['auth_user']['id'])){
    die("Từ Chối truy cập <a href='./login'>Đăng nhập ngay</a>");
}
?>;

<style>
    th,td{
        padding: 5px;
        text-align: center;
    }
    .input-number{
        width: 100%;
        font-size: 20px;
        outline: none;
        border: none;
    }
    .btn-buy{
        border: none;
        outline: none;
        font-size: 17px;
        padding: 2px 6px;
        border-radius: 2px;
        background-color: #59e1ff;
        display: inline-block;
    }
</style>

<body>
    <!-- product-detail content -->
    <div class="bg-main">
        <div class="container">
            <div class="box">
                <div class="breadcumb">
                    <a href="index.php">Trang chủ</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="./cart.php">Giỏ hàng của tôi</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="#">Đơn hàng</a>
                </div>
            </div>

            <div class="box" style="padding: 0 40px">
                <div class="product-info">
                <?php
                    $products = getOrderWasBuy();
                    if (mysqli_num_rows($products) == 0){
                ?>
                    <p style="font-size: 20px; text-align: center;">
                      Giỏ hàng cua bản trống. mua ngay <a style="color: blue; text-decoration: underline" href="./products.php">Tại đây</a>  
                    </p>
                <?php } else { ?>
                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                            <th> Trạng thái </th>
                            <th> Đánh giá </th>
                        </tr>
                        <?php foreach ($products as $product){ ?>
                        <tr>
                            <td style="text-align: left;">
                                <a href="./product-detail.php?slug=<?= $product['slug']?>">
                                    <?= $product['name']?>
                                </a>
                            </td>
                            <td>
                                <?= $product['quantity']?>
                            </td>
                            <td>
                                $
                                <span>
                                    <?= $product['selling_price']?>
                                </span>
                            </td>
                            <td>
                                $
                                <span class="total-price">
                                    <?= $product['selling_price'] * $product['quantity'] ?>
                                </span>
                            </td>
                            <td>
                                <?php 
                                    if ($product['status'] == '2'){
                                        echo "<div class='btn-buy' style='background-color: #f3fc8b'>Đang chuẩn bị hàng</div>";
                                    }else if($product['status'] == '3'){
                                        echo "<div class='btn-buy' style='background-color: #b4fc8b'>Đang giao hàng</div>";
                                    }else{
                                        echo "<div class='btn-buy'>Đã giao</div>";
                                    }
                                ?>
                            </td> 
                            <td>
                                <?php 
                                    if($product['status'] == 4) { 
                                        $id = $product['id'];
                                        if($product['rate'] > 0){
                                            echo "<a href='./vote.php?id=$id'> Đánh giá lại </a>";
                                        }else{
                                            echo "<a href='./vote.php?id=$id'> Đánh giá </a>";
                                        }
                                    }else{
                                        echo '<a> Chờ đánh giá </a>';
                                    }
                                ?>    
                            </td>         
                        </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
                <br>
                <br>
                </div>
            </div>
        </div>
    </div>
    <!-- end product-detail content -->
    <?php include("./includes/footer.php") ?>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
    <script>
        $(document).ready(function () {
            $('.input-number').on('change', function (e) {
                if (e.target.value == 0){
                    e.target.value = 1;
                }
                const node      = $(this).parent().parent();
                const price     = parseInt(node.find('.product-price').val());
                let total_order = parseInt(e.target.value);
                let total_price = price * total_order;
                node.find('.total-price').html(total_price);
            })
        });
    </script>
</html>