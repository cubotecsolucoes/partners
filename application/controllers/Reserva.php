<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'login');
		if (!$this->login->hasLoged()) {
			redirect('login/index','refresh');
		}
	}

	public function index()
	{
		$data = [];
		$this->load->view('reservas/painel', $data);
	}

}

/* End of file reservas.php */
/* Location: ./application/controllers/reservas.php */
