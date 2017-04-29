<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getEventosList()
	{
		$this->db->select('*');
		$this->db->from('eventos');
		return $this->db->get()->result_array();
	}

	public function getEventoAtivo()
	{
		$this->db->select('*');
		$this->db->from('eventos');
		$this->db->where('ativo', 1);
		return $this->db->get();
	}

	public function ativarEvento($id)
	{
		$this->db->where('id', $id);
		$this->db->update('eventos', ['ativo' => 1]);
	}

	public function desativarEvento($id)
	{
		$this->db->where('id', $id);
		$this->db->update('eventos', ['ativo' => 0]);
	}

	public function add($dados)
	{
		$this->db->insert('eventos', $dados);
	}

	public public function edit($id,$dados)
	{
		$this->db->where('id', $id);
		$this->db->update('eventos', $dados);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('eventos');
	}

}

/* End of file Eventos_model.php */
/* Location: ./application/models/Eventos_model.php */