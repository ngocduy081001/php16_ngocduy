<?php
session_start();


require_once "../connect.php";
if ($_GET) {
    $id = $_GET['id'];
    $status = ($_GET['status'] == 'active') ? "inactive" : "active";
    $chageStatus = $database->update(['status' => $status], [['id', $id]]);
    if ($chageStatus > 0) {
        $_SESSION['notice'] = 'cập nhật dữ liệu thành công';
    }
    header('location: index.php ');
    exit();
}
