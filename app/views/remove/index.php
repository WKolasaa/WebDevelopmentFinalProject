<?php
include __DIR__ . '/../shared/header.php';
?>

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
<main class="container mt-4">
    <header class="text-center mb-5">
        <h1>Dashboard-Delete</h1>
    </header>

    <section>
        <h2 class="text-center mb-4"></h2>

        <!-- Form to select and delete recipes -->
        <form id="removeProductForm">
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
                                <input type='checkbox' class='form-check-input' name='selectedProducts[]' value='$productID'>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit" class="btn btn-primary">Delete Selected Recipes</button>
        </form>

    </section>
</main>


<script src="removeProduct.js"></script>
</body>

