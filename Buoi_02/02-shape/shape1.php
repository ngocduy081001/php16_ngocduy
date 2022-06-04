<?php

function createMyShape($height, $character, $delimiter)
{
    for ($i = 1; $i <= $height; $i++) {
        echo str_repeat($character . $delimiter, $i) . '</br>';
    }
}
createMyShape(3, '&nbsp', '0');

echo '======================================= </br>';

function createMyShape1($height, $delimiter, $character)
{
    echo str_repeat($character, $height) . '</br>';
    for ($i = $height - 1; $i >= 0; $i--) {
        echo str_repeat($delimiter . $delimiter, $height - $i)  . str_repeat($character, $i) . '</br>';
    }
}
createMyShape1(10, '&nbsp', '*');

echo '======================================= </br>';
function createMyShape2($height, $delimiter, $character)
{
    for ($i = 0; $i <= $height; $i++) {
        echo str_repeat($delimiter . $delimiter, $height - $i)  . str_repeat($character, $i) . '</br>';
    }
}
createMyShape2(15, '&nbsp', '*');


echo '======================================= </br>';
function createMyShape3($height, $delimiter, $character)
{
    echo str_repeat($character . $delimiter . $delimiter, $height) . '</br>';
    for ($i = 2; $i <= $height; $i++) {
        echo    str_repeat($character . str_repeat($delimiter . $delimiter, $height * 2 - 3) . $character, 1) . '</br>';
    }
    echo   str_repeat($character . $delimiter . $delimiter, $height) . '</br>';
}
createMyShape3(11, '&nbsp', '*');

echo '======================================= </br>';
function createMyShape4($height, $delimiter, $character)
{
    echo str_repeat($character . $delimiter . $delimiter, $height) . '</br>';
    for ($i = 2; $i < $height; $i++) {
        if ($i == 2) {
            echo    str_repeat(str_repeat($delimiter . $delimiter, $i) . $character, 1) . '</br>';
        } else {
            echo    str_repeat(str_repeat($delimiter . $delimiter, 2 * $i - 2) . $character, 1) . '</br>';
        }
    }
    echo   str_repeat($character . $delimiter . $delimiter, $height) . '</br>';
}
createMyShape4(13, '&nbsp', '*');


echo '======================================= </br>';
function createMyShape5($height, $delimiter, $character)
{
    echo str_repeat($character . $delimiter . $delimiter, $height) . '</br>';
    for ($i = $height - 2; $i > 0; $i--) {
        if ($i == $i) {
            echo    str_repeat(str_repeat($delimiter . $delimiter, $i * 2) . $character, 1) . '</br>';
        } else {
            echo    str_repeat(str_repeat($delimiter . $delimiter, 2 * $i - 2) . $character, 1) . '</br>';
        }
    }
    echo   str_repeat($character . $delimiter . $delimiter, $height) . '</br>';
}
createMyShape5(13, '&nbsp', '*');

echo '======================================= </br>';
function createMyShape6($height, $delimiter, $character)
{

    for ($i = 1; $i <= $height; $i++) {
        echo str_repeat($character, $height - $i) . '</br>';
        for ($j = $i + 1; $j <= $i; $j++) {
            echo str_repeat($delimiter . $delimiter . $character, 2) . '</br>';
        }
    }
}
createMyShape6(13, '&nbsp', '*');