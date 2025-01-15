<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM products WHERE id=?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        echo "<script>alert('Product deleted successfully'); window.location.href='view_products.php';</script>";
    } else {
        echo "<script>alert('Error deleting product'); window.location.href='view_products.php';</script>";
    }
}
?>