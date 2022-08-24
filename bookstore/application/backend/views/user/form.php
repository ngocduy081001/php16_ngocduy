<?php
echo '<pre style="color: red;">';
print_r($this->errors);
echo '</pre>';
$arrGroupAcpValues = $this->listItemsGroup;
$arrStatusValues = [

    'active'  => 'Active',
    'inactive' => 'Inactive'
];
$arrElements = [
    [

        Form::label('form[username]', 'Username'),
        Form::input($this->data['username'] ?? '', 'form[username]', 'Username', '', 'text')
    ],
    [

        Form::label('form[password]', 'Password'),
        Form::input($this->data['password'] ?? '', 'form[password]', 'Password', '', 'password')
    ],
    [

        Form::label('form[email]', 'Email'),
        Form::input($this->data['email'] ?? '', 'form[email]', 'Email', '', 'email')
    ],
    [

        Form::label('form[fullname]', 'Fullname'),
        Form::input($this->data['fullname'] ?? '', 'form[fullname]', 'Fullname', '', 'text')
    ],
    [
        Form::label('form[group_id]', 'Group Acp'),
        Form::selectedBox('form[group_id]', $arrGroupAcpValues, 'Select Group Acp', $this->data['group_id'])
    ],
    [
        Form::label('form[status]', 'Status'),
        Form::selectedBox('form[status]', $arrStatusValues, 'Select status', $this->data['status'])
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
<div class="card card-info card-outline">

    <form action="" method="post" class="mb-0" id="admin-form">
        <div class="card-body">
            <?= $xhtmlForm ?? '' ?>
            <!-- <div class="form-group row">
                <label for="form[username]" class="col-sm-2 col-form-label text-sm-right required">Username</label>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" id="form[username]" name="form[username]" value="" class="form-control form-control-sm">
                </div>
            </div>

            <div class="form-group row">
                <label for="form[password]" class="col-sm-2 col-form-label text-sm-right required">Password</label>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" id="form[password]" name="form[password]" value="" class="form-control form-control-sm">
                </div>
            </div>

            <div class="form-group row">
                <label for="form[email]" class="col-sm-2 col-form-label text-sm-right required">Email</label>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" id="form[email]" name="form[email]" value="" class="form-control form-control-sm">
                </div>
            </div>

            <div class="form-group row">
                <label for="form[fullname]" class="col-sm-2 col-form-label text-sm-right">Fullname</label>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" id="form[fullname]" name="form[fullname]" value="" class="form-control form-control-sm">
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label text-sm-right required">Status</label>
                <div class="col-xs-12 col-sm-8">
                    <select id="form[status]" name="form[status]" class="custom-select custom-select-sm">
                        <option value="default" selected=""> - Select Status - </option>
                        <option value="inactive">Inactive</option>
                        <option value="active">Active</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="group_id" class="col-sm-2 col-form-label text-sm-right required">Group</label>
                <div class="col-xs-12 col-sm-8">
                    <select id="form[group_id]" name="form[group_id]" class="custom-select custom-select-sm">
                        <option value="default">- Select Group -</option>
                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">Member</option>
                    </select>
                </div>
            </div> -->
            <input type="hidden" id="form[token]" name="form[token]" value="1597568129">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-success mr-1 submit-form" id="submit-form"> Save</button>
        </div>
    </form>




</div>