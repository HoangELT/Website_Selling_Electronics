<?php 
include ("../admin/includes/header.php");
?>
<script src="./assets/js/tinymce.min.js" referrerpolicy="origin"></script>
<body>
<div class="container-fluid">   
        <div class="row">
            <div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $blog= getByID("blog", $id);

                    if(mysqli_num_rows($blog) >0)
                    {
                        $blog = mysqli_fetch_array($blog);
                        ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit blog: <?= $blog['title'] ?></h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data"><!-- Uploads image -->

                            <div class="row">
                                <input type="hidden" name="id" value="<?= $blog['id'] ?>">
                                <div class="col-md-12">
                                    <label for=""><b>Title</b></label>
                                    <input type="text" id="full-name" required name="title" placeholder="Enter Blog Name" value="<?= $blog['title'] ?>" class="form-control"> 
                                </div>                               
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Slug</b></label>
                                    <input type="text" id="slug-name" required name="slug" placeholder="Enter slug" value="<?= $blog['slug'] ?>" class="form-control">
                                </div>                                                        
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Image description</b></label>
                                    <input type="file" name="image" class="form-control">
                                    <label for="">Current Image</label>
                                    <input type="hidden" name="old_image" value="<?=$blog['img']?>">
                                    <img src="../images/<?= $blog['img']?>" height="50px" width="50px" alt="">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label class="mb-0"><b>Small Content</b></label>
                                    <textarea type="text" required="" style="height: 150px" name="small_content" placeholder="Enter Small Content" class="form-control mb-2"><?= $blog['small_content'] ?></textarea>
                                </div>
                                <div class="col-md-12">
                                <br>
                                    <label for=""><b>Content</b></label>
                                    <textarea name="content" id="myTextarea" style="height: 500px; width: 100%"><?= $blog['content'] ?></textarea>
                                </div>
                                <input type="hidden" name="update_blog_btn" value="true">
                                <div class="col-md-12">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Save blog</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                }else
                    {
                        echo "Blog not found";
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
<script>
    tinymce.init({
        selector: "#myTextarea",
    });
</script>
<?php include ("../admin/includes/footer.php"); ?>