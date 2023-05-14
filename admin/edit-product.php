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
                        $id= $_GET['id'];
                        $product = getByID("products",$id);
                        
                        if(mysqli_num_rows($product)>0)
                        {
                            $data= mysqli_fetch_array($product);

                            ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Product
                                        <a  href="products.php" class="btn btn-primary float-end "></i>Back</a>
                                        </h4>
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
                                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id']== $item['id']?'selected':'' ?> ><?= $item['name']?></option>
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
                                                <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                                <br>
                                                    <label class="mb-0"><b>Name</b></label>
                                                    <input type="text" id="full-name" required name="name" value="<?= $data['name']; ?>" placeholder="Enter Product Name" class="form-control mb-2 "> 
                                                </div>                               
                                                <div class="col-md-6">
                                                <br>
                                                    <label class="mb-0"><b>Slug</b></label>
                                                    <input type="text" id="slug-name"required name="slug" value="<?= $data['slug']; ?>" placeholder="Enter slug" class="form-control mb-2">
                                                </div>
                                                <div class="col-md-12">
                                                <br>
                                                    <label class="mb-0"><b>Small Description</b></label>
                                                    <textarea type="text" required name="small_description" placeholder="Enter Small Description" class="form-control mb-2"><?= $data['small_description']; ?></textarea>
                                                </div>                               
                                                <div class="col-md-12">
                                                <br>
                                                    <label class="mb-0"><b>Description</b></label>
                                                    <textarea type="text" required name="description"  placeholder="Enter Description" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                <br>
                                                    <label class="mb-0"><b>Original Price</b></label>
                                                    <input type="text" required name="original_price" value="<?= $data['original_price']; ?>" placeholder="Enter Original Price" class="form-control mb-2"> 
                                                </div>                               
                                                <div class="col-md-6">
                                                <br>
                                                    <label class="mb-0"><b>Selling Price</b></label>
                                                    <input type="text" required name="selling_price" value="<?= $data['selling_price']; ?>"  placeholder="Enter Selling Price" class="form-control mb-2">
                                                </div>                              
                                                <div class="col-md-12">
                                                <br>
                                                    <label class="mb-0"><b>Image</b></label>
                                                    <input type="file" name="image" class="form-control mb-2">
                                                    <label for="">Current Image</label>
                                                    <input type="hidden" name="old_image" value="<?=$data['image']?>">
                                                    <img src="../images/<?= $data['image']?>" height="50px" width="50px" alt="Prodcut Image">
                                                </div>
                                                <div class="col-md-6">
                                                <br>
                                                    <label class="mb-0"><b>Quality</b></label>
                                                    <input type="number" required name="qty" value="<?= $data['qty']; ?>" placeholder="Enter Quality" class="form-control mb-2"> 
                                                </div> 
                                                <div class="col-md-6">
                                                <br>
                                                <br>
                                                <br>
                                                    <label class="mb-0"><b>Status</b></label>
                                                    <input type="checkbox" name="status" <?= $data['status'] == '0'?'':'checked' ?>>
                                                </div>
                                                <div class="col-md-12">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                        }else
                        {
                            echo "Product Not found for given id";
                        }
                    }
                    else
                    {
                        echo "ID missing from url";
                    }
                ?>
            </div>
        </div>
    </form>
</div>
</body>
<script type="text/javascript" src="./assets/js/StringConvertToSlug.js"></script>
<?php include ("../admin/includes/footer.php"); ?>