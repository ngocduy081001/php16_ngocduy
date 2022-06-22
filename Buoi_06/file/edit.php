<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>PHP FILE - ADD</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#cancel-button').click(function() {
				window.location = 'index.php';
			});
		});
	</script>
</head>

<body>
	<?php
	require_once 'functions.php';
	require_once 'functionsUpload.php';
	$id	= $_GET['id'];
	$content	= file_get_contents("./files/$id.txt");
	$content	= explode('||', $content);
	$data['title']				= $content[0];
	$data['description']		= $content[1];
	$data['img']				= $content[2];



	$flag	= false;
	if (isset($_POST['title']) && isset($_POST['description'])) {
		$data['title']			= $_POST['title'];
		$data['description']	= $_POST['description'];

		// Error Title
		if (checkEmpty($data['title'])) 			$error['title'] = '<p class="error">Dữ liệu không được rỗng</p>';
		if (checkLength($data['title'], 5, 100)) $error['title'] .= '<p class="error">Tiêu đề dài từ 5 đến 100 ký tự</p>';

		// Error Description
		if (checkEmpty($data['description'])) 			$error['description'] = '<p class="error">Dữ liệu không được rỗng</p>';
		if (checkLength($data['description'], 10, 5000)) $error['description'] .= '<p class="error">Nội dung dài từ 10 đến 5000 ký tự</p>';

		$fileUpload = $_FILES['file-img'];
		$flageChangeImage = false;
		if (!empty($fileUpload['name'])) {
			$flagSize         = checkSize($fileUpload['size'], $configs['min_size'], $configs['max_size']);
			$flagExtension     = checkExtension($fileUpload['name'], explode('|', $configs['extension']));
			if (!$flagSize) {
				$error['img'] =  'dung luong tap tin khong hop le';
			}
			if (!$flagExtension) {
				$error['img'] = 'phan mo rong khong hop le';
			} else {
				$flageChangeImage = true;
			}
		}

		// A-Z, a-z, 0-9: AzG09
		if (empty($error)) {
			if ($flageChangeImage == false) $newImage =  $data['img'];
			else {
				$data['img']    = randomStringFileImg($fileUpload['name'], 7);
			}
			$dataFile    = $data['title'] . '||' . $data['description']  . '||' . $data['img'];
			$fileName    = './files/' . $id . '.txt';
			if (file_put_contents($fileName, $dataFile)) {
				@unlink("./img/{$data['img']}");
				move_uploaded_file($fileUpload['tmp_name'], './img/' . $data['img']);
				$flag            = true;
			}
		}
	}
	?>
	<div id="wrapper">
		<div class="title">PHP FILE - ADD</div>
		<div id="form">
			<form action="#" method="post" name="add-form" enctype="multipart/form-data">
				<div class="row">
					<p>Title</p>
					<input type="text" name="title" value="<?php echo $data['title']; ?>">
					<?php echo $error['title'] ?? ""; ?>
				</div>

				<div class="row">
					<p>Description</p>
					<textarea name="description" rows="5" cols="100"><?php echo $data['description']; ?></textarea>
					<?php echo $error['description'] ?? "" ?>
				</div>
				<input type="file" name="file-img">
				<?php echo  $error['img'] ?? "" ?>
				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
				</div>

				<?php
				if ($flag == true) echo '<div class="row"><p>Dữ liệu đã được ghi thành công!</p></div>';
				?>

			</form>
		</div>

	</div>
</body>

</html>