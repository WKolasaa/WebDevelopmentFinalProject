<?php
require_once __DIR__ . '/../shared/header.php';
?>

<!-- finish.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Finish Your Order</title>
    <style>
        .col
        {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div id="passwordHelpBlock" class="form-text">
                    Order as a guest? <a href="forgot-password.php">Click here</a>
                </div>
            </div>
            <div class="col">
                <div id="passwordHelpBlock" class="form-text">
                    Order with an account? <a href="forgot-password.php">Click here</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
