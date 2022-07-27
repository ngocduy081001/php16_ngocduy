</div>
<?php
if (!empty($this->js)) {
	foreach ($this->js as $js) {
		$fileJs .= '<script type="text/javascript" src="' . VIEW_URL . $js . '"></script>';
	}
}
$jsURL	= PUBLIC_URL . 'js' . DS;
echo 	@$fileJs  ?>
<script src="<?php echo $jsURL ?>	jquery.min.js"></script>
<script src="<?php echo $jsURL ?>	popper.min.js"></script>
<script src="<?php echo $jsURL ?>	bootstrap.min.js"></script>
<script src="<?php echo $jsURL ?>	mdb.min.js"></script>
</body>

</html>