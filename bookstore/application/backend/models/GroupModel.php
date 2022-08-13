<?php
class GroupModel extends Model
{
	protected $_table = TBL_GROUP;
	public function __construct()
	{
		parent::__construct();
		$this->setTable($this->_table);
	}

	public function listItems($keyWord = '', $group_acp, $status)
	{
		$query[] = "SELECT * FROM `$this->_table`";
		$query[] = "WHERE";
		if (!empty($group_acp)) {
			if ($group_acp == 'no' || $group_acp == 'yes') {
				$query[] = ' `group_acp` lIKE "%' . $group_acp . '%" and';
			}
		}
		if (!empty($keyWord) || $keyWord == null) {
			$query[] = ' `name` lIKE "%' . $keyWord . '%"';
		}
		if (empty($keyWord && empty($status))) {
			if ($status == 1 || $status == 0) {
				$query[] = 'and `status` = ' . $status . ' ';
			}
		}
		$query[] = 'order  by id DESC';
		$query = implode(' ', $query);
		$result = $this->listRecord($query);

		return $result;
	}
}
