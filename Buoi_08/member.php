<?php
session_start();
if (@$_SESSION['flagPermission'] == true) {
    if ($_SESSION['timeout'] + 20 > time()) {
        echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
        echo '<a href="logout.php">Đăng xuất</a>';
    } else {
        session_unset();
        header('location: login.php');
    }
}
