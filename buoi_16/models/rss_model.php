<?php
class Rss_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable('rss');
	}

	public function listItems()
	{
		$query[] 	= "SELECT *";
		$query[] 	= "FROM `$this->table`";
		$query		= implode(" ", $query);

		$result		= $this->listRecord($query);
		return $result;
	}

	public function deleteItem($id, $options = null)
	{
		$this->delete(array($id));
	}
}
