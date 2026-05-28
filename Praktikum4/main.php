<?php
if (isset($_GET['hal'])) {
    $req = $_GET['hal'];
    include_once $req . '.php';
} else {
    include_once 'home.php';
}