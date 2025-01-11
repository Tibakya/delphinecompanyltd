<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    // Delete product from the database
    $sql = "DELETE FROM products WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Product deleted successfully'); window.location.href='view_products.php';</script>";
    } else {
        echo "<script>alert('Error deleting product'); window.location.href='view_products.php';</script>";
    }
}
