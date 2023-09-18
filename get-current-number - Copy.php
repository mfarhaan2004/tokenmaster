<?php
session_start();

$response = [
    'currentNumber' => 0,
    'updateCurrentNumber' => false // Initialize as false
];

if (isset($_SESSION['currentNumber'])) {
    $response['currentNumber'] = $_SESSION['currentNumber'];
}

if (isset($_SESSION['updateCurrentNumber']) && $_SESSION['updateCurrentNumber']) {
    // Set updateCurrentNumber to true if it should be updated
    $response['updateCurrentNumber'] = true;
    $_SESSION['updateCurrentNumber'] = false; // Reset the flag
}

echo json_encode($response);
?>
