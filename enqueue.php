
<?php
session_start();

if (!isset($_SESSION['currentNumber'])) {
    $_SESSION['currentNumber'] = 0;
}

if (!isset($_SESSION['waitingList'])) {
    $_SESSION['waitingList'] = [];
}

$_SESSION['currentNumber']++;

$_SESSION['waitingList'][] = $_SESSION['currentNumber'];

echo json_encode(['currentNumber' => $_SESSION['currentNumber'], 'waitingList' => $_SESSION['waitingList']]);
?>



