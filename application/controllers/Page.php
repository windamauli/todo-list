<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_user');

	}

	public function index()
	{
		$this->load->view('login');
    }
    
    public function signup()
	{
		$this->load->view('signup');
	}

	//show todo list
	public function home()
	{
		if ($_SESSION['logged_in']) {

			$id = $this->session->userdata('id_user');
			$data['result'] = $this->m_user->getById($id);
			$this->load->view('home', $data);
		}else{
			echo "Belum Login";
		}
	}

	//get task by id_task
	public function task_byId($id)
	{
		if($_SESSION['logged_in']){
			$data['result'] = $this->m_user->getTaskById($id);
		}else{
			echo "Belum Login";
		}
	}

	public function add()
	{
		if ($_SESSION['logged_in']) {
			$this->load->view('newTask');
		} else{
			echo "Belum Login";
		}
	}

	//show detail task
	public function detail(){
		if ($_SESSION['logged_in']) {
			$query['task'] = $this->m_user->edit_task($_GET['ID']);
			$this->load->view('detail', $query);
		} else {
			echo "Belum Login";
		}
	}

	//view edit task
	public function edit_task(){
		if ($_SESSION['logged_in']) {
			$query['task'] = $this->m_user->edit_task($_GET['ID']);
			$this->load->view('updateTask', $query);
		}else{
			echo "Belum Login";
		}
	}

	public function proses_edit(){
		$id_task = $this->input->post('id_task');
		$title = $this->input->post('title');
		$date = $this->input->post('date');
		$desc = $this->input->post('desc');
		$status = $this->input->post('status');

		$this->m_user->edit($id_task, $title, $date, $desc, $status);
		redirect('page/home');
	}

	public function prosesRegis(){
		$data['username'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		
		$this->m_user->insertData($data);
		$this->index();

	}

	public function addTask(){
		if ($_SESSION['logged_in']) {
			$id = $this->session->userdata('id_user');
			$data['id_user'] = $id;
			$data['title'] = $this->input->post('title');
			$data['date'] = $this->input->post('date');
			$data['desc'] = $this->input->post('desc');
			$data['status'] = 0;
		
			$this->m_user->addTask($data);
			$this->home();
		}else{
			echo "Belum Login";
		}

	}

	public function login(){
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');

		$id=$this->m_user->login($data);
		

		if ($id != null) {
			$result = $id->result_array();
			$_SESSION['id_user'] = $result[0]['id_user'];
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $result[0]['username'];

			redirect('page/home');

		}else{
			

			$this->session->set_flashdata('yes', 'Invalid username or password');

			redirect('page/index');

		}
	}

	//edit status task; done or undone
	public function edit_status($id_task){
		$this->m_user->edit_status($id_task);
		$this->home();
	}
	
	public function hapus($id)
	{
		$this->m_user->hapus($id);
		$this->home();
		
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('page/index'));
	}

	public function getbyStatus()
	{
		if ($_SESSION['logged_in']) {
			$id = $this->session->userdata('id_user');
			$status = $this->input->post('status');
		
			$data['result'] = $this->m_user->getbyStatus($status, $id);

			$this->load->view('home', $data);
		}else{
			echo "Belum login";
		}
	}

	public function getbyDate()
	{
		if ($_SESSION['logged_in']) {
			$id = $this->session->userdata('id_user');
			$date = $this->input->post('date');
		
			$data['result'] = $this->m_user->getbyDate($date, $id);

			$this->load->view('home', $data);
		}else{
			echo "Belum login";
		}
	}

	public function sort(){
		if ($_SESSION['logged_in']) {
			$id = $this->session->userdata('id_user');
			$sort = $this->input->post('sort');
			if($sort == '1'){
				$data['result'] = $this->m_user->sortAsc($id);

				$this->load->view('home', $data);
			}else{
				$data['result'] = $this->m_user->sortDesc($id);

				$this->load->view('home', $data);
			}
		}else{
			echo "Belum Login";
		}
	}
	 
}
