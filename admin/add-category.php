<?php 
include ("../admin/includes/header.php");
?>
<body>
<div class="container-fluid">   
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm danh mục sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data"><!-- Uploads image -->

                            <div class="row">
                                <div class="col-md-12">
                                    <label for=""><b>Tên danh mục</b></label>
                                    <input type="text" id="full-name" required name="name" placeholder="Hãy nhập tên danh mục" class="form-control"> 
                                </div>                               
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Tên mô tả danh mục</b></label>
                                    <input type="text" id="slug-name" required name="slug" placeholder="Hãy nhập tên mô tả danh mục" class="form-control">
                                </div>                              
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Mô tả danh mục</b></label>
                                    <input type="text" required name="description" placeholder="Hãy mô tả cho danh mục" class="form-control">
                                </div>                              
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Ảnh</b></label>
                                    <input type="file" required name="image" class="form-control">
                                </div>
                                <div class="col-md-6">
                                <br>
                                    <label for=""><b>Trạng thái</b></label>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="add_category_btn">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
<script type="text/javascript" src="./assets/js/StringConvertToSlug.js"></script>
<?php include ("../admin/includes/footer.php"); ?>