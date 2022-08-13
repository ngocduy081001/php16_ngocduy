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
		$this->_view->arrParam = $this->_arrParam;
	}

	public function indexAction()
	{

		$this->_view->title = 'Manage:: List';
		$this->_view->listGroup = $this->_model->listItems(@$this->_arrParam['search_value'], @$this->_arrParam['filter_group_acp'], @$this->_arrParam['status']);
		$this->_view->render('group/index');
	}

	public function changeStatusAction()
	{
		if ($this->_arrParam['id']) {
			$id = $this->_arrParam['id'];
			$status = ($this->_arrParam['status'] == 1) ? 0 : 1;
			$chageStatus = $this->_model->update(['status' => $status], [['id', $id]]);
			if ($chageStatus > 0) {
				$_SESSION['notice'] = 'cập nhật dữ liệu thành công';
			}
			$this->redirect($this->_arrParam['module'], 'group', 'index');
		}
	}
	public function changeGroupAction()
	{
		if ($this->_arrParam['id']) {
			$id = $this->_arrParam['id'];
			$group = ($this->_arrParam['group'] == 'yes') ? 'no' : 'yes';
			$chageGroup = $this->_model->update(['group_acp' => $group], [['id', $id]]);
			if ($chageGroup > 0) {
				$_SESSION['notice'] = 'cập nhật dữ liệu thành công';
			}
			$this->redirect($this->_arrParam['module'], 'group', 'index');
		}
	}

	public function selectAction()
	{
	}
}
