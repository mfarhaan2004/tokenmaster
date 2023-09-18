<?php
session_start();
$_SESSION['currentNumber'] = 0;
$_SESSION['waitingList'] = [];

echo json_encode(['currentNumber' => 0, 'waitingList' => []]);
?>