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
		$this->load->model('eventos_model', 'eventos');
		
		if (!empty($this->eventos->getEventoAtivo()[0]))
		{
			$result = $this->eventos->getEventoAtivo()[0]->id;
		}
		else
		{
			$result = 0;
		}
		$this->template->set('eventoid', $result);
	}

	public function index()
	{
		if ($this->login->hasAdmin()) {
			redirect('reserva/admin','refresh');
		} else {
			$this->load->model('reservas_model','reservas');

			$data = [
				'imprimiu' => $this->reservas->hasImprimiu($_SESSION['user']['usuario_token'])
			];

			$this->template->load('reservas/template','reservas/painel',$data);
		}
	}

	public function admin()
	{
		if (!$this->login->hasAdmin()) {
			redirect('reserva/index','refresh');
		} else {
			if (isset($this->eventos->getEventoAtivo()[0]->id)) {
				$retorno = $this->eventos->getEventoAtivo()[0]->id;
			} else
			{
				$retorno = 0;
			}
			$this->load->model('reservas_model','reservas');
			$data = [
				'dados' => $this->reservas->getQntReservados($retorno)
			];
			$this->template->load('reservas/template','reservas/admin',$data);
		}
	}

}

/* End of file reservas.php */
/* Location: ./application/controllers/reservas.php */
