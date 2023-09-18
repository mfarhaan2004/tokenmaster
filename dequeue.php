<?php
session_start();

$response = ['currentNumber' => null, 'waitingList' => []];

if (isset($_SESSION['waitingList']) && count($_SESSION['waitingList']) > 0) {
    $currentNumber = array_shift($_SESSION['waitingList']);
    $_SESSION['currentNumber'] = $currentNumber;
    $_SESSION['updateCurrentNumber'] = true;
    $response['currentNumber'] = $currentNumber;
    $response['waitingList'] = $_SESSION['waitingList'];
}

echo json_encode($response);
?>