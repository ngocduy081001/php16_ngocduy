<?php
session_start();
require_once '../connect.php';
require_once '../libs/HTML.php';

$s = '13149';
$s[$s[1]] = $s[1] + $s[3];
print_r($s);




if (!isset($_SESSION['admin'])) {
    header('location: login.php');
    exit();
}

$query = 'select *from rss order by id DESC';
$textHightLight = '';


if (!empty($_GET['search'])) {
    $query = 'SELECT   * From `rss`  where link lIKE "%' . $_GET['search'] . '%" order  by id DESC';
    $textHightLight = '<spam class="mark">' . $_GET['search'] . '</spam>';
}
$data = $database->listRecord($query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'html/head.php' ?>
</head>

<body id="result" style="background-color: #eee;">
    <div class="container pt-5">
        <div class="card mb-4">
            <div class="card-body d-flex justify-content-between">
                <a href="../user/index.php" class="btn btn-primary m-0">Back to website</a>
                <a href="./logout.php" class="btn btn-info m-0">Logout</a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form action="" method="get">
                    <div class=" input-group mb-3">
                        <input type="text" id="search" class="form-control" name="search" placeholder="Enter search keyword...." value="<?= $_GET['search'] ?? '' ?>" onkeyup="">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-md btn-outline-primary m-0 px-3 py-2 z-depth-0 waves-effect" type="button">Search</button>
                            <a href="clear.php" class="btn btn-md btn-outline-danger m-0 px-3 py-2 z-depth-0 waves-effect" type="button">Clear</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="m-0">RSS List</h4>
                <a href="form.html" class="btn btn-success m-0">Add</a>
            </div>
            <div class="card-body">
                <table class="table table-striped btn-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Link</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ordering</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $xhtml = '';
                        if (!empty($data)) {

                            $class = '';
                            $icon = '';
                            foreach ($data as $key => $item) {

                                $xhtml .= ' <tr>
                               <td>' . $item['id'] . '</td>
                               <td > ' . str_replace($_GET['search'] ?? '', $textHightLight, $item['link'])  . '</td>
                               <td>' . $item['type'] . '</td>
                               <td> ' . HTML::itemStatus($item['status'], $item['id']) . '</td>
                               <td>' . $item['ordering'] . '</td>
                               <td>
                                   <a href="edit.php?id=' . $item['id'] . '" class="btn btn-sm btn-warning">Edit</a>
                                   <a href="delete.php?id=' . $item['id'] . '" class="btn btn-sm btn-danger btn-delete" >Delete</a>
                               </td>
                           </tr>';
                            }
                        } else $xhtml .= 'Dữ liệu trống';

                        echo $xhtml;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>
<?php require_once 'html/script.php' ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-delete').click(function(e) {
            e.preventDefault()
            if (confirm('are you sure?')) {
                window.location.href = $(this).attr('href');
            }
        });

    });
</script>

</html>