<?php

require_once "./connect.php";
if ($_GET) {
    $query = 'select * from rss where id=  ' . $_GET['id'];
    $data = $database->singleRecord($query);
    if ($data['status'] == 'active') {
        $data['status'] = 'inactive';
    } else {
        $data['status'] = 'active';
    }
    $chageStatus = $database->update($data, $_GET['id']);
    header('location: index.php ');
    exit();
}
