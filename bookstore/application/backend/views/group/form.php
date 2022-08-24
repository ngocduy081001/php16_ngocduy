<?php
$this->data;

$arrGroupAcpValues = [

    'yes'  => 'Yes',
    'no' => 'No'
];
$arrStatusValues = [

    'active'  => 'Active',
    'inactive' => 'Inactive'
];
$arrElements = [
    [

        Form::label('form[name]', 'Name'),
        Form::input($this->data['name'] ?? '', 'form[name]', 'Name', '', 'text')
    ],
    [
        Form::label('form[status]', 'Status'),
        Form::selectedBox('form[status]', $arrStatusValues, 'Select status', $this->data['status'])
    ],
    [
        Form::label('form[group_acp]', 'Group Acp'),
        Form::selectedBox('form[group_acp]', $arrGroupAcpValues, 'Select Group Acp', $this->data['group_acp'])
    ],
    [Form::inputHiden($this->data['id'] ?? '', 'id')]
];
$xhtmlForm = '';
foreach ($arrElements as $value) {

    $xhtmlForm .= sprintf('<div class="form-group row">%s
                                <div class="col-xs-12 col-sm-8">%s</div>
                            </div>', $value[0], $value[1]);
}

?>

<?= $this->errors ? $notice = HelperFrontend::showErrors($this->errors) : ''  ?>
<div class="card card-info card-outline">

    <form action="" method="post" class="mb-0" id="admin-form">
        <div class="card-body">
            <?php echo $xhtmlForm ?? '' ?>
            <input type="hidden" id="form[token]" name="form[token]" value="1596364518">

        </div>
        <div class="card-footer">
            <div class="col-12 col-sm-8 offset-sm-2">
                <button class="btn btn-sm btn-success mr-1 submit-form" id="submit-form"> Save</button>
            </div>
        </div>

    </form>


</div>