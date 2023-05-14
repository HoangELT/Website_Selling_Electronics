<?php 
include ("../admin/includes/header.php");
?>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $products= getAll("products");

                                if(mysqli_num_rows($products) >0)
                                {
                                    foreach($products as $item)
                                    {
                                    ?>
                                        <tr>
                                            <td><?= $item['id'];?> </td>
                                            <td><?= $item['name'];?></td>
                                            <td>
                                                <img src="../images/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name'];?>">
                                            <td>
                                                <?= $item['status'] == '0' ? "Visible":"Hidden"?>
                                            </td> 
                                            <td>
                                                <a href="edit-product.php?id=<?= $item['id'];?>" class="btn btn-primary">Edit</a>                                 
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                                                    <button type="submit" name="delete_product_btn" class="btn btn-danger">Delete</button>
                                                </form>   
                                            </td>                      
                                        </tr>
                                    <?php
                                    }
                                }else
                                {
                                    echo "No records found";
                                }
                            ?>
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include ("../admin/includes/footer.php"); ?>