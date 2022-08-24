<form action="" method="post" class="table-responsive" id="form-table">
    <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
        <thead>
            <tr>
                <th class="text-center">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="check-all">
                        <label for="check-all" class="custom-control-label"></label>
                    </div>
                </th>
                <th class="text-center">ID</th>
                <th class=""><a href="#">Info</th>
                <th class="text-center">Group</th>
                <th class="text-center">Status</th>
                <th class="text-center">Created</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?= $xhtml ?? '' ?>
        </tbody>
        <!-- <tbody>

            <tr class="my-read-only">
                <td class="text-center"></td>
                <td class="text-center">1</td>
                <td>
                    <p class="mb-0">Username: admin</p>
                    <p class="mb-0">Fullname: Nguyễn Văn Linh</p>
                    <p class="mb-0">Email: admin@gmail.com</p>
                </td>
                <td class="text-center position-relative"><select name="select-group" class="custom-select custom-select-sm" style="width: unset" id="1" data-id="1">
                        <option value="1" selected="">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">Member</option>
                    </select></td>
                <td class="text-center position-relative">
                    <a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                </td>
                <td class="text-center">
                    <p class="mb-0 history-by"><i class="far fa-user"></i> </p>
                    <p class="mb-0 history-time"><i class="far fa-clock"></i> 13/07/2020 16:57:06</p>
                </td>

                <td class="text-center"></td>
            </tr>

            <tr class="">
                <td class="text-center">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="checkbox-2" name="checkbox[]" value="2">
                        <label for="checkbox-2" class="custom-control-label"></label>
                    </div>
                </td>
                <td class="text-center">2</td>
                <td>
                    <p class="mb-0">Username: manager01</p>
                    <p class="mb-0">Fullname: Manager 01</p>
                    <p class="mb-0">Email: manager01@gmail.com</p>
                </td>
                <td class="text-center position-relative"><select name="select-group" class="custom-select custom-select-sm" style="width: unset" id="2" data-id="2">
                        <option value="1">Admin</option>
                        <option value="2" selected="">Manager</option>
                        <option value="3">Member</option>
                    </select></td>
                <td class="text-center position-relative">
                    <a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                </td>
                <td class="text-center">
                    <p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
                    <p class="mb-0 history-time"><i class="far fa-clock"></i> 13/07/2020 17:11:59</p>
                </td>

                <td class="text-center">
                    <a href="#" class="rounded-circle btn btn-sm btn-secondary" title="Change Password">
                        <i class="fas fa-key"></i>
                    </a>

                    <a href="#" class="rounded-circle btn btn-sm btn-info" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>

            <tr class="">
                <td class="text-center">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="checkbox-5" name="checkbox[]" value="5">
                        <label for="checkbox-5" class="custom-control-label"></label>
                    </div>
                </td>
                <td class="text-center">5</td>
                <td>
                    <p class="mb-0">Username: member01</p>
                    <p class="mb-0">Fullname: Member 01</p>
                    <p class="mb-0">Email: member01@hotmail.com</p>
                </td>
                <td class="text-center position-relative"><select name="select-group" class="custom-select custom-select-sm" style="width: unset" id="5" data-id="5">
                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3" selected="">Member</option>
                    </select></td>
                <td class="text-center position-relative">
                    <a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                </td>
                <td class="text-center">
                    <p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
                    <p class="mb-0 history-time"><i class="far fa-clock"></i> 13/07/2020 17:20:36</p>
                </td>

                <td class="text-center">
                    <a href="#" class="rounded-circle btn btn-sm btn-secondary" title="Change Password">
                        <i class="fas fa-key"></i>
                    </a>

                    <a href="#" class="rounded-circle btn btn-sm btn-info" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>

            <tr class="">
                <td class="text-center">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="checkbox-6" name="checkbox[]" value="6">
                        <label for="checkbox-6" class="custom-control-label"></label>
                    </div>
                </td>
                <td class="text-center">6</td>
                <td>
                    <p class="mb-0">Username: manager02</p>
                    <p class="mb-0">Fullname: Manager 02</p>
                    <p class="mb-0">Email: manager02@gmail.com</p>
                </td>
                <td class="text-center position-relative">
                    <select name="select-group" class="custom-select custom-select-sm" style="width: unset" id="6" data-id="6">
                        <option value="1">Admin</option>
                        <option value="2" selected="">Manager</option>
                        <option value="3">Member</option>
                    </select>
                </td>
                <td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-danger"><i class="fas fa-minus"></i></a></td>
                <td class="text-center">
                    <p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
                    <p class="mb-0 history-time"><i class="far fa-clock"></i> 13/07/2020 17:21:17</p>
                </td>

                <td class="text-center">
                    <a href="#" class="rounded-circle btn btn-sm btn-secondary" title="Change Password">
                        <i class="fas fa-key"></i>
                    </a>

                    <a href="#" class="rounded-circle btn btn-sm btn-info" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>

            <tr class="">
                <td class="text-center">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="checkbox-8" name="checkbox[]" value="8">
                        <label for="checkbox-8" class="custom-control-label"></label>
                    </div>
                </td>
                <td class="text-center">8</td>
                <td>
                    <p class="mb-0">Username: zendvn</p>
                    <p class="mb-0">Fullname: ZendVN Admin</p>
                    <p class="mb-0">Email: training@zend.vn</p>
                </td>
                <td class="text-center position-relative"><select name="select-group" class="custom-select custom-select-sm" style="width: unset" id="8" data-id="8">
                        <option value="1" selected="">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">Member</option>
                    </select></td>
                <td class="text-center position-relative">
                    <a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                </td>
                <td class="text-center">
                    <p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
                    <p class="mb-0 history-time"><i class="far fa-clock"></i> 08/08/2020 16:41:43</p>
                </td>

                <td class="text-center">
                    <a href="#" class="rounded-circle btn btn-sm btn-secondary" title="Change Password">
                        <i class="fas fa-key"></i>
                    </a>

                    <a href="#" class="rounded-circle btn btn-sm btn-info" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        </tbody> -->
    </table>
</form>