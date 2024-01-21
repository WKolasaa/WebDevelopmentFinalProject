<?php
include __DIR__ . '/../shared/header.php';
use App\Models\Product;
?>
<head>
    <title>Dashboard-Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<main class="container mt-4">
    <header class="text-center mb-5">
        <h1>Dashboard-Update</h1>
    </header>

    <section>
        <h2 class="text-center mb-4">Select a product to edit</h2>

        <form id="selectProductForm">
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <?php
                    $productID = htmlspecialchars($product['productID'] ?? 'undefined');
                    $productName = htmlspecialchars($product['productName'] ?? '');
                    $productImage = htmlspecialchars($product['productImage'] ?? '');
                    ?>

                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $product['productImage']; ?>" alt="<?php echo $product['productName']; ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['productName']; ?></h5>
                                <p class="card-text"><?php echo $product['productDescription']; ?></p>
                                <p class="card-text">Price: $<?php echo $product['productPrice']; ?></p>
                                <p class="card-text">Quantity: <?php echo $product['productQuantity']; ?></p>
                                <input type='checkbox' class='form-check-input' name='selectedProduct' value='<?php echo $productID?>'>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="button" id="editSelected" class="btn btn-primary">Edit selected product</button>
        </form>
    </section>

    <section id="editProductSection" style="display: none;">
        <h2 class="text-center mb-4">Edit product</h2>
        <form id="editProductForm" enctype="multipart/form-data">
            <!-- Dynamically populated form fields will go here -->
        </form>
    </section>
</main>

<script src="updateProduct.js"></script>
</body>