<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if (!empty($image)) {
        move_uploaded_file($image_tmp, "uploads/$image");
        $sql = "UPDATE products SET name='$name', price='$price', category='$category', image='$image' WHERE id='$id'";
    } else {
        $sql = "UPDATE products SET name='$name', price='$price', category='$category' WHERE id='$id'";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Product updated successfully'); window.location.href='view_products.php';</script>";
    } else {
        echo "<script>alert('Error updating product'); window.location.href='view_products.php';</script>";
    }
}
