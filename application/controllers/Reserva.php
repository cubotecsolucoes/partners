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
		if ($this->login->hasAdmin()) {
			redirect('reserva/admin','refresh');
		} else {
			$data = [];
			$this->template->load('reservas/template','reservas/painel',$data);
		}
	}

	public function admin()
	{
		if (!$this->login->hasAdmin()) {
			redirect('reserva/index','refresh');
		} else {
			$data = [];
			$this->template->load('reservas/template','reservas/admin',$data);
		}
	}

}

/* End of file reservas.php */
/* Location: ./application/controllers/reservas.php */
