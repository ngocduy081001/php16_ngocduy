<?php
$str = "php/127/typescript/12/jquery/120/angular/50";
/*
     * Array
     *  (
     *      'php'           => 127
     *      'typescript'    => 12
     *      'jquery'        => 120
     *      'angular'       => 50
     *  )
     *  
     */


$arrCourse = explode('/', $str);
$result = [];

foreach ($arrCourse as $key => $value) {
    if ($key == 0) {
        $result[$value] = $arrCourse[$key + 1];
    }
    if ($key % 2 == 0) {
        $result[$value] = $arrCourse[$key + 1];
    }
}
echo '<pre style="color: red;">';
print_r($result);
echo '</pre>';