<?php
require_once __DIR__ . '/singletonPattern.php';

$singleton = Singleton::getInstance();
$loggedInStatus = $singleton->isLoggedIn();

// Return the status as JSON
header('Content-Type: application/json');
echo json_encode(['isLoggedIn' => $loggedInStatus]);
?>