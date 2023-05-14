<?php 
include ("../admin/includes/header.php");
?>
<body>
<div class="container-fluid">   
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data"><!-- Uploads image -->
                            <div class="row">
                                <div class="col-md-12">
                                <label class="mb-0"><b>Select Category</b></label>
                                <select name="category_id" class="form-select mb-2">
                                    <option selected>Select Category</option>
                                    <?php 
                                        $categories= getAll("categories");
                                        if(mysqli_num_rows($categories)>0)
                                        {
                                                foreach($categories as $item)
                                            {
                                                ?>
                                                    <option value="<?= $item['id']; ?>">  <?= $item['name']?></option>
                                                <?php
                                            }
                                        }else
                                        {
                                            echo "No Category available";
                                        }
                                        
                                    ?>                                  
                                </select>
                                </div>
                                <div class="col-md-6">  
                                <br>
                                    <label class="mb-0"><b>Name</b></label>
                                    <input type="text" id="full-name" required name="name" placeholder="Enter Product Name" class="form-control mb-2 "> 
                                </div>                               
                                <div class="col-md-6">
                                <br>
                                    <label class="mb-0"><b>Slug</b></label>
                                    <input type="text" id="slug-name" required name="slug" placeholder="Enter slug" class="form-control mb-2">
                                </div>
                                <div class="col-md-12">
                                <br>
                                    <label class="mb-0"><b>Small Description</b></label>
                                    <textarea type="text" required name="small_description" placeholder="Enter Small Description" class="form-control mb-2"></textarea>
                                </div>                               
                                <div class="col-md-12">
                                <br>
                                    <label class="mb-0"><b>Description</b></label>
                                    <textarea type="text" required name="description" placeholder="Enter Description" class="form-control mb-2"></textarea>
                                </div>
                                <div class="col-md-6">
                                <br>
                                    <label class="mb-0"><b>Original Price</b></label>
                                    <input type="text" required name="original_price" placeholder="Enter Original Price" class="form-control mb-2"> 
                                </div>                               
                                <div class="col-md-6">
                                <br>
                                    <label class="mb-0"><b>Selling Price</b></label>
                                    <input type="text" required name="selling_price" placeholder="Enter Selling Price" class="form-control mb-2">
                                </div>                              
                                <div class="col-md-12">
                                <br>
                                    <label class="mb-0"><b>Image</b></label>
                                    <input type="file" name="image" class="form-control mb-2">
                                </div>
                                <div class="col-md-6">
                                <br>
                                    <label class="mb-0"><b>Quality</b></label>
                                    <input type="number" required name="qty" placeholder="Enter Quality" class="form-control mb-2"> 
                                </div> 
                                <div class="col-md-6">
                                <br>
                                <br>
                                <br>
                                    <label class="mb-0"><b>Status</b></label>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="add_product_btn">Add</button>
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