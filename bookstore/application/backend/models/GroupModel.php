<?php
class GroupModel extends Model
{
	protected $_table = TBL_GROUP;
	public function __construct()
	{
		parent::__construct();
		$this->setTable($this->_table);
	}

	public function listItems($keyWord = '')
	{
		$query = "SELECT * FROM `$this->_table`";
		if (!empty($keyWord)) {
			$query .= ' WHERE `name` lIKE "%' . $keyWord . '%" order  by id DESC';
		}
		$result = $this->listRecord($query);

		return $result;
	}
}
