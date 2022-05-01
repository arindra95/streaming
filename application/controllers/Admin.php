<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->login) {
			redirect(base_url('Auth'));
		}
	}

	public function index()
	{
		$data['html']['title'] = 'Dasboard';
		$this->template($data);
	}

	public function adsList()
	{
		$tableName = 'ads';
		$join = array(
			array('account', 'account.pkey=' . $tableName . '.createon', 'left'),
			array('role', 'role.pkey=account.role', 'left'),
		);
		$select = '
			' . $tableName . '.*,
			account.name as createname,
			account.role as createrole,
			role.name as rolename,
		';


		$dataList = $this->getDataRow($tableName, $select, '', '', $join);
		$data['html']['title'] = 'List Ads';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/ads';
		$data['url'] = 'admin/adsList';
		$this->template($data);
	}

	public function ads($id = '')
	{
		$tableName = 'ads';
		$tableDetail = '';
		$baseUrl = get_class($this) . '/' . __FUNCTION__;
		$detailRef = '';
		$formData = array(
			'pkey' => 'pkey',
			'name' => 'name',
			'createon' => 'sesionid',
			'time' => 'time',
			'link' => 'link',
		);
		$formDetail = array();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['action'])) redirect(base_url($baseUrl . 'List'));
			//validate form
			$arrMsgErr = array();
			if (empty($_POST['name']))
				array_push($arrMsgErr, 'Nama Wajib Di isi');


			if ($_POST['action'] == 'add')
				if (empty($_FILES['imgAds']['name']))
					array_push($arrMsgErr, "Gambar wajib Di isi");

			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr)))
				switch ($_POST['action']) {
					case 'add':
						$refkey = $this->insert($tableName, $this->dataForm($formData));
						$this->insertDetail($tableDetail, $formDetail, $refkey);
						$upload = array(
							'postname' => 'imgAds',
							'tablename' => $tableName,
							'colomname' => 'img',
							'pkey' => $refkey,
						);
						$this->uploadImg($upload);
						redirect(base_url($baseUrl . 'List')); //wajib terakhir
						break;
					case 'update':
						$this->update($tableName, $this->dataForm($formData), array('pkey' => $_POST['pkey']));
						$this->updateDetail($tableDetail, $formDetail, $detailRef, $id);
						if (!empty($_FILES['imgAds']['name'])) {
							$upload = array(
								'postname' => 'imgAds',
								'tablename' => $tableName,
								'colomname' => 'img',
								'pkey' => $_POST['pkey'],
								'replace' => true,
							);
							$this->uploadImg($upload);
						}
						redirect(base_url($baseUrl . 'List'));
						break;
				}
		}

		if (!empty($id)) {
			$dataRow = $this->getDataRow($tableName, '*', array('pkey' => $id), 1)[0];
			$this->dataFormEdit($formData, $dataRow);
		}

		$data['html']['baseUrl'] = $baseUrl;
		$data['html']['title'] = 'Input Data Iklan';
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__ . 'Form';
		$this->template($data);
	}

	public function liveList()
	{
		$tableName = 'live';
		$join = array(
			array('account', 'account.pkey=' . $tableName . '.createon', 'left'),
			array('role', 'role.pkey=account.role', 'left'),
		);
		$select = '
			' . $tableName . '.*,
			account.name as createname,
			account.role as createrole,
			role.name as rolename,
		';


		$dataList = $this->getDataRow($tableName, $select, '', '', $join);
		$data['html']['title'] = 'List Live';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/live';
		$data['url'] = 'admin/liveList';
		$this->template($data);
	}

	public function live($id = '')
	{
		$tableName = 'live';
		$tableDetail = '';
		$baseUrl = get_class($this) . '/' . __FUNCTION__;
		$detailRef = '';
		$formData = array(
			'pkey' => 'pkey',
			'name' => 'name',
			'createon' => 'sesionid',
			'time' => 'time',
			'link' => 'link',
		);
		$formDetail = array();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['action'])) redirect(base_url($baseUrl . 'List'));
			//validate form
			$arrMsgErr = array();
			if (empty($_POST['name']))
				array_push($arrMsgErr, 'Nama Wajib Di isi');
			if (empty($_POST['link']))
				array_push($arrMsgErr, 'Link Wajib Di isi');
			if ($_POST['action'] == 'add')
				if (empty($_FILES['img']['name']))
					array_push($arrMsgErr, "Logo wajib Di isi");

			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr)))
				switch ($_POST['action']) {
					case 'add':
						$refkey = $this->insert($tableName, $this->dataForm($formData));
						$this->insertDetail($tableDetail, $formDetail, $refkey);
						$upload = array(
							'postname' => 'img',
							'tablename' => $tableName,
							'colomname' => 'img',
							'pkey' => $refkey,
						);
						$this->uploadImg($upload);
						redirect(base_url($baseUrl . 'List')); //wajib terakhir
						break;
					case 'update':
						$this->update($tableName, $this->dataForm($formData), array('pkey' => $_POST['pkey']));
						$this->updateDetail($tableDetail, $formDetail, $detailRef, $id);
						if (!empty($_FILES['img']['name'])) {
							$upload = array(
								'postname' => 'img',
								'tablename' => $tableName,
								'colomname' => 'img',
								'pkey' => $_POST['pkey'],
								'replace' => true,
							);
							$this->uploadImg($upload);
						}
						redirect(base_url($baseUrl . 'List'));
						break;
				}
		}

		if (!empty($id)) {
			$dataRow = $this->getDataRow($tableName, '*', array('pkey' => $id), 1)[0];
			$this->dataFormEdit($formData, $dataRow);
		}

		$data['html']['baseUrl'] = $baseUrl;
		$data['html']['title'] = 'Input Data Live Streming';
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__ . 'Form';
		$this->template($data);
	}

	public function headList()
	{
		$tableName = 'head';

		$join = array(
			array('account', 'account.pkey=' . $tableName . '.createon', 'left'),
			array('role', 'role.pkey=account.role', 'left'),
		);
		$select = '
			' . $tableName . '.*,
			account.name as createname,
			account.role as createrole,
			role.name as rolename,
		';

		$dataList = $this->getDataRow($tableName, $select, '', '', $join);
		$data['html']['title'] = 'List Head Seo';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/head';
		$data['url'] = 'admin/headList';
		$this->template($data);
	}
	public function head($id = '')
	{
		$tableName = 'head';
		$tableDetail = '';
		$baseUrl = get_class($this) . '/' . __FUNCTION__;
		$detailRef = '';
		$formData = array(
			'pkey' => 'pkey',
			'name' => 'name',
			'html' => 'html',
			'createon' => 'sesionid',
			'time' => 'time',
		);
		$formDetail = array();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['action'])) redirect(base_url($baseUrl . 'List'));
			//validate form
			$arrMsgErr = array();
			if (empty($_POST['name']))
				array_push($arrMsgErr, 'nama Wajib Di isi');

			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr)))
				switch ($_POST['action']) {
					case 'add':
						$refkey = $this->insert($tableName, $this->dataForm($formData));
						$this->insertDetail($tableDetail, $formDetail, $refkey);
						redirect(base_url($baseUrl . 'List')); //wajib terakhir
						break;
					case 'update':
						$this->update($tableName, $this->dataForm($formData), array('pkey' => $_POST['pkey']));
						$this->updateDetail($tableDetail, $formDetail, $detailRef, $id);
						redirect(base_url($baseUrl . 'List'));
						break;
				}
		}

		if (!empty($id)) {
			$dataRow = $this->getDataRow($tableName, '*', array('pkey' => $id), 1)[0];
			$this->dataFormEdit($formData, $dataRow);
		}

		$data['html']['baseUrl'] = $baseUrl;
		$data['html']['title'] = 'Input Data head';
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__ . 'Form';
		$this->template($data);
	}

	public function menuList()
	{
		$tableName = 'menu';

		$join = array(
			array('account', 'account.pkey=' . $tableName . '.createon', 'left'),
			array('role', 'role.pkey=account.role', 'left'),
		);
		$select = '
			' . $tableName . '.*,
			account.name as createname,
			account.role as createrole,
			role.name as rolename,
		';

		$dataList = $this->getDataRow($tableName, $select, '', '', $join);
		$data['html']['title'] = 'List Menu';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/menu';
		$data['url'] = 'admin/menuList';
		$this->template($data);
	}
	public function menu($id = '')
	{
		$tableName = 'menu';
		$tableDetail = '';
		$baseUrl = get_class($this) . '/' . __FUNCTION__;
		$detailRef = '';
		$formData = array(
			'pkey' => 'pkey',
			'title' => 'title',
			'link' => 'link',
			'createon' => 'sesionid',
			'time' => 'time',
		);
		$formDetail = array();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['action'])) redirect(base_url($baseUrl . 'List'));
			//validate form
			$arrMsgErr = array();
			if (empty($_POST['title']))
				array_push($arrMsgErr, 'Title Wajib Di isi');
			if (empty($_POST['link']))
				array_push($arrMsgErr, 'Link Wajib Di isi');

			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr)))
				switch ($_POST['action']) {
					case 'add':
						$refkey = $this->insert($tableName, $this->dataForm($formData));
						$this->insertDetail($tableDetail, $formDetail, $refkey);
						redirect(base_url($baseUrl . 'List')); //wajib terakhir
						break;
					case 'update':
						$this->update($tableName, $this->dataForm($formData), array('pkey' => $_POST['pkey']));
						$this->updateDetail($tableDetail, $formDetail, $detailRef, $id);
						redirect(base_url($baseUrl . 'List'));
						break;
				}
		}

		if (!empty($id)) {
			$dataRow = $this->getDataRow($tableName, '*', array('pkey' => $id), 1)[0];
			$this->dataFormEdit($formData, $dataRow);
		}

		$data['html']['baseUrl'] = $baseUrl;
		$data['html']['title'] = 'Input Data Menu';
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__ . 'Form';
		$this->template($data);
	}

	public function brandList()
	{
		$tableName = 'brand';

		$join = array(
			array('account', 'account.pkey=' . $tableName . '.createon', 'left'),
			array('role', 'role.pkey=account.role', 'left'),
		);
		$select = '
			' . $tableName . '.*,
			account.name as createname,
			account.role as createrole,
			role.name as rolename,
		';

		$dataList = $this->getDataRow($tableName, $select, '', '', $join);
		$data['html']['title'] = 'List Brand';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/brand';
		$data['url'] = 'admin/brandList';
		$this->template($data);
	}
	public function brand($id = '')
	{
		$tableName = 'brand';
		$tableDetail = '';
		$baseUrl = get_class($this) . '/' . __FUNCTION__;
		$detailRef = '';
		$formData = array(
			'pkey' => 'pkey',
			'name' => 'name',
			'createon' => 'sesionid',
			'time' => 'time',
		);
		$formDetail = array();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['action'])) redirect(base_url($baseUrl . 'List'));
			//validate form
			$arrMsgErr = array();
			if (empty($_POST['name']))
				array_push($arrMsgErr, 'nama Wajib Di isi');

			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr)))
				switch ($_POST['action']) {
					case 'add':
						$refkey = $this->insert($tableName, $this->dataForm($formData));
						$this->insertDetail($tableDetail, $formDetail, $refkey);
						$upload = array(
							'postname' => 'img',
							'tablename' => $tableName,
							'colomname' => 'img',
							'pkey' => $refkey,
						);
						$this->uploadImg($upload);
						redirect(base_url($baseUrl . 'List')); //wajib terakhir
						break;
					case 'update':
						$this->update($tableName, $this->dataForm($formData), array('pkey' => $_POST['pkey']));
						$this->updateDetail($tableDetail, $formDetail, $detailRef, $id);
						if (!empty($_FILES['img']['name'])) {
							$upload = array(
								'postname' => 'img',
								'tablename' => $tableName,
								'colomname' => 'img',
								'pkey' => $_POST['pkey'],
								'replace' => true,
							);
							$this->uploadImg($upload);
						}
						redirect(base_url($baseUrl . 'List'));
						break;
				}
		}

		if (!empty($id)) {
			$dataRow = $this->getDataRow($tableName, '*', array('pkey' => $id), 1)[0];
			$this->dataFormEdit($formData, $dataRow);
		}

		$data['html']['baseUrl'] = $baseUrl;
		$data['html']['title'] = 'Input Data ' . __FUNCTION__;
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__ . 'Form';
		$this->template($data);
	}
	public function contentList()
	{
		$tableName = 'content';

		$join = array(
			array('account', 'account.pkey=' . $tableName . '.createon', 'left'),
			array('role', 'role.pkey=account.role', 'left'),
		);
		$select = '
			' . $tableName . '.*,
			account.name as createname,
			account.role as createrole,
			role.name as rolename,
		';

		$dataList = $this->getDataRow($tableName, $select, '', '', $join);
		$data['html']['title'] = 'List Content';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/content';
		$data['url'] = 'admin/contentList';
		$this->template($data);
	}
	public function content($id = '')
	{
		$tableName = 'content';
		$tableDetail = '';
		$baseUrl = get_class($this) . '/' . __FUNCTION__;
		$detailRef = '';
		$formData = array(
			'pkey' => 'pkey',
			'name' => 'name',
			'content' => 'content',
			'createon' => 'sesionid',
			'time' => 'time',
		);
		$formDetail = array();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['action'])) redirect(base_url($baseUrl . 'List'));
			//validate form
			$arrMsgErr = array();
			if (empty($_POST['name']))
				array_push($arrMsgErr, 'nama Wajib Di isi');
			if (empty($_POST['content']))
				array_push($arrMsgErr, 'content Wajib Di isi');

			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr)))
				switch ($_POST['action']) {
					case 'add':
						$refkey = $this->insert($tableName, $this->dataForm($formData));
						$this->insertDetail($tableDetail, $formDetail, $refkey);
						redirect(base_url($baseUrl . 'List')); //wajib terakhir
						break;
					case 'update':
						$this->update($tableName, $this->dataForm($formData), array('pkey' => $_POST['pkey']));
						$this->updateDetail($tableDetail, $formDetail, $detailRef, $id);
						redirect(base_url($baseUrl . 'List'));
						break;
				}
		}

		if (!empty($id)) {
			$dataRow = $this->getDataRow($tableName, '*', array('pkey' => $id), 1)[0];
			$this->dataFormEdit($formData, $dataRow);
		}

		$data['html']['baseUrl'] = $baseUrl;
		$data['html']['title'] = 'Input Data ' . __FUNCTION__;
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__ . 'Form';
		$this->template($data);
	}







	public function userList()
	{
		if ($this->session->userdata('role') != '1')
			redirect(base_url());
		$tableName = 'account';
		$join = array(
			array('role', 'role.pkey=account.role', 'left'),
		);
		$dataList = $this->getDataRow($tableName, 'account.*, role.name as rolename', '', '', $join, 'name ASC');
		$data['html']['title'] = 'List Account';
		$data['html']['dataList'] = $dataList;
		$data['html']['tableName'] = $tableName;
		$data['html']['form'] = get_class($this) . '/user';
		$data['url'] = 'admin/userList';
		$this->template($data);
	}

	public function user($id = '')
	{
		$tableName = 'account';
		$tableDetail = '';
		$baseUrl = get_class($this) . '/' . __FUNCTION__;
		$detailRef = '';
		$formData = array(
			'pkey' => 'pkey',
			'name' => 'name',
			'username' => 'username',
			'role' => 'role',
		);
		$formDetail = array();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['action'])) redirect(base_url($baseUrl . 'List'));
			//validate form
			$arrMsgErr = array();
			if (empty($_POST['name']))
				array_push($arrMsgErr, "Password wajib Di isi");

			if (empty($_POST['password']) && $_POST['action'] == 'add')
				array_push($arrMsgErr, "Password wajib Di isi");
			if ($_POST['role'] == '1')
				unset($_POST['detailKey']);



			$this->session->set_flashdata('arrMsgErr', $arrMsgErr);
			//validate form
			if (empty(count($arrMsgErr)))
				switch ($_POST['action']) {
					case 'add':
						$formData['password'] = array('password', 'md5');
						$refkey = $this->insert($tableName, $this->dataForm($formData));
						$this->insertDetail($tableDetail, $formDetail, $refkey);
						redirect(base_url($baseUrl . 'List')); //wajib terakhir
						break;
					case 'update':
						if (!empty($_POST['password']))
							$formData['password'] = array('password', 'md5');
						$this->update($tableName, $this->dataForm($formData), array('pkey' => $_POST['pkey']));
						$this->updateDetail($tableDetail, $formDetail, $detailRef, $id);
						redirect(base_url($baseUrl . 'List'));
						break;
				}
		}

		if (!empty($id)) {
			$dataRow = $this->getDataRow($tableName, '*', array('pkey' => $id), 1)[0];
			$this->dataFormEdit($formData, $dataRow);
			$_POST['password'] = '';
		}
		$selVal = $this->getDataRow('role', '*', '', '', '', 'name ASC');

		$data['html']['baseUrl'] = $baseUrl;
		$data['html']['selVal'] = $selVal;
		$data['html']['title'] = 'Input ' . __FUNCTION__;
		$data['html']['err'] = $this->genrateErr();
		$data['url'] = 'admin/' . __FUNCTION__ . 'Form';
		$this->template($data);
	}

	public function ajax()
	{
		if (empty($_POST['action'])) {
			echo 'no action';
			die;
		}
		switch ($_POST['action']) {
			case 'delete':
				switch ($_POST['tbl']) {
					default:
						$this->delete($_POST['tbl'], 'pkey=' . $_POST['pkey']);
						break;
				}
				break;
			case 'statuslink':
				$this->update('link', array('status' => '0'), array('status' => '1'));
				$this->update('link', array('status' => '1'), array('pkey' => $_POST['pkey']));
				break;
			case 'statusAds':
				$oldststus = $this->getDataRow('ads', 'status', array('pkey' => $_POST['pkey']));
				$status = '1';
				if ($oldststus[0]['status'] == '1')
					$status = '0';
				$this->update('ads', array('status' => $status), array('pkey' => $_POST['pkey']));
				break;
			case 'statusLive':
				$oldststus = $this->getDataRow('live', 'status', array('pkey' => $_POST['pkey']));
				$status = '1';
				if ($oldststus[0]['status'] == '1')
					$status = '0';
				$this->update('live', array('status' => $status), array('pkey' => $_POST['pkey']));
				break;
			case 'statusHead':
				$this->update('head', array('status' => '0'), array('status' => '1'));
				$this->update('head', array('status' => '1'), array('pkey' => $_POST['pkey']));
				break;
			case 'statusBrand':
				$this->update('brand', array('status' => '0'), array('status' => '1'));
				$this->update('brand', array('status' => '1'), array('pkey' => $_POST['pkey']));
				break;
			case 'statusContent':
				$this->update('content', array('status' => '0'), array('status' => '1'));
				$this->update('content', array('status' => '1'), array('pkey' => $_POST['pkey']));
				break;
			case 'statusMenu':
				$oldststus = $this->getDataRow('menu', 'status', array('pkey' => $_POST['pkey']));
				$status = '1';
				if ($oldststus[0]['status'] == '1')
					$status = '0';
				$this->update('menu', array('status' => $status), array('pkey' => $_POST['pkey']));
				break;
			default:
				echo  $_POST['action'] . ' action is not in the list';
				break;
		}
	}
}
