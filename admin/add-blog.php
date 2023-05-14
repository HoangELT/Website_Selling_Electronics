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
                        <h4>Add blog</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data"><!-- Uploads image -->

                            <div class="row">
                                <div class="col-md-12">
                                    <label for=""><b>Title</b></label>
                                    <input type="text" id="full-name" required name="title" placeholder="Enter Blog Name" class="form-control"> 
                                </div>                               
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Slug</b></label>
                                    <input type="text" id="slug-name" required name="slug" placeholder="Enter slug" class="form-control">
                                </div>                                                        
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Image description</b></label>
                                    <input type="file" required name="image" class="form-control">
                                </div>
                                <div class="col-md-12">
                                <br>
                                    <label class="mb-0"><b>Small Content</b></label>
                                    <textarea type="text" style="height: 150px" required="" name="small_content" placeholder="Enter Small Content" class="form-control mb-2"></textarea>
                                </div>
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Content</b></label>
                                    <textarea name="content" id="myTextarea" style="height: 500px"></textarea>
                                </div>
                                <input type="hidden" name="add_blog_btn" value="true">
                                <div class="col-md-12">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Create blog</button>
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