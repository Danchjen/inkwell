<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');


?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Products</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product name</th>
                                <th>Product quantity</th>
                                <th>Product image</th>
                                <th>Cost per one</th>
                                <th>Product category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $product = getAll("products");
                            if (mysqli_num_rows($product) > 0) {
                                foreach ($product as $item) {
                            ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['productname'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td>
                                    <img src="../uploads/<?= $item['image'] ?>" width="50px" height="50px"
                                        alt="<?= $item['productname'] ?>">
                                </td>
                                <td><?= $item['cost_per_one'] ?></td>
                                <td><?= $item['category'] ?></td>
                                <td>
                                    <a href="edit-product.php?id=<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                            <?php
                                }
                            } else {
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
<?php include('includes/footer.php') ?>