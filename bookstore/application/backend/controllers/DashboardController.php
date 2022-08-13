<?php
class DashboardController extends Controller
{
	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('dashboard.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->arrParam = $this->_arrParam;
	}

	public function indexAction()
	{
		$this->_view->title = 'Manage:: List';
		$this->_view->render('dashboard/index');
		$this->_view->render('dashboard/index');
	}
}
