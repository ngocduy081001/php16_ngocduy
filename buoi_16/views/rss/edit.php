<?php
$arrSelectedValue = ['default' => '- Select Status -', 'active' => 'Active', 'inactive' => 'Inactive'];
$arrElement = [

    [
        'label' => Helpers::createLabel('link'),
        'input' => Helpers::createInput('link', $this->item['link'] ?? $_POST['link']),

    ],
    [
        'label' => Helpers::createLabel('Status'),
        'input' => Helpers::createSelect('status',  $arrSelectedValue, $this->item['status'] ?? $_POST['status']),
    ],
    [
        'label' => Helpers::createLabel('Ordering'),
        'input' => Helpers::createInput('ordering',  $this->item['ordering'] ?? $_POST['ordering'], 'number') . @$this->inputHidden,
    ]

];
$xhtmlForm = Helpers::formShow($arrElement);
?>


<body style="background-color: #eee;">
    <div class="container pt-5">
        <form action="index.php?controller=rss&action=update" method="post">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0">EDIT RSS</h4>

                </div>

                <div class="card-body">
                    <?php
                    if (!empty($this->errors))
                        echo ' 
                    <span class="text-danger">  ' . $this->errors . ' </span>
              ';
                    ?>
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


</body>