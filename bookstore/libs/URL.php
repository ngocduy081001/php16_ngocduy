<?php
class URL
{
	

	public static function createLink($module, $controller, $action, $params = null)
	{
		$linkParams = '';
		if (!empty($params)) {
			foreach ($params as $key => $value) {
				$linkParams .= "&$key=$value";
			}
		}

		$url = 'index.php?module=' . $module . '&controller=' . $controller . '&action=' . $action . $linkParams;
		return $url;
	}

	public function redirect($moduleName, $controller = 'index', $action = 'index')
	{
		header("location: index.php?module=$moduleName&controller=$controller&action=$action");
		exit();
	}
}
