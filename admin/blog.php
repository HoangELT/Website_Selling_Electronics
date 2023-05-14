<?php 
include ("../admin/includes/header.php");
?>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tất cả tin tức</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Ảnh</th>
                                <th>Ngày đăng</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $blog= getAll("blog");

                                if(mysqli_num_rows($blog) >0)
                                {
                                    foreach($blog as $item)
                                    {
                                    ?>
                                        <tr>
                                            <td><?= $item['id'];?> </td>
                                            <td><?= $item['title'];?></td>
                                            <td>
                                                <img src="../images/<?= $item['img']; ?>" width="100px" height="50px" alt="<?= $item['slug'];?>">
                                            <td>
                                                <?= date('d-m-Y', strtotime($item['created_at'])); ?>
                                            </td> 
                                            <td>
                                                <a href="edit-blog.php?id=<?= $item['id'];?>" class="btn btn-primary">Sửa</a>                                 
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <input type="hidden" name="blog_id" value="<?= $item['id']; ?>">
                                                    <button type="submit" name="delete_blog_btn" class="btn btn-danger">Xóa</button>
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