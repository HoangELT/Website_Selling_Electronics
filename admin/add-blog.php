<?php 
include ("../admin/includes/header.php");
?>
<script src="./assets/js/tinymce.min.js" referrerpolicy="origin"></script>
<body>
<div class="container-fluid">   
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm tin tức</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data"><!-- Uploads image -->

                            <div class="row">
                                <div class="col-md-12">
                                    <label for=""><b>Tiêu đề</b></label>
                                    <input type="text" id="full-name" required name="title" placeholder="Hãy nhập tên tin tức" class="form-control"> 
                                </div>                               
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Tên mô tả tin tức</b></label>
                                    <input type="text" id="slug-name" required name="slug" placeholder="Hãy nhập tên mô tả tin tức" class="form-control">
                                </div>                                                        
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Ảnh mô tả</b></label>
                                    <input type="file" required name="image" class="form-control">
                                </div>
                                <div class="col-md-12">
                                <br>
                                    <label class="mb-0"><b>Nội dung</b></label>
                                    <textarea type="text" style="height: 150px" required="" name="small_content" placeholder="Hãy nhập nội dung" class="form-control mb-2"></textarea>
                                </div>
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Nội dung chi tiết</b></label>
                                    <textarea name="content" id="myTextarea" style="height: 500px"></textarea>
                                </div>
                                <input type="hidden" name="add_blog_btn" value="true">
                                <div class="col-md-12">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Tạo tin tức</button>
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
<script>
    tinymce.init({
        selector: "#myTextarea",
    });
</script>
<?php include ("../admin/includes/footer.php"); ?>