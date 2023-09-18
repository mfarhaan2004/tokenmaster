<?php
session_start();

if (isset($_SESSION['waitingList'])) {
    echo json_encode($_SESSION['waitingList']);
} else {
    echo '[]';
}
?>
