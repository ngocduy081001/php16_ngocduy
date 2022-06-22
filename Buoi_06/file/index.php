<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>PHP FILE - Index</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">

	</script>
</head>

<body>
	<div id="wrapper">
		<div class="title">PHP FILE - Index</div>
		<div class="list">
			<form action="multy-delete.php" method="post" name="main-form" id="main-form">
				<?php
				require_once 'functions.php';
				$data	= scandir('./files');
				$i = 0;
				foreach ($data as $key => $value) {
					if ($value == '.' || $value == '..' || preg_match('#.txt$#imsU', $value) == false) continue;
					$class		= ($i % 2 == 0) ? 'odd' : 'even';
					$content	= file_get_contents("./files/$value");
					$content	= explode('||', $content);
					$tile				= $content[0];
					$description		= $content[1];
					$img 				= $content[2];
					$id			= substr($value, 0, 5);
					$size		= convertSize(filesize("./files/$value"));

				?>
					<div class="row <?php echo $class; ?>">
						<p class="no">
							<input type="checkbox" name="checkbox[]" id="checkked-data" value="<?php echo $id; ?>">
						</p>
						<p class="name"><?php echo $tile; ?><span><?php echo $description; ?></span></p>
						<p><img style="width: 120px ; padding: 20px 0; " src="img/<?= $img ?>"></p>
						<p class="id"><?php echo $id; ?></p>
						<p class="size"><?php echo $size; ?></p>
						<p class="action">
							<a href="edit.php?id=<?php echo $id; ?>">Edit</a> |
							<a href="delete.php?id=<?php echo $id; ?>">Delete</a>
						</p>
					</div>
				<?php
					$i++;
				}
				?>

			</form>
		</div>

		<div id="area-button">
			<a style="width: 100px ; " href="add.php">Add File</a>
			<?php
			if (count($data) > 2) {
				echo '<a style="width: 100px s" id="multy-delete"  onclick="confirmAction()">Delete File</a>';
			}
			?>
		</div>

	</div>
	<script>
		function confirmAction() {
			var checkedCount = $('input[name="checkbox[]"]:checked').length;
			if (checkedCount >= 1) {
				var confirmAction = confirm("Bạn có đồng ý xoá");
				if (confirmAction) {
					$(document).ready(function() {
						$('#main-form').submit();
					});
				}
			} else {
				alert('bạn chưa chọn dữ liệu để xoá')
			}

		}
	</script>
</body>

</html>