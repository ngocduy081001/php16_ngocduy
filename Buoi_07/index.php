<?php

function showAll($path, &$newString)
{



	$data	= scandir($path);
	$newString .= '<ul>';


	foreach ($data as $key => $value) {

		if ($value != '.' && $value != '..') {

			$dir	= $path . '/' . $value;

			if (is_dir($dir)) {
				$levelDir =  substr_count($path, '/') + 1;
				$newString .= '<li><img src="./images/icons8-folder-18.png"> ' . $value . '&nbsp&nbsp&nbsp	' . $levelDir;

				showAll($dir, $newString);
				$newString .= '</li>';
			} else {
				switch (pathinfo($value, PATHINFO_EXTENSION)) {
					case 'txt':
						$newString .= '<li><img src="./images/txt.png">: ' . $value . '</li>';
						break;

					case 'ini':
						$newString .= '<li><img src="./images/ini.png">: ' . $value . '</li>';
						break;
					case 'jpg':
						$newString .= '<li><img src="./images/media.png">: ' . $value . '</li>';
						break;
					case 'jpeg':
						$newString .= '<li><img src="./images/media.png">: ' . $value . '</li>';
						break;
					case 'png':
						$newString .= '<li><img src="./images/media.png">: ' . $value . '</li>';
						break;
					default:
						$newString .= '<li><img src="./images/icons8-file-18.png">: ' . $value . '</li>';
						break;
				}
			}
		}
	}
	$newString .= '</ul>';
}

showAll('.', $newString);
echo $newString;
