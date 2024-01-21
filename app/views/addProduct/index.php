<?php
session_start();
require __DIR__ . '/../shared/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center">Dashboard-Add</h1>
    <form action="#" method="post" enctype="multipart/form-data" id="productForm">
        <div class="mb-3">
            <label for="title" class="form-label">Product name:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product description:</label>
            <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <textarea id="price" name="price" class="form-control" rows="1" required></textarea>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <textarea id="quantity" name="quantity" class="form-control" rows="1" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product image:</label>
            <input type="file" id="image" name="image">
        </div>
        <button type="button" class="btn btn-primary" onclick="addProduct()">Add product</button>
    </form>
</div>

<script src="addProduct.js"></script>

</body>
</html>