<?php
session_start();
include('../config/dbcon.php');
include('../funcs/myfunctions.php');
if (isset($_POST['add_product_btn'])) {
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $cost_per_one = $_POST['cost_per_one'];
    $quantity = $_POST['quantity'];

    $product_img = $_FILES['product_img']['name'];
    $path = '../uploads';
    $img_ext = pathinfo($product_img, PATHINFO_EXTENSION);
    $filename = time() . '.' . $img_ext;
    $cate_query = "INSERT INTO products (productname, quantity, image, cost_per_one, category) VALUES ('$product_name', '$quantity', '$filename', '$cost_per_one', '$product_category')";
    $cate_query_run = mysqli_query($con, $cate_query);

    if ($cate_query_run) {
        move_uploaded_file($_FILES['product_img']['tmp_name'], $path . '/' . $filename);

        redirect('add-category.php', 'Product added successfully');
    } else {
        redirect('add-category.php', 'Something went wrong');
    }
}
