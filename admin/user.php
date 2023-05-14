<?php
include("../admin/includes/header.php");

// $users= getAll("users");
$users = getAllUsers();

?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Users table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Phone</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Address</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Total order</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Day come</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user) { ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?= $user['name'] ?></h6>
                                                        <p class="text-xs text-secondary mb-0"><?= $user['email'] ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                <?= $user['phone']?>
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $user['address']?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <?= $user['total_buy']?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= date('d-m-Y', strtotime($user['creat_at'])); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include("../admin/includes/footer.php"); ?>