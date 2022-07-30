<?php
class RssController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	public function indexAction()
	{
		if (isset($_GET['search'])) {
			$keyWord = $_GET['search'];
			$this->_view->items = $this->_model->listItems($keyWord);
			$this->_view->keyWord = $keyWord;
		} else
			$this->_view->items = $this->_model->listItems();

		$this->_view->render('rss/index');
	}

	public function createAction()
	{
		$this->_view->render('rss/create');
	}

	public function storeAction()
	{
		$validate = new Validate($_POST);
		$validate->addRule('link', 'url')
			->addRule('status', 'status')
			->addRule('ordering', 'int', ['min' => 1, 'max' => 50]);
		$validate->run();
		$errors = $validate->showErrors();
		$result = $validate->getResult();

		if (empty($errors)) {
			$this->_model->insert($result);
			echo '<script>alert("Thêm thành công")</script>';
			$this->redirect('backend', 'rss', 'index');
		} else {
			$this->_view->errors = $errors;
			$this->_view->result = $result;
			echo '<script>alert("Thêm thất bại")</script>';
			$this->_view->render('rss/create');
		}
	}
	public function editAction()
	{
		$id = $_GET['id'];
		$query = 'SELECT * FROM `rss` WHERE `id` = "' . $id . '"';
		if (!empty($this->_model->isExist($query))) {
			$this->_model->singleRecord($query);
			$this->_view->item = $this->_model->singleRecord($query);
			$this->_view->inputHidden = '<input type="hidden" name="id" value="' . $id . '">';
			$this->_view->render('rss/edit');
		} else {
			echo '<script>alert("không có dữ liệu")</script>';
			$this->redirect('backend', 'rss', 'index');
		}
	}
	public function updateAction()
	{

		$validate = new Validate($_POST);
		$validate->addRule('link', 'url')
			->addRule('status', 'status')
			->addRule('ordering', 'int', ['min' => 1, 'max' => 50]);
		$validate->run();
		$errors = $validate->showErrors();
		$result = $validate->getResult();
		if (empty($errors)) {
			unset($result['id']);
			$this->_model->update($result, [['id', $_POST['id']]]);
			$this->redirect('backend', 'rss', 'index');
		} else {
			echo '<script>alert("Cập nhật thất bại")</script>';
			$this->_view->errors = $errors;
			$this->_view->render('rss/edit');
		}
	}

	public function deleteAction()
	{
		if (isset($_GET['id'])) $this->_model->deleteItem($_GET['id']);
		$this->redirect('backend', 'rss', 'index');
	}
	public function changeStatusAction()
	{
		if ($_GET) {
			$id = $_GET['id'];
			$status = ($_GET['status'] == 'active') ? "inactive" : "active";
			$chageStatus = $this->_model->update(['status' => $status], [['id', $id]]);
			if ($chageStatus > 0) {
				$_SESSION['notice'] = 'cập nhật dữ liệu thành công';
			}
			$this->redirect('backend', 'rss', 'index');
		}
	}
	public function loginAction()
	{
		echo '<h3>' . __METHOD__ . '</h3>';
		$this->_view->setTitle('Login');
		$this->_view->appendCSS(array('user/css/abc.css'));
		$this->_view->appendJS(array('user/js/test.js'));
		$this->_view->render('user/login', true);
	}

	public function logoutAction()
	{
		echo '<h3>' . __METHOD__ . '</h3>';
		$this->_view->setTitle('Logout');
		$this->_view->appendJS(array('user/js/test.js'));
		$this->_view->render('user/logout', true);
	}
}
