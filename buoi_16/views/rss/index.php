<?php
$textHightLight = '';
if (!empty($_GET['search'])) {
	$query = 'SELECT   * From `rss`  where link lIKE "%' . $_GET['search'] . '%" order  by id DESC';
	$textHightLight = '<spam class="mark">' . $_GET['search'] . '</spam>';
}
if (!empty(count($this->items))) {
	$xhtml = '';
	foreach ($this->items as $key => $value) {
		$xhtml .= ' <tr>
		<td>' . $value['id'] . '</td>
		<td > ' . str_replace($_GET['search'] ?? '', $textHightLight, $value['link'])  . '</td>

		<td> ' . Helpers::itemStatus($value['status'], $value['id']) . '</td>
		<td>' . $value['ordering'] . '</td>
		<td>
			<a href="index.php?controller=rss&action=edit&id=' . $value['id'] . '" class="btn btn-sm btn-warning">Edit</a>
			<a  href="index.php?controller=rss&action=delete&id=' . $value['id'] . '" class="btn btn-sm btn-danger btn-delete" >Delete</a>
		</td>
	</tr>';
	}
} else $xhtml .= 'Dữ liệu trống';



?>
<div class="card mb-4">
	<div class="card-body d-flex justify-content-between">
		<a href="../index.php" class="btn btn-primary m-0">Back to website</a>
		<a href="logout.php" class="btn btn-info m-0">Logout</a>
	</div>
</div>
<div class="card mb-4">
	<div class="card-body">
		<form action="" method="get">
			<div class="input-group mb-3">
				<input type="text" class="form-control" name="search" placeholder="Enter search keyword...." value="">
				<div class="input-group-append">
					<button type="submit" class="btn btn-md btn-outline-primary m-0 px-3 py-2 z-depth-0 waves-effect" type="button">Search</button>
					<a href="list.php" class="btn btn-md btn-outline-danger m-0 px-3 py-2 z-depth-0 waves-effect" type="button">Clear</a>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center">
		<h4 class="m-0">RSS List</h4>
		<a href="index.php?controller=rss&action=create" class="btn btn-success m-0">Add</a>
	</div>
	<div class="card-body">
		<table class="table table-striped btn-table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Link</th>
					<th scope="col">Status</th>
					<th scope="col">Ordering</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>

				<?= $xhtml ?? '' ?>
			</tbody>
		</table>
	</div>
</div>