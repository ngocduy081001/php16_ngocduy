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
                <th class="text-center">ID</a></th>
                <th class="text-center">Name</a></th>
                <th class="text-center">Status</a></th>
                <th class="text-center">Group ACP</a></th>
                <th class="text-center">Created</a></th>
                <th class="text-center">Modified</a></th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $xhtml ?? '' ?>
        </tbody>
    </table>
    <div>
        <input type="hidden" name="sort_field" value="">
        <input type="hidden" name="sort_order" value="">
    </div>
</form>