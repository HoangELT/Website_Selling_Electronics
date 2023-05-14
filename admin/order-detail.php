<?php
include("../admin/includes/header.php");

$type = $_GET['id_order'];

$orders = getOrderDetail($type);
$total=0;
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Chi tiết đặt hàng</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div style="padding-left: 20px">
                                <?php foreach($orders as $order){ ?>
                                    Tên khách hàng: <?= $order['name'] ?> <br>
                                    Số điện thoại: <?= $order['phone'] ?> <br>
                                    Email: <?= $order['email'] ?><br>
                                    Địa chỉ: <?= $order['address'] ?> <br>
                                    Trạng thái: <?php 
                                        if ($order['status'] == 2){
                                            echo '<span class="badge badge-sm bg-gradient-primary">Đã đặt hàng</span>';
                                        }else if ($order['status'] == 3){
                                            echo '<span class="badge badge-sm bg-gradient-info">Đang vận chuyển</span>';
                                        }else if ($order['status'] == 4){
                                            echo '<span class="badge badge-sm bg-gradient-success">Thành công</span>';
                                        }
                                    ?> 
                                    update to: 
                                    <?php 
                                        $id_order = $order['order_id'];
                                        if ($order['status'] == 2){
                                            echo "<a href='./code.php?order=3&id=$id_order'><span class='badge badge-sm bg-gradient-info'>Đang vận chuyển</span></a>";
                                        }else if ($order["status"] == 3){
                                            echo "<a href='./code.php?order=4&id=$id_order'><span class='badge badge-sm bg-gradient-success'>Đã giao hàng</span></a>";
                                        }else if ($order["status"] == 4){
                                            echo "<span class='badge badge-sm bg-gradient-primary'>Thành công</span>";
                                        }
                                    ?>
                                <?php break; } ?>
                            </div>
                        </div>

                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên sản phẩm</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Thông tin sản phẩm</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Thời gian đặt hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php foreach($orders as $order){ ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="../images/<?= $order['image'] ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $order['name_product'] ?></h6>
                                                    <p class="text-xs text-secondary mb-0">Giá bán: <?= $order['selling_price'] ?> VNĐ</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">Thành tiền:
                                                <?= 
                                                    $total_product= $order['quantity'] * $order['selling_price'];
                                                    $total +=$total_product;
                                                ?> VNĐ
                                            </p>
                                            <p class="text-xs text-secondary mb-0">Số lượng: <?= $order['quantity'] ?></p>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <?= date('d-m-Y', strtotime($order['created_at'])); ?>
                                            </span>
                                        </td>
                                        
                                    </tr>
                                <?php } ?> 

                                </tbody>
                            </table>
                            <div style="padding-left: 20px">
                            <h2>Tổng tiền: <?= $total ?> VNĐ</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include("../admin/includes/footer.php"); ?>