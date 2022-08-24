<?php
class UserController extends Controller
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
		$this->_view->totalItems					= $this->_model->countItem($this->_arrParam, null);
		$configPagination = ['totalItemsPerPage'	=> 4, 'pageRange' => 3];
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($this->_view->totalItems['all'], $this->_pagination);
		$this->_view->listItemsGroup = $this->_model->listItemsGroup();
		$this->_view->listGroup 	 = $this->_model->listItems($this->_arrParam);
		$this->_view->render($this->_arrParam['controller'] . DS . 'index');
	}


	public function changeStatusAction()
	{
		$this->_model->changeStatus($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
	}
	public function changeGroupAction()
	{
		$this->_model->changeGroupAcp($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
	}
	public function deleteAction()
	{

		$this->_model->deleteItem($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
	}

	public function activeAction()
	{
		$this->_model->statusAction($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
	}
	public function inactiveAction()
	{
		$this->_model->statusAction($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
	}

	public function formAction()
	{
		$title = ucfirst($this->_arrParam['controller']) . " Form :: Add";
		$data = null;
		$task = 'add';
		if (!empty($this->_arrParam['id'])) {
			$data = $this->_model->getItem($this->_arrParam);
			$task = 'edit';
			$this->_view->data = $data;
			$title = ucfirst($this->_arrParam['controller']) . " Form :: Edit";
		}
		if (!empty($this->_arrParam['form'])) {
			$source = $this->_arrParam['form'];
			$validate = new Validate($source);
			$validate->addRule('fullname', 'string', ['min' => 1, 'max' => 100])
				->addRule('status', 'status')
				->addRule('group_id', 'group_acp')
				->addRule('email', 'email')
				->addRule('password', 'password')
				->addRule('username', 'string', ['min' => 1, 'max' => 100]);
			$validate->run();
			$outValidated = $validate->getResult();
			if ($validate->isValid()) {
				unset($outValidated['token']);
				$this->_model->saveItems($outValidated, ['task' => $task]);
				URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
			} else {

				$this->_view->errors = $validate->getError();
				$this->_view->data = $outValidated;
			}
		}

		$this->_view->listItemsGroup = $this->_model->listItemsGroup();
		$this->_view->title = $title;
		$this->_view->render($this->_arrParam['controller'] . DS . 'form');
	}
}
