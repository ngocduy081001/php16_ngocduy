<?php
session_start();

echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
echo '<a href="logout.php">Đăng xuất</a>'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login</title>
</head>

<form method="post" action="process.php" name="add-form">
    <p>Time Out</p>
    <input type="text" name="timeout" value="<?= $_SESSION['timeoutnew'] ?? '' ?>">
    <input type="submit">
</form>

</html>