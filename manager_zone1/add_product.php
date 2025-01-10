<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<main class="app-main">
    <div class="app-content">
        <div class="container-fluid">
            <h3>Add Product</h3>
            <form action="manage_products.php" method="POST">
                <div class="form-group">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="product_name" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="productPrice">Product Price:</label>
                    <input type="text" id="productPrice" name="product_price" class="form-control" required />
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>
