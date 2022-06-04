<?php
$input  = "D:/GoogleDrive/Doing/__psd/luutruonghailan/youtube-luutruonghailan-tamsu.psd";

$output = [
    'name' => pathinfo($input, PATHINFO_FILENAME), 'extension' => pathinfo($input, PATHINFO_EXTENSION)
];
echo '<pre style="color: red;">';
print_r($output);
echo '</pre>';