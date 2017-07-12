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
		return $this->db->get()->result();
	}

	public function getEventosDesativados()
	{
		$this->db->select('*');
		$this->db->from('eventos');
		$this->db->where('ativo', 0);
		return $this->db->get()->result_array();
	}

	public function getDiasEvento($id_evento)
	{
		$this->db->select('data_inicial,data_final');
		$this->db->from('eventos');
		$this->db->where('id', $id_evento);
		$dados = $this->db->get()->row();

		$data_inicial = $dados->data_inicial;
		$data_final = $dados->data_final;

		$data_inicial = new DateTime($data_inicial);
		$data_final = new DateTime($data_final);

		$dias = [];
		while ($data_inicial <= $data_final) {
			$dias[] = $data_inicial->format('d-m-Y');
			$data_inicial = $data_inicial->modify('+1day');
		}

		return $dias;
	}

	public function getQntDias()
	{
		$query =  $this->db->query("SELECT DATEDIFF((SELECT data_final FROM eventos WHERE ativo = 1), (SELECT data_inicial FROM eventos WHERE ativo = 1))+1 as tempo")->row();

		return $query->tempo;
	}

	private function getQntReservasEvento($id)
	{
		$this->db->select('*');
		$this->db->from('eventos');
		$this->db->where('id', $id);

		$result = $this->db->get()->result_array();

		if (!empty($result))
		{
			$result = explode(',', $result[0]['reservas']);
			return $result;
		}
	}

	public function getQntReservasbyid($id,$dia)
	{
		$result = $this->getQntReservasEvento($id);
		if (isset($dia))
		{
			if (!empty($result[$dia]))
			{
				return $result[$dia];
			}
		}
		else
		{
			return $result;
		}
		
	}

	public function getQntReservasAndDias($id)
	{
		$result = $this->getDiasEvento($id);
		$array = [];
		foreach ($result as $key => $value) {

			array_push($array, [$this->getQntReservasbyid($id,$key),$value]);
			
		}
		return $array;
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
		return true;
	}

	public function edit($id,$dados)
	{
		$this->db->where('id', $id);
		$this->db->update('eventos', $dados);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('eventos');
		$this->db->query('DELETE FROM reservas WHERE id_evento = '.$id);
	}

}

/* End of file Eventos_model.php */
/* Location: ./application/models/Eventos_model.php */
