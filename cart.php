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
        cursor: pointer;
        padding: 2px 6px;
        border-radius: 2px;
        background-color: #59e1ff;
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
                    <a href="#">Giỏ hàng của tôi</a>
                </div>
            </div>

            <div class="box" style="padding: 0 40px">
                <div class="product-info">
                <?php
                    $products = getMyOrders();
                    $total_price = 0;
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
                            <th>Tổng</th>
                            <th>Xóa</th>
                            <th>Cập nhập</th>
                        </tr>
                        <?php foreach ($products as $product){ ?>
                        <tr>
                            <td style="text-align: left;">
                                <a href="./product-detail.php?slug=<?= $product['slug']?>">
                                    <?= $product['name']?>
                                </a>
                            </td>
                            <form action="./functions/ordercode.php" method="post">
                                <td width=100>
                                    <input type="hidden" name="update_product" value="true">
                                    <input type="hidden" name="product_id" value="<?= $product['product_id']?>">
                                    <input type="hidden" class="product-price" value="<?= $product['selling_price']?>">
                                    <input type="number" name="quantity" value="<?= $product['quantity']?>" class="input-number">
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
                                    <a class="btn-buy" style="font-size: 15px; background-color: #fc8d8b" href="./functions/ordercode.php?deleteID=<?= $product['id']?>">Xóa</a>
                                </td>
                                <td>
                                    <button class="btn-buy">Cập nhập</button>
                                </td>
                            </form>
                        </tr>
                        <?php
                            $total_price +=  $product['selling_price'] * $product['quantity'];
                            } 
                        ?>
                    </table>
                    <form action="./functions/ordercode.php" method="post">
                        <input type="hidden" name="buy_product" value="true">
                        <p style="display: block;">Tổng tiền: $<?=$total_price?></p>
                        <button class="btn-buy" style="float: right;">Đặt hàng</button>
                    </form>
                <?php } ?>
                <a href="./cart-status.php">
                    <h4>Xem giỏ hàng đã mua</h4>
                </a>
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