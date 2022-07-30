<?php
class RssModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable('rss');
	}

	public function listItems()
	{
		$query = "SELECT * FROM `$this->table`";
		$result = $this->listRecord($query);
		
		return $result;
	}
}
