<?php 
include("./includes/header.php");
if (!isset($_SESSION['auth_user']['id'])){
    die("Từ Chối truy cập <a href='./login'>Đăng nhập ngay</a> ");
}
$id = $_GET['id'];
?>;
<link rel="stylesheet" href="./assets/css/vote.css">
<body>
    <!-- product-detail content -->
    <div class="bg-main">
        <div class="container">
            <div class="box">
                <div class="breadcumb">
                    <a href="/">Trang chủ</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="./cart.php">Giỏ hàng của tôi</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="./cart-status.php">Giỏ hàng đã mua</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="#">Đánh giá</a>
                </div>
            </div>

            <div class="box" style="padding: 0 40px">
                <div class="product-info">
                <?php
                    $product = getMyOrderVote($id);
                    if (mysqli_num_rows($product) == 0){       
                ?>
                    <p style="font-size: 20px; text-align: center;">
                      Mặt hàng này chưa thể vote <a style="color: blue; text-decoration: underline" href="./cart-status.php">Trở lại</a>  
                    </p>
                <?php 
                    } else { 
                        $product = mysqli_fetch_array($product);
                ?>
                    <div class="box" style="padding: 0 100px">
                        <div class="product-info">
                            <h1>
                                <?= $product['name'] ?>
                            </h1>
                            <p class="product-description">
                                <?= nl2br($product['small_description']) ?>
                            </p>
                        </div>
                        <br>
                        <div class="product-img" id="product-img">
                            <img src="./images/<?= $product['image'] ?>" alt="">
                        </div>
                        <br>
                        <div class="product-detail-description">
                            <?= $product['description'] ?>
                        </div>
                    </div>
                <?php } 
                ?>


                <form class="form-vote" method="post" action="./functions/ordercode.php">
                    <div class="rate-form">
                        <input type="hidden" name="rate" value="true">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" <?php if ($product['rate'] == 5) echo "checked"?> value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" <?php if ($product['rate'] == 4) echo "checked"?> value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="rating" <?php if ($product['rate'] == 3) echo "checked"?> value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2" name="rating" <?php if ($product['rate'] == 2) echo "checked"?> value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="rating" <?php if ($product['rate'] == 1) echo "checked"?> value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        </fieldset>
                    </div>
                    <br>
                    <div class="comment">
                        <textarea name="comment"><?= $product['comment'] ?></textarea>
                    </div>
                    <br>
                    <div class="comment">
                        <button class="btn-vote">
                            Đánh giá
                        </button>
                    </div>
                </form>
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
</body>
</html>