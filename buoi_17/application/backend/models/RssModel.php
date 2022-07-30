<?php
class RssModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable('rss');
	}

	public function listItems($keyWord = '')
	{
		$query = "SELECT * FROM `$this->table`";
		if (!empty($keyWord)) {
			$query .= ' WHERE `link` lIKE "%' . $keyWord . '%" order  by id DESC';
		}
		$result = $this->listRecord($query);
		return $result;
	}
	public function deleteItem($id)
	{
		$query = "DELETE FROM `$this->table` WHERE `id` = $id";
		$result = $this->query($query);
		return $result;
	}
}
