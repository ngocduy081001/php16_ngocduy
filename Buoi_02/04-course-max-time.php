<?php
$zend = array(
    'php' => 127,
    'zend' => 107,
    'html' => 32,
    'type' => 12,
    'javascript' => 127,
);
$value = max($zend);
$result = [];
foreach ($zend as $key => $values) {
    if ($values  ==  $value)
        $result[$key] = $values;
}
echo '<pre style="color: red;">';
print_r($result);
echo '</pre>';


// Input: Danh sách khóa học
// Requirement: In ra khóa học có thời lượng video nhiều nhất
// Output: Tên khóa học - thời lượng
//                  php - 127