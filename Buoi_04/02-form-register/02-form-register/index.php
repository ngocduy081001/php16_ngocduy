<?php
require_once 'function.php';
$arrGender = ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'];
$arrClass = ['class1' => 'Class 1', 'class2' => 'Class 2', 'class3' => 'Class 3'];
$inputButton = createButton('Search', 'submit');
$arrElements = [
    createInputText('name', 'Name', '', 'text'),
    createInputText('code', 'Register Code', '', 'text'),
    createInputText('date', 'Birth date', 'input--style-2 js-datepicker', 'text'),
    createSelectedBox('gender', $arrGender, 'Gender'),
    createSelectedBox('class', $arrClass, 'Class'),
];
$xhtmlForm = '';
foreach ($arrElements as $value) {
    $xhtmlForm .= sprintf('<div class="input-group">%s</div>', $value);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'html/head.php' ?>
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST">
                        <?= $xhtmlForm ?? ''; ?>
                        <?= $inputButton ?? ''; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'html/script.php' ?>
</body>

</html>