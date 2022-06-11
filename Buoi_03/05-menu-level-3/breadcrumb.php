<?php
require_once 'data.php';
$xhtmlBreadCrumb = '';
$currentBreadCrumb = $arrBreadCrumb[$currentMenu];
if ($currentMenu  == 'index') {
    $xhtmlBreadCrumb .= '<spam>Home</spam>';
} else {
    $xhtmlBreadCrumb .= '<a href="index.php">Home</a><spam>></spam>';
    foreach ($currentBreadCrumb as $key => $value) {
        if ($currentBreadCrumb[count($currentBreadCrumb) - 1] == $value)
            $xhtmlBreadCrumb .= sprintf('<spam>%s</spam>', $value['name']);
        else
            $xhtmlBreadCrumb .= sprintf('<a  href="%s">%s</a><spam>></spam>', $value['link'], $value['name']);
    }
}