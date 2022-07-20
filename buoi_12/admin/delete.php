<?php
require_once "../connect.php";
if ($_GET) {
    $data = $database->delete($_GET['id']);
    header('location: index.php');
    exit();
} else {
    header('location: index.php');
    exit();
}
