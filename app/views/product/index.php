<?php
include __DIR__ . '/../shared/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <main class="container mt-4">
        <header class="text-center mb-5">
            <h1>Welcome to our Shop!!</h1>
            <p class="lead">CHECK WADJ*(AWDH*(AWDW</p>
        </header>

        <!-- Our Recipes Section -->
        <section>
            <h2 class="text-center mb-4">Our Products</h2>
            <div class="row">
                <?php
                foreach ($products as $recipe) {
                    echo "<div class='col-md-4 mb-3'>";
                    echo "<div class='card h-100'>"; // 'h-100' makes all cards of equal height
                    echo "<img src='https://www.oogio.net/wp-content/uploads/2018/11/American_chocolate_cake6-s.jpg' class='card-img-top' alt='Recipe Image'>"; // Replace with actual image path
                    echo "<div class='card-body d-flex flex-column'>"; // Flex to align content
                    echo "<h5 class='card-title'>" . htmlspecialchars($recipe->Title ?? '') . "</h5>";
                    echo "<p class='card-text'>" . htmlspecialchars($recipe->Description ?? '') . "</p>";
                    echo "<p>Preparation Time: " . htmlspecialchars($recipe->PreparationTime ?? 0) . " mins</p>";
                    echo "<p>Cooking Time: " . htmlspecialchars($recipe->CookingTime ?? 0) . " mins</p>";
                    echo "<p>Serving Size: " . htmlspecialchars($recipe->ServingSize ?? 0) . "</p>";
                    echo "<p>Date Posted: " . htmlspecialchars($recipe->DatePosted ?? '') . "</p>";

                    // Like Button
                    echo "<button class='like-button' data-recipe-id='" . htmlspecialchars($recipe->ID) . "'>Like</button>";

                    echo "</div>"; // Close card-body
                    echo "</div>"; // Close card
                    echo "</div>"; // Close col-md-4
                }
                ?>
            </div>
        </section>
    </main>

<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
</body>