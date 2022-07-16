<?php
class HTML
{

	static public function createSelectbox($arrData, $name, $keySelected = null, $class = null)
	{
		$xhtml = "";
		if (!empty($arrData)) {
			$xhtml = '<select class="' . $class . '" name="' . $name . '">';
			foreach ($arrData as $key => $value) {
				if ($keySelected == $key && $keySelected != null) {
					$xhtml .= '<option value="' . $key . '" selected="true">' . $value . '</option>';
				} else {
					$xhtml .= '<option value="' . $key . '">' . $value . '</option>';
				}
			}
			$xhtml .= '</select>';
		}
		return $xhtml;
	}
	public static function itemStatus($status, $item)
	{
		$xhtml = '';
		if ($status == 'active') {
			$class = 'btn-success';
			$icon = 'fa fa-check';
		} else {
			$class = 'btn-danger';
			$icon = 'fa fa-minus';
		}
		$xhtml .= '<a href="change-status.php?id=' . $item . '" class="btn btn-sm ' . $class . ' "><i class="' . $icon . '"></i></a>';
		return $xhtml;
	}
}
class form
{
	public static function createInput($name,  $value, $type = 'text')
	{
		$xhtml = '';
		$xhtml = sprintf('<input class= "form-control" type="%s" name="%s" value="%s">', $type, $name, $value);
		return $xhtml;
	}
	public  static function createLabel($value)
	{
		$xhtml = '';
		$xhtml = sprintf('<label class="font-weight-bold">%s</label>', $value);
		return $xhtml;
	}
	public static function createSelect($name, $arrOptions, $keySelected = 'default', $selectedData = '')
	{
		$xhtml = '';
		$xhtml = '<select class="custom-select" name="' . $name . '">';

		if (!empty($arrOptions)) {
			foreach ($arrOptions as $key => $value) {
				if ($selectedData == $value) {
					$selected = 'selected';
				} else {
					$selected = ($keySelected == $key) ? 'selected' : '';
				}


				$xhtml .= sprintf('<option value="%s" %s >%s</option>', $key, $selected, $value);
			}
		}
		$xhtml .= '</select>';
		return $xhtml;
	}

	public static function createButton($class, $type, $name, $values)
	{
		$xhtml = '';
		$xhtml = sprintf('<button class="%s" type="%s" name="%s" values="$s">', $class, $type, $name, $values);
		return $xhtml;
	}

	public static function createButtonLink($link, $class, $title)
	{
		$xhtml = '';
		$xhtml = sprintf('<a href="%s" class="btn %s" >%s</a>', $link, $class, $title);
		return $xhtml;
	}
	public static function formGroup($value)
	{
		$xhtml = '';
		$xhtml = sprintf('<div class="form-group">%s %s</div>', $value['label'], $value['input']);
		return $xhtml;
	}
	public static function formShow($arrElement)
	{
		$xhtml = '';
		foreach ($arrElement as $element) {
			$xhtml .= self::formGroup($element);
		}
		return $xhtml;
	}
}
