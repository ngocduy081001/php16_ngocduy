<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Process</title>
</head>

<body>
	<div id="wrapper">
		<div class="title">PROCESS</div>
		<div id="form">
			<?php
			require_once 'functions.php';
			session_start();
			if (@$_SESSION['flagPermission'] == true) {
				if (isset($_POST['timeout'])) {
					
					$_SESSION['timeoutnew'] = $_POST['timeout'];
					header('location: admin.php');
					exit();
				} else if ($_SESSION['timeout'] + 20 > time()) {
					echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
					echo '<a href="logout.php">Đăng xuất</a>';
				} else {
					session_unset();
					header('location: login.php');
					exit();
				}
			} else {
				if (!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])) {
					$username 	= $_POST['username'];
					$password 	= md5($_POST['password']);
					$data 		= file_get_contents('./data/user.json');
					$json_data = json_decode($data, true);
					foreach ($json_data as $key_json_data => $value_json_data) {

						if ($value_json_data['username'] == $username && $value_json_data['password'] == $password) {
							$_SESSION['fullName'] 		= $value_json_data['fullname'];
							$_SESSION['flagPermission'] = true;
							$_SESSION['timeout'] 		= time();
							if ($value_json_data['role'] == 'admin') {
								header('location: admin.php');
								exit;
							} else {

								header('location: member.php');
								exit;
							}
						} else {

							header('location: login.php');
						}
					}
				} else {
					header('location: login.php');
				}
			}
			?>
		</div>

	</div>
</body>

</html>