<?php
require_once '../connect.php';
require_once '../libs/HTML.php';
require_once '../libs/Validate.php';
require_once '../libs/FORM.php';
$arrSelectedValue = ['default' => '- Select Status -', 'active' => 'Active', 'inactive' => 'Inactive'];
if (isset($_POST['link'])) {
    $source = $_POST;
    $validate = new Validate($source);
    $validate->addRule('link', 'url')
        ->addRule('status', 'status')
        ->addRule('ordering', 'int', ['min' => 1, 'max' => 50]);
    $validate->run();
    $errors = $validate->showErrors();
    $result = $validate->getResult();
    if (empty($errors)) {

        unset($result['id']);
        $data = $database->update($result, [['id', $_POST['id']]]);

        header("Location: index.php");
        exit();
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = 'SELECT * FROM `rss` WHERE `id` = "' . $id . '"';
    $data = $database->singleRecord($query);
    $inputHidden = '<input type="hidden" name="id" value="' . $id . '">';
    $arrElement = [

        [
            'label' => form::createLabel('link'),
            'input' => form::createInput('link', $data['link']),
        ],
        [
            'label' => form::createLabel('Status'),
            'input' => form::createSelect('status',  $arrSelectedValue, $data['status']),
        ],
        [
            'label' => form::createLabel('Ordering'),
            'input' => form::createInput('ordering',  $data['ordering'], 'number') . $inputHidden,
        ]

    ];
}
$xhtmlForm = FORM::formShow($arrElement);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './html/head.php'; ?>
</head>

<body style="background-color: #eee;">
    <div class="container pt-5">
        <form action="edit.php" method="post">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0">EDIT RSS</h4>
                </div>
                <div class="card-body">

                    <?= $xhtmlForm  ?>
                </div>
                <div class="card-footer">
                    <!-- <input class="form-control" type="hidden" name="token" value="1611025715">  -->
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <?php require_once './html/script.php' ?>
</body>

</html>