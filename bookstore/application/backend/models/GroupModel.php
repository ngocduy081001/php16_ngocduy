<?php
class GroupModel extends Model
{
	protected $_table = TBL_GROUP;
	public function __construct()
	{
		parent::__construct();
		$this->setTable($this->_table);
	}

	public function countItem($arrParam, $option = null)
	{

		$query[]	= "SELECT `status`, COUNT(`status`) AS `count`";
		$query[]	= "FROM `$this->table`";
		$query[]	= "WHERE `id` > 0";

		$query[]	= "GROUP BY `status`";

		$query		= implode(" ", $query);
		$result		= $this->listRecord($query);

		$result		= array_combine(array_column($result, 'status'), array_column($result, 'count'));
		$result	    = ['all' => array_sum($result)] + $result;

		return $result;
	}
	public function listItems($arrParam, $options = null)
	{

		$query[] = "SELECT `id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`";
		$query[] = "FROM `$this->_table`";
		$query[] = "WHERE `id` > 0";
		if (isset($arrParam['filter_group_acp'])) {
			if ($arrParam['filter_group_acp'] == 'no' || $arrParam['filter_group_acp'] == 'yes') {
				$query[] = 'AND `group_acp` lIKE "%' . $arrParam['filter_group_acp'] . '%" ';
			}
		}
		if (isset($arrParam['search_value'])) {
			$query[] = 'AND `name` lIKE "%' . $arrParam['search_value'] . '%"';
		}
		if (isset($arrParam['status'])) {
			$query[] = 'AND `status` ="' . $arrParam['status'] . '" ';
		}
		$pagination			= $arrParam['pagination'];
		$totalItemsPerPage	= $pagination['totalItemsPerPage'];
		if ($totalItemsPerPage > 0) {
			$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
			$query[]	= "LIMIT $position, $totalItemsPerPage";
		}
		$query = implode(' ', $query);
		$result = $this->listRecord($query);

		return $result;
	}
	public function changeStatus($arrParam)
	{
		$id = $arrParam['id'];
		$status = ($arrParam['status'] == 'active') ?  'inactive' : 'active';
		//$query = "UPDATE `$this->table` SET `status` = '$status' WHERE  `id` = '$id'";
		$this->update(['status'=> $status], [['id', $id]]);
		if ($this->affectedRows()) {
			Session::set('message', NOTICE_UPDATE_STATUS_SUCCESS);
		}
	}
	public function changeGroupAcp($arrParam)
	{
		$id = $arrParam['id'];
		$group = $arrParam['group'];
		$group == "yes" ? $group = "no" : $group = "yes";

		$this->update(['group_acp' => $group], [['id', $id]]);
		if ($this->affectedRows()) {
			Session::set('message', NOTICE_UPDATE_GROUP_SUCCESS);
		}
	}
	public function deleteItem($arrParam)
	{

		if (isset($arrParam['ckid'])) {
			$ids = $arrParam['ckid'];
			$this->delete($ids);
		} else {
			$ids = [$arrParam['id']];
			$this->delete($ids);
		}

		if ($this->affectedRows()) {
			Session::set('message', NOTICE_DELETE_SUCCESS);
		}
	}
	public function saveItems($arrParam, $options = null)
	{

		if ($options['task'] == 'add') {
			$arrParam['created'] = date('Y-m-d H:i:s');
			$arrParam['created_by'] = 'dev';
			$this->insert($arrParam);
		}
		if ($options['task'] == 'edit') {
			$id = $arrParam['id'];

			$arrParam['modified'] = date('Y-m-d H:i:s');
			$arrParam['modified_by'] = 'dev';

			unset($arrParam['id']);

			$this->update($arrParam, [['id', $id]]);
		}
	}
	public function getItem($arrParam)
	{
		$query = "SELECT `id`,`name`, `status`,`group_acp` FROM `$this->table` WHERE `id` = {$arrParam['id']}";
		$result = $this->singleRecord($query);
		return $result;
	}

	public function statusAction($arrParam, $options = null)
	{
		$ids = implode(',', $arrParam['ckid']);
		$status = $arrParam['action'];
		$query = "UPDATE `$this->table` SET `status` = '$status' WHERE  `id` IN ({$ids})";
		$this->query($query);
		if ($this->affectedRows()) {
			Session::set('message', NOTICE_UPDATE_STATUS_SUCCESS);
		}
	}
}
