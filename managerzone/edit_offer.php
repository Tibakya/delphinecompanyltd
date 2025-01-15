<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if (!empty($image)) {
        move_uploaded_file($image_tmp, "uploads/$image");
        $sql = "UPDATE offers SET title=?, description=?, image=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $description, $image, $id]);
    } else {
        $sql = "UPDATE offers SET title=?, description=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $description, $id]);
    }

    echo "<script>alert('Offer updated successfully'); window.location.href='view_offers.php';</script>";
} else {
    $id = $_GET['id'];
    $offer = $pdo->query("SELECT * FROM offers WHERE id='$id'")->fetch();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Offer</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $offer['id']; ?>">
        <label>Offer Title:</label>
        <input type="text" name="title" value="<?php echo $offer['title']; ?>" required><br>
        <label>Description:</label>
        <textarea name="description" required><?php echo $offer['description']; ?></textarea><br>
        <label>Image:</label>
        <input type="file" name="image"><br>
        <button type="submit" name="submit">Update Offer</button>
    </form>
</body>
</html>