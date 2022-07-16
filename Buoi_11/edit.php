<?php
require_once './libs/HTML.php';
require_once './libs/Validate.class.php';
$arrSelectedValue = ['default' => '- Select Status -', 'active' => 'Active', 'inactive' => 'Inactive'];

if ($_GET) {
    $id = $_GET['id'];
    require_once './connect.php';
    $query = 'select *from rss where id = "' . $id . '"';
    $data = $database->listRecord($query);
    $arrElement = [
        [
            'label' => form::createLabel('id'),
            'input' => form::createInput('id', $data[0]['id']),
        ],
        [
            'label' => form::createLabel('link'),
            'input' => form::createInput('link', $data[0]['link']),
        ],
        [
            'label' => form::createLabel('Status'),
            'input' => form::createSelect('status',  $arrSelectedValue, $data[0]['status']),
        ],
        [
            'label' => form::createLabel('Ordering'),
            'input' => form::createInput('ordering',  $data[0]['ordering'], 'number'),
        ]

    ];
}
$xhtmlForm = form::formShow($arrElement);

if ($_POST) {
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
        $data = $database->update($result, $result['id']);
        header("Location: index.php");
        exit();
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
        <form action="edit.php" method="post">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0">EDIT RSS</h4>
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