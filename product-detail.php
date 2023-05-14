<?php include("./includes/header.php") ?>;

<body>
    <?php
        if(isset($_GET['slug']))
        {
            $slug       = $_GET['slug'];
            $product    = getBySlug("products", $slug);

            if(mysqli_num_rows($product) >0)
            {
            $product        = mysqli_fetch_array($product);
            $categoryName   = getByID("categories", $product['category_id']);
            $categoryName   = mysqli_fetch_array($categoryName);
    ?>
    <!-- product-detail content -->
    <div class="bg-main">
        <div class="container">
            <div class="box">
                <div class="breadcumb">
                    <a href="index.php">Trang chủ</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="./products.php">Tất cả sản phẩm</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="#"><?= $product['name']?></a>
                </div>
            </div>

            <div class="row product-row">
                <div class="col-5 col-md-12">
                    <div class="product-img" id="product-img">
                        <img src="./images/<?= $product['image'] ?>" alt="">
                    </div>
                    <div class="box">
                        <div class="product-img-list">
                            <div class="product-img-item">
                                <img src="./images/<?= $product['image'] ?>" alt="">
                            </div>
                            <div class="product-img-item">
                                <img src="./images/<?= $product['image'] ?>" alt="">
                            </div>
                            <div class="product-img-item">
                                <img src="./images/<?= $product['image'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7 col-md-12">
                    <div class="product-info">
                        <h1>
                            <?= $product['name'] ?>
                        </h1>
                        <div class="product-info-detail">
                            <span class="product-info-detail-title">Danh mục:</span>
                            <a><?= $categoryName['name'] ?></a>
                        </div>
                        <div class="product-info-detail">
                            <span class="product-info-detail-title">Còn:</span>
                            <a><?= $product['qty'] ?></a><span class="product-info-detail-title"> Sản phẩm</span>
                        </div>
                        <div class="product-info-detail">
                            <span class="product-info-detail-title">Đánh giá:</span>
                            <span class="rating">
                                <?= avgRate($product['id']) ?>
                                <i class='bx bxs-star'></i>
                            </span>
                        </div>
                        <h3>Đặc điểm nổi bật</h3>
                        <p class="product-description">
                            <?= nl2br($product['small_description']) ?>
                        </p>
                        <div class="product-info-price">$<?= $product['selling_price'] ?></div>
                        <div class="product-quantity-wrapper">
                            <span class="product-quantity-btn" onclick="QualityChange('down')">
                                <i class='bx bx-minus'></i>
                            </span>
                            <span class="product-quantity" id="quantity-show">1</span>
                            <span class="product-quantity-btn" onclick="QualityChange('up')">
                                <i class='bx bx-plus'></i>
                            </span>
                        </div>
                        <form method="post" action="./functions/ordercode.php">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="quantity" id="quantity" value="1">
                            <input type="hidden" name="order" value="true">
                            <?php if (!isset($_SESSION['auth_user']['id'])) { ?>
                                <a href="./login.php">
                                    <button type="button" class="btn-flat btn-hover">Đăng nhập để tiếp tục</button>
                                </a>
                            <?php } else { 
                                $check = checkOrder($product['id']);
                                if ($check == 1) { ?>
                                    <a href="./cart.php">
                                        <button type="button" class="btn-flat btn-hover">Mua ngay</button>
                                    </a>
                            <?php 
                                }else{
                                    echo '<button class="btn-flat btn-hover">Thêm vào giỏi hàng</button>';
                                }
                            } 
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    Mô Tả
                </div>
                <div class="product-detail-description">
                        <p>
                            <?= nl2br($product['description']) ?>
                        </p>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    Đánh giá
                </div>
                <div>
                    <?php
                        $rates = getRate($product['id']);
                        if (mysqli_num_rows($rates) > 0){
                        foreach ($rates as $rate) {
                    ?>
                        <div class="user-rate">
                            <div class="user-info">
                                <div class="user-avt">
                                    <img src="./images/avatar.jpg" alt="">
                                </div>
                                <div class="user-name">
                                    <span class="name"><?= $rate['name'] ?></span>
                                    <span class="rating">
                                        <?php  
                                            for($i=0 ; $i<$rate['rate'] ; $i++){
                                                echo "<i class='bx bxs-star'></i>";
                                            }
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="user-rate-content">
                                <?= $rate['comment'] ?>
                            </div>
                        </div>
                    <?php 
                        }}else{
                    ?>
                        <div class="user-rate-content">
                            Chưa có lượt bình luận hoặc đánh giá nào
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
        <?php
                }
                else
                    {
                        echo '<div class="box-header" style="text-align: center;"> Product not found </div>';
                    }
                }
                else
                {
                    echo '<div class="box-header" style="text-align: center;"> Id missing from url </div>';
                }
                    ?>
    </div>
    <!-- end product-detail content -->
    <?php include("./includes/footer.php") ?>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/index.js"></script>
    <script>
        let quantity = 1;
        const QualityShower = document.getElementById('quantity-show');
        const QualityInput  = document.getElementById('quantity');
        
        function QualityChange(type){
            if (type == 'up'){
                quantity ++;
            }else{
                quantity --;
                if (quantity == 0){
                    quantity = 1;
                }
            }
            QualityShower.textContent = quantity + "";
            QualityInput.value = quantity;
        }

    </script>
</body>

</html>