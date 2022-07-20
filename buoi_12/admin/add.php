<?php
require_once './libs/HTML.php';
require_once './libs/Validate.class.php';
$arrSelectedValue = ['default' => '- Select Status -', 'active' => 'Active', 'inactive' => 'Inactive'];
$arrElement = [
    [
        'label' => form::createLabel('link'),
        'input' => form::createInput('link', ''),
    ],
    [
        'label' => form::createLabel('Status'),
        'input' => form::createSelect('status', $arrSelectedValue, ''),
    ],
    [
        'label' => form::createLabel('Ordering'),
        'input' => form::createInput('ordering', '', 'number'),
    ]
];

$xhtmlForm = form::formShow($arrElement);

if (!empty($_POST)) {
    $source = $_POST;
    $validate = new Validate($source);
    $validate->addRule('link', 'url')
        ->addRule('status', 'status');
    // ->addRule('ordering', 'int');
    $validate->run();
    $errors = $validate->showErrors();
    $result = $validate->getResult();
    if (empty($errors)) {
        require_once './connect.php';
        $data = $database->insert($result);
        header('location: index.php');
        die();
    } else {
        echo '<script>alert("Thêm thất bại")</script>';
        $xhtmlForm = form::formShow($arrElementnew);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './html/head.php'; ?>
</head>

<body style="background-color: #eee;">
    <div class="container pt-5">
        <form action="add.php" method="post">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0">ADD RSS</h4>
                </div>
                <div class="card-body">

                    <?= $xhtmlForm ?>
                </div>
                <div class="card-footer">
                    <!-- <input class="form-control" type="hidden" name="token" value="1611025715">  -->
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="list.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <?php require_once './html/script.php' ?>
</body>

</html>