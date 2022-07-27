<?php
$arrSelectedValue = ['default' => '- Select Status -', 'active' => 'Active', 'inactive' => 'Inactive'];
$arrElement = [
    [
        'label' => Helpers::createLabel('link'),
        'input' => Helpers::createInput('link', @$this->result['link']),
    ],
    [
        'label' => Helpers::createLabel('Status'),
        'input' => Helpers::createSelect('status', $arrSelectedValue,  @$this->result['status']),
    ],
    [
        'label' => Helpers::createLabel('Ordering'),
        'input' => Helpers::createInput('ordering',  @$this->result['ordering'], 'number'),
    ]
];

$xhtmlForm = Helpers::formShow($arrElement);

?>

<body style="background-color: #eee;">
    <div class="container pt-5">
        <form action="index.php?controller=rss&action=store" method="post">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0">ADD RSS</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (!empty($this->errors))
                        echo ' 
                    <span class="text-danger">  ' . $this->errors . ' </span>
              ';
                    ?>
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


</body>