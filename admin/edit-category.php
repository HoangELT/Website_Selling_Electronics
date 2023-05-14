<?php 
include ("../admin/includes/header.php");
?>
<body>
<div class="container-fluid">   
        <div class="row">
            <div class="col-md-12">
                <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $category= getByID("categories", $id);

                    if(mysqli_num_rows($category) >0)
                    {
                        $data = mysqli_fetch_array($category);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Chỉnh sửa danh mục</h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data"><!-- Uploads image -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="category_id" value="<?= $data['id']?>" >
                                                <label for=""><b>Tên danh mục</b></label>
                                                <input type="text" id="full-name" required value="<?=$data['name']?>" name="name" placeholder="Hãy nhập tên danh mục" class="form-control"> 
                                            </div>                               
                                            <div class="col-md-12">
                                            <br>
                                                <label for=""><b>Tên mô tả danh mục</b></label>
                                                <input type="text" id="slug-name" required value="<?=$data['slug']?>" name="slug" placeholder="Hãy nhập tên mô tả danh mục" class="form-control">
                                            </div>                              
                                            <div class="col-md-12">
                                            <br>
                                                <label for=""><b>Mô tả danh mục</b></label>
                                                <input type="text" required value="<?=$data['description']?>" name="description" placeholder="Hãy mô tả cho danh mục" class="form-control">
                                            </div>                              
                                            <div class="col-md-12">
                                            <br>
                                                <label for=""><b>Ảnh</b></label>
                                                <input type="file" name="image" class="form-control">
                                                <label for="">Ảnh hiện tại</label>
                                                <input type="hidden" name="old_image" value="<?=$data['image']?>">
                                                <img src="../images/<?= $data['image']?>" height="50px" width="50px" alt="">

                                            </div>
                                            <div class="col-md-6">
                                            <br>
                                                <label for=""><b>Trạng thái</b></label>
                                                <input type="checkbox" <?= $data['status'] ?"checked":"" ?> name="status">
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <button type="submit" class="btn btn-primary" name="update_category_btn">Cập nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }else
                    {
                        echo "Category not found";
                    }
                }else
                {
                    echo "Id missing from url";
                }
                    ?>
            </div>
        </div>
    </form>
</div>
</body>
<script type="text/javascript" src="./assets/js/StringConvertToSlug.js"></script>
<?php include ("../admin/includes/footer.php"); ?>