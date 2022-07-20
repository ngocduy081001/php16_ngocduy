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
		$xhtml .= '<a href="change-status.php?id=' . $item . '&status=' . $status . '" class="btn btn-sm ' . $class . ' "><i class="' . $icon . '"></i></a>';
		return $xhtml;
	}
}
