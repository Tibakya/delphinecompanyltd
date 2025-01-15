<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

if (isset($_POST['submit'])) {
    // Get the ID of the entry to delete
    $id = $_POST['id'];

    // Delete the record from the slide1 table
$stmt1 = $pdo->prepare("DELETE FROM slide1 WHERE id = :id");
$stmt1->bindParam(':id', $id, PDO::PARAM_INT);
$stmt1->execute();


// Delete the record from the slide2 table
$stmt1 = $pdo->prepare("DELETE FROM slide2 WHERE id = :id");
$stmt1->bindParam(':id', $id, PDO::PARAM_INT);
$stmt1->execute();


    // Redirect back to the list page with a success message
    echo "<script>alert('Entry deleted successfully'); window.location.href='view_latest.php';</script>";
} else {
    echo "<script>alert('Invalid request'); window.location.href='view_latest.php';</script>";
}
?>
