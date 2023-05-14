<?php 
$type_post = true;
include("./includes/header.php") ;
$blogs = getBlogs($page, $search);
$page ++;
?>;

<body>
    <!-- product-detail content -->
    <div class="bg-main">
        <div class="container">
            <div class="box">
                <div class="breadcumb">
                    <a href="index.php">Trang chủ</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="./blog.php">Tất cả Blog</a>
                </div>
            </div>
            
            <div class="box">
                <div class="box-header">
                    Blog dành cho bạn
                </div>
                <?php
                    foreach($blogs as $blog) { 
                ?>
                    <div class="blog-page">
                        <div class="blog-img-page">
                            <img src="./images/<?= $blog['img'] ?>" alt="">
                        </div>
                        <div class="blog-info-page">
                            <div class="blog-title-page">
                                <?= $blog['title'] ?>
                            </div>
                            <div class="blog-preview-page">
                                <?= $blog['small_content'] ?>
                            </div>
                            <a href="./blog-detail.php?slug=<?= $blog['slug'] ?>">
                                <button class="btn-flat btn-hover btn-read-page">Đọc thêm</button>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="box">
                <ul class="pagination">
                    <?php if ($page != 1) { 
                        $page--;
                        echo "<li><a href='?page=$page'><i class='bx bxs-chevron-left'></i></a></li>";
                        $page++;
                    }
                    for($i = 1 ; $i <= ceil(totalValue('blog')/10) ; $i++) { 
                        if ($i == $page) {
                            echo "<li><a class='active'>$i</a></li>";
                        }else{
                            echo "<li><a href='?page=$i'>$i</a></li>";
                        }
                    } 
                    if ($page != ceil(totalValue('blog')/10)){
                        $page ++;
                        echo "<li><a href='?page=$page'><i class='bx bxs-chevron-right'></i></a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="box">
                <div class="box-header">
                    related blog
                </div>
                <div class="row" id="related-products"></div>
            </div>
        </div>
    </div>
    <!-- end product-detail content -->
    <?php include("./includes/footer.php") ?>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/index.js"></script>
</body>

</html>