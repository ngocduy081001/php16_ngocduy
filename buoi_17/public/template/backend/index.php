<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<?php echo $this->_metaHTTP; ?>
	<?php echo $this->_metaName; ?>
	<?php echo $this->_title; ?>
	<?php echo $this->_cssFiles; ?>

</head>

<body style="background-color: #eee;">
	<div class="container pt-5">
		<!--  LOAD CONTENT -->
		<?php
		require_once APPLICATION_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
		?>
	</div>
	<?php echo $this->_jsFiles; ?>
</body>

</html>