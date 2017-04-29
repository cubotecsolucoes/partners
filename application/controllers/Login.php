<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('login_model', 'login');
	}

	public function index()
	{
		$data = [];
		$this->load->view('reservas/index', $data, FALSE);
	}

	public function logar()
	{
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$user = $this->login->login($user,$pass);
		unset($user['senha']);

		if (!empty($user)) {
			$this->session->set_userdata('user',$user);
			$this->session->set_userdata('logado', true);
			redirect('reserva/index','refresh');
		} else {
			$this->session->set_userdata('logado', false);
			redirect('login/index','refresh');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('logado');
		redirect('login/index','refresh');;
	}

	
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */