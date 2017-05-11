<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Usuarios_model','user');
	}

	public function hasLoged()
	{
		if ($this->session->userdata('logado') === true) {
			return true;
		} else {
			return false;
		}
	}

	public function hasAdmin()
	{
		if ($this->session->userdata('user')['acesso'] == 2) {
			return true;
		} else {
			return false;
		}
	}

	public function login($user, $pass)
	{
		$this->user->_setUsuario($user);
        $this->user->_setSenha($pass);
		if ($this->user->isuser()) {
			return $this->user->getUser($user, $pass)[0];
		} else {
			return [];
		}
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */