<?php
class GroupModel extends Model
{
	protected $_table = TBL_GROUP;
	public function __construct()
	{
		parent::__construct();
		$this->setTable($this->_table);
	}

	public function listItems($arrParam, $options = null)
	{

		$flasCountStatus = false;
		$query[] = "SELECT * FROM `$this->_table`";
		$query[] = "WHERE `id` > 0";
		if (isset($arrParam['filter_group_acp'])) {
			if ($arrParam['filter_group_acp'] == 'no' || $arrParam['filter_group_acp'] == 'yes') {
				$query[] = 'and `group_acp` lIKE "%' . $arrParam['filter_group_acp'] . '%" ';
			}
		}
		if (isset($arrParam['search_value'])) {
			$query[] = 'and `name` lIKE "%' . $arrParam['search_value'] . '%"';
		}
		if (isset($options['countStatus'])) {
			if ($options['countStatus'] != 'all') {
				$query[] = 'and `status` like "%' . $options['countStatus'] . '%" ';
			}
			$flasCountStatus = true;
		}
		if ($flasCountStatus == false) {
			if (isset($arrParam['status'])) {
				$query[] = 'and `status` like "%' . $arrParam['status'] . '%" ';
			}
		}
		$query[] = 'order  by id DESC';
		$query = implode(' ', $query);
		$result = $this->listRecord($query);
		return $result;
	}
}
