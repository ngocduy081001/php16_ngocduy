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
	}

	public function indexAction()
	{
		@$this->_view->title = $_GET['controller'];
		$this->_view->render('dashboard/index');
		$this->_view->render('dashboard/index');
	}
}
