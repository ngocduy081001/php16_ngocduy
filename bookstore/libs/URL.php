<?php
class URL
{
	public static function redirect($link)
	{
		header('location:' . $link);
	}
	public static function createLink($module, $controller, $action, $params = null)
	{

		$queryParams = '';
		if (!empty($params)) {
			foreach ($params as $key => $value) {
				$queryParams .= "&$key=$value";
			}
		}
		return sprintf('index.php?module=%s&controller=%s&action=%s%s', $module, $controller, $action, $queryParams);
	}
}
