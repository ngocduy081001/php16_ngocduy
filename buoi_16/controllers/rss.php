<?php
class Rss extends Controller
{

	public function __construct()
	{
		parent::__construct();
		//Auth::checkLogin();
		$this->view->title = 'Rss';
	}

	public function index()
	{
		$this->view->items = $this->db->listItems();

		$this->view->render('rss/index');
	}


	public function create()
	{
		$this->view->render('rss/create');
	}

	public  function store()
	{
		$source = $_POST;
		$validate = new Validate($source);
		$validate->addRule('link', 'url')
			->addRule('status', 'status')
			->addRule('ordering', 'int', ['min' => 1, 'max' => 50]);
		$validate->run();
		$errors = $validate->showErrors();
		$result = $validate->getResult();
		if (empty($errors)) {
			$this->db->insert($result);
			echo '<script>alert("Thêm thành công")</script>';
			$this->view->items = $this->db->listItems();
			$this->redirect('rss', 'index');
		} else {
			$this->view->errors = $errors;
			$this->view->result = $result;
			echo '<script>alert("Thêm thất bại")</script>';
			$this->view->render('rss/create');
		}
	}
	public function edit()
	{
		$id = $_GET['id'];
		$query = 'SELECT * FROM `rss` WHERE `id` = "' . $id . '"';
		if (!empty($this->db->isExist($query))) {
			$this->db->singleRecord($query);
			$this->view->item = $this->db->singleRecord($query);
			$this->view->inputHidden = '<input type="hidden" name="id" value="' . $id . '">';
			$this->view->render('rss/edit',);
		} else {
			echo '<script>alert("không có dữ liệu")</script>';

			$this->redirect('rss', 'index');
		}
	}
	public function update()
	{
		$source = $_POST;
		$validate = new Validate($source);
		$validate->addRule('link', 'url')
			->addRule('status', 'status')
			->addRule('ordering', 'int', ['min' => 1, 'max' => 50]);
		$validate->run();
		$errors = $validate->showErrors();
		$result = $validate->getResult();
		if (empty($errors)) {
			unset($result['id']);
			$this->db->update($result, [['id', $_POST['id']]]);
			$this->redirect('rss', 'index');
		} else {
			echo '<script>alert("Cập nhật thất bại")</script>';
			$this->view->errors = $errors;
			$this->view->render('rss/edit');
		}
	}
	public function delete()
	{

		if (isset($_GET['id'])) $this->db->deleteItem($_GET['id']);
		$this->redirect('rss', 'index');
	}

	public function changeStatus()
	{
		if ($_GET) {
			$id = $_GET['id'];
			$status = ($_GET['status'] == 'active') ? "inactive" : "active";
			$chageStatus = $this->db->update(['status' => $status], [['id', $id]]);
			if ($chageStatus > 0) {
				$_SESSION['notice'] = 'cập nhật dữ liệu thành công';
			}
			$this->redirect('rss', 'index');
		}
	}
}
