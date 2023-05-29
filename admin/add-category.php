<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="product_category">Category</label>
                                <select class="form-select" id="floatingSelect" name="product_category">
                                    <option selected>Open this select menu</option>
                                    <option value="pencil">Pencil</option>
                                    <option value="pen">Pen</option>
                                    <option value="paper">Paper</option>
                                    <option value="notebook">Notebook</option>
                                    <option value="marker">Marker</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="cost_per_one">Cost per one</label>
                                <input type="number" class="form-control" name="cost_per_one">
                            </div>
                            <div class="col-md-4">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" name="quantity">
                            </div>
                            <div class="col-md-4">
                                <label for="product_img">Image</label>
                                <input type="file" class="form-control" name="product_img">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" name="add_product_btn" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');
