<?php 
include("./includes/header.php");

$bestSellingProducts    =   getBestSelling(8);
$LatestProducts         =   getLatestProducts(8);
$blogs                  =   getBlogs($page, $search);
?>
<body>
   <!-- hero section -->
    <div class="hero">
        <div class="slider">
            <div class="container">
            <?php
                $count = 0; 
                foreach($bestSellingProducts as $product) { 
                if ($count == 3){
                    break;
                }
            ?>
                    <!-- slide item -->
                    <div class="slide">
                        <div class="info">
                            <div class="info-content">
                                <h3 class="top-down">
                                    <?= $product['name'] ?>
                                </h3>
                                <h2 class="top-down trans-delay-0-2">
                                    <?= $product['name'] ?>
                                </h2>
                                <p class="top-down trans-delay-0-4">
                                    <?= $product['small_description'] ?>
                                </p>
                                <div class="top-down trans-delay-0-6">
                                    <a href="./product-detail.php?slug=<?= $product['slug'] ?>">
                                        <button class="btn-flat btn-hover">
                                            <span>Mua ngay</span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="img right-left">
                            <img src="./images/<?= $product['image'] ?>" alt="">
                        </div>
                    </div>
                    <!-- end slide item -->
            <?php
                $count ++;
                } 
            ?>
            </div>
            <!-- slider controller -->
            <button class="slide-controll slide-next">
                <i class='bx bxs-chevron-right'></i>
            </button>
            <button class="slide-controll slide-prev">
                <i class='bx bxs-chevron-left'></i>
            </button>
            <!-- end slider controller -->
        </div>
    </div>
    <!-- end hero section -->

    <!-- promotion section -->
    <div class="promotion">
        <div class="row">
        <?php
            $count = 0; 
            foreach($LatestProducts as $product) { 
            if ($count == 3){
                break;
            }
        ?>
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3><?= $product['name'] ?></h3>
                        <a href="./product-detail.php?slug=<?= $product['slug'] ?>">
                            <button class="btn-flat btn-hover"><span>Xem chi tiết</span></button>
                        </a>
                    </div>
                    <img src="./images/<?= $product['image'] ?>" alt="">
                </div>
            </div>
        <?php
            $count ++;
            } 
        ?>
        </div>
    </div>
    <!-- end promotion section -->

    <!-- product list -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                <h2>Những sản phẩm mới nhất</h2>
            </div>
            <div class="row" id="latest-products">
                <?php
                    foreach($LatestProducts as $product) { 
                ?>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-card-img">
                            <img src="./images/<?= $product['image'] ?>" alt="">
                            <img src="./images/<?= $product['image'] ?>" alt="">
                        </div>
                        <div class="product-card-info">
                            <div class="product-btn">
                                <a href="./product-detail.php?slug=<?= $product['slug'] ?>">
                                    <button class="btn-flat btn-hover btn-shop-now">Mua ngay</button>
                                </a>
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-cart-add'></i>
                                </button>
                                
                            </div>
                            <div class="product-card-name">
                                <?= $product['name'] ?>
                            </div>
                            <div class="product-card-price">
                                <span><del>$<?= $product['original_price'] ?></del></span>
                                <span class="curr-price">$<?= $product['selling_price'] ?></span>
                            </div>
                        </div>
                    </div>  
                </div>
                <?php } ?>
            </div>
            <div class="section-footer">
                <a href="./products.php" class="btn-flat btn-hover">Xem tất cả</a>
            </div>
        </div>
    </div>
    <!-- end product list -->

    <!-- special product -->
    <div class="bg-second">
        <div class="section container">
            <div class="row">
            <?php
                foreach($bestSellingProducts as $product) { 
            ?>
                <div class="col-4 col-md-4">
                    <div class="sp-item-img">
                        <img src="./images/<?= $product['image'] ?>" alt="">
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="sp-item-info">
                        <div class="sp-item-name"><?= $product['name']?></div>
                        <p class="sp-item-description">
                            <?= $product['small_description']?>
                        </p>
                        <a href="./product-detail.php?slug=<?= $product['slug'] ?>">
                            <button class="btn-flat btn-hover">Xem chi tiết</button>
                        </a>
                    </div>
                </div>
            <?php 
                break; 
                }
            ?>
            </div>
        </div>
    </div>
    <!-- end special product -->

    <!-- product list -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                <h2>Những sản phẩm bán chạy nhất</h2>
            </div>
            <div class="row" id="best-products">
                <?php
                    foreach($bestSellingProducts as $product) { 
                ?>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-card-img">
                            <img src="./images/<?= $product['image']?>" alt="">
                            <img src="./images/<?= $product['image']?>" alt="">
                        </div>
                        <div class="product-card-info">
                            <div class="product-btn">
                                <a href="./product-detail.php?slug=<?= $product['slug'] ?>">
                                    <button class="btn-flat btn-hover btn-shop-now">Mua ngay</button>
                                </a>
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-cart-add'></i>
                                </button>
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-heart'></i>
                                </button>
                            </div>
                            <div class="product-card-name">
                                <?= $product['name']?>
                            </div>
                            <div class="product-card-price">
                                <span><del>$<?= $product['original_price']?></del></span>
                                <span class="curr-price">$<?= $product['selling_price']?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="section-footer">
                <a href="./products.php" class="btn-flat btn-hover">Xem tất cả</a>
            </div>
        </div>
    </div>
    <!-- end product list -->

    <!-- blogs -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                <h2>Bài viết mới nhất</h2>
            </div>
            <?php
                $count = 0; 
                foreach($blogs as $blog) { 
                if ($count == 2){
                    break;
                }
            ?>
            <?php if ($count == 0) { ?>
                <div class="blog">
                    <div class="blog-img">
                        <img src="./images/<?= $blog['img'] ?>" alt="">
                    </div>
                    <div class="blog-info">
                        <div class="blog-title">
                            <?= $blog['title'] ?>
                        </div>
                        <div class="blog-preview">
                            <?= $blog['small_content'] ?>
                        </div>
                        <a href="./blog-detail.php?slug=<?= $blog['slug'] ?>">
                            <button class="btn-flat btn-hover">Đọc Thêm</button>
                        </a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="blog row-revere">
                    <div class="blog-img">
                        <img src="./images/<?= $blog['img'] ?>" alt="">
                    </div>
                    <div class="blog-info">
                        <div class="blog-title">
                            <?= $blog['title'] ?>
                        </div>
                        <div class="blog-preview">
                            <?= $blog['small_content'] ?>
                        </div>
                        <a href="./blog-detail.php?slug=<?= $blog['slug'] ?>">
                            <button class="btn-flat btn-hover">Đọc Thêm</button>
                        </a>
                    </div>
                </div>
            <?php
                }
                $count ++;
            } 
            ?>
            <div class="section-footer">
                <a href="./blog.php" class="btn-flat btn-hover">Xem tất cả</a>
            </div>
        </div>
    </div>
    <!-- end blogs -->
    <?php include("./includes/footer.php") ?>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/index.js"></script>
</body>
</html>