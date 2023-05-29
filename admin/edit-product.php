<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getByID('products', $id);
                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);

            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" value="<?= $data['productname'] ?>" name="product_name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product_category">Category</label>
                                        <select class="form-select" value="<?= $data['category'] ?>" id="floatingSelect" name="product_category">
                                            <?php
                                            $options = array('pencil', 'pen', 'paper', 'notebook', 'marker');
                                            $output = '';
                                            for ($i = 0; $i < count($options); $i++) {
                                                $output .= "<option value='$options[$i]' " . ($data['category'] == $options[$i] ? 'selected' : '') . ">$options[$i]</option>";
                                            }
                                            ?>
                                            <?= $output; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="cost_per_one">Cost per one</label>
                                        <input type="number" value="<?= $data['cost_per_one'] ?>" class="form-control" name="cost_per_one">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" value="<?= $data['quantity'] ?>" class="form-control" name="quantity">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="product_img">Image</label>
                                        <input type="file" value="<?= $data['image'] ?>" class="form-control" name="product_img">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" name="add_product_btn" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Product not found";
                }
            } else {
                echo "ID missing from url";
            }
            ?>

        </div>
    </div>
</div>
<?php include('includes/footer.php');
