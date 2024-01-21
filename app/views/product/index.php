<?php
require_once __DIR__ . '/../shared/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../../public/basketLogic.js" ></script>

</head>
<body>
<!-- Custom JavaScript for Basket Logic -->

<header class="text-center mb-5">
    <h1>Welcome to our shop!</h1>
    <p class="lead">fweionfuaibnfuiwabfndauiwfhbawiyfbawyifgawifaw</p>
</header>

<div class="container">
    <h2 class="text-center mb-4">Our Products</h2>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $product['productImage']; ?>" alt="<?php echo $product['productName']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['productName']; ?></h5>
                        <p class="card-text"><?php echo $product['productDescription']; ?></p>
                        <p class="card-text">Price: $<?php echo $product['productPrice']; ?></p>
                        <p class="card-text">Quantity: <?php echo $product['productQuantity']; ?></p>
                        <button type="button" class="btn btn-primary" onclick="addToBasket('<?php echo $product['productName']; ?>', '<?php echo $product['productPrice']; ?>')">Add to Cart</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container mt-5">
    <h2 class="text-center mb-4">Shopping Basket</h2>
    <ul id="basketList" class="list-group">
    </ul>
    <p class="text-center mt-3">
        <button type="button" class="btn btn-success" onclick="finalizeOrder()">Finalize Order</button>
    </p>
</div>

<script src="basketLogic.js"></script>

</body>
</html>
