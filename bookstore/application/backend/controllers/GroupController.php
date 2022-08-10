<?php
class GroupController extends Controller
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
		$this->_view->listGroup = $this->_model->listItems(@$this->_arrParam['search_value']);
		
		$this->_view->render('group/index');
	}

	public function changeStatusAction()
	{
		if ($_GET) {
			$id = $_GET['id'];
			$status = ($_GET['status'] == 1) ? 0 : 1;
			$chageStatus = $this->_model->update(['status' => $status], [['id', $id]]);
			if ($chageStatus > 0) {
				$_SESSION['notice'] = 'cập nhật dữ liệu thành công';
			}
			$this->redirect($_GET['module'], 'group', 'index');
		}
	}
	public function changeGroupAction()
	{
		if ($_GET) {
			$id = $_GET['id'];
			$group = ($_GET['group'] == 1) ? 0 : 1;
			$chageGroup = $this->_model->update(['group_acp' => $group], [['id', $id]]);
			if ($chageGroup > 0) {
				$_SESSION['notice'] = 'cập nhật dữ liệu thành công';
			}
			$this->redirect($_GET['module'], 'group', 'index');
		}
	}
}
