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
                                        <h4>Chỉnh sửa sản phẩm
                                        <a  href="products.php" class="btn btn-primary float-end "></i>Trở về</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST" enctype="multipart/form-data"><!-- Uploads image -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                <label class="mb-0"><b>Chọn danh mục sản phẩm</b></label>
                                                <select name="category_id" class="form-select mb-2">
                                                    <option selected>Chọn danh mục sản phẩm</option>
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
                                                            echo "Danh mục sản phẩm không hợp lệ";
                                                        }
                                                        
                                                    ?>                                  
                                                </select>
                                                </div>
                                                <div class="col-md-6">
                                                <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                                <br>
                                                    <label class="mb-0"><b>Tên sản phẩm</b></label>
                                                    <input type="text" id="full-name" required name="name" value="<?= $data['name']; ?>" placeholder="Hãy nhập tên sản phẩm" class="form-control mb-2 "> 
                                                </div>                               
                                                <div class="col-md-6">
                                                <br>
                                                    <label class="mb-0"><b>Tên mô tả sản phẩm</b></label>
                                                    <input type="text" id="slug-name"required name="slug" value="<?= $data['slug']; ?>" placeholder="Hãy nhập tên mô tả sản phẩm" class="form-control mb-2">
                                                </div>
                                                <div class="col-md-12">
                                                <br>
                                                    <label class="mb-0"><b>Mô tả sản phẩm</b></label>
                                                    <textarea type="text" required name="small_description" placeholder="Hãy mô tả sản phẩm" class="form-control mb-2"><?= $data['small_description']; ?></textarea>
                                                </div>                               
                                                <div class="col-md-12">
                                                <br>
                                                    <label class="mb-0"><b>Mô tả chi tiết sản phẩm</b></label>
                                                    <textarea type="text" required name="description"  placeholder="Hãy mô tả sản phẩm chi tiết" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                <br>
                                                    <label class="mb-0"><b>Giá gốc</b></label>
                                                    <input type="text" required name="original_price" value="<?= $data['original_price']; ?>" placeholder="Hãy nhập giá gốc" class="form-control mb-2"> 
                                                </div>                               
                                                <div class="col-md-6">
                                                <br>
                                                    <label class="mb-0"><b>Giá bán</b></label>
                                                    <input type="text" required name="selling_price" value="<?= $data['selling_price']; ?>"  placeholder="Hãy nhập giá bán" class="form-control mb-2">
                                                </div>                              
                                                <div class="col-md-12">
                                                <br>
                                                    <label class="mb-0"><b>Ảnh</b></label>
                                                    <input type="file" name="image" class="form-control mb-2">
                                                    <label for="">Ảnh hiện tại</label>
                                                    <input type="hidden" name="old_image" value="<?=$data['image']?>">
                                                    <img src="../images/<?= $data['image']?>" height="50px" width="50px" alt="Ảnh sản phẩm">
                                                </div>
                                                <div class="col-md-6">
                                                <br>
                                                    <label class="mb-0"><b>Số lượng</b></label>
                                                    <input type="number" required name="qty" value="<?= $data['qty']; ?>" placeholder="Hãy nhập số lượng sản phẩm" class="form-control mb-2"> 
                                                </div> 
                                                <div class="col-md-6">
                                                <br>
                                                <br>
                                                <br>
                                                    <label class="mb-0"><b>Trạng thái</b></label>
                                                    <input type="checkbox" name="status" <?= $data['status'] == '0'?'':'checked' ?>>
                                                </div>
                                                <div class="col-md-12">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" name="update_product_btn">Cập nhật</button>
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