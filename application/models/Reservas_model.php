<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
		}

	public function add($value)
		{
			foreach ($value['id_lugar'] as $lugar) {
				$objeto = [
					'id_lugar' => $lugar,
					'usuario_token' => $value['usuario_token'],
					'dia' => $value['dia']
				];
				$this->db->insert('reservas', $objeto);
			}
			return true;
		}

	public function edit($id,$dados)
	{
		$this->db->where('id_reserva', $id);
		$this->db->update('reservas', $dados);
	}

	public function delete($id)
	{
		$this->db->where('id_reserva', $id);
		$this->db->delete('reservas');
	}

	public function getListaReservas()
	{
		$this->db->select('*');
		return $this->db->get('reservas')->result_array();
	}

	public function getListaReservasUsuario($token)
	{
		$this->db->select('*');
		$this->db->from('reservas');
		$this->db->where('usuario_token', $token);
		$this->db->join('lugares', 'lugares.id = reservas.id_lugar');
		return $this->db->get()->result_array();
	}

	public function getReservaId($id)
	{
		$this->db->select('*');
		$this->db->where('id_reserva', $id);
		return $this->db->get('reservas')->result();
	}

	public function getQntReservados()
	{
		$this->db->select('dia, COUNT(*) as count');
		$this->db->group_by('dia');
		return $this->db->get('reservas')->result_array();
	}

    public function getQntUserReservou($token,$dia)
    {
        $this->db->from('reservas');
        $this->db->where('usuario_token', $token);
        $this->db->where('dia', $dia);
        
        return $this->db->count_all_results();
    }

    public function getInfoAllReservas()
    {
    	$query = $this->db->query("SELECT  r.id_reserva AS id,r.dia, u.nome, u.cpf, u.email, l.coluna, l.numero FROM reservas AS r, usuarios AS u, lugares AS l WHERE r.id_lugar = l.id AND r.usuario_token = u.usuario_token ORDER BY r.dia")->result_array();
    	return $query;
    }


    public function diasQueEleVai($token)
    {
    	$retorno = [];
    	$this->db->select('DISTINCT(dia)');
    	$this->db->where('usuario_token', $token);
    	foreach ($this->db->get('reservas')->result_array() as $key => $value) {
    	 	array_push($retorno, $value['dia']);
    	} 
    	return $retorno;
    }

    public function lugaresPorDia($dia,$token)
    {
    	$this->db->select('cpf,coluna,numero,localizacao,nivel');
    	$this->db->where('dia', $dia);
    	$this->db->where('token', $token);
    	return $this->db->get('view_reservas')->result_array();
    }

    public function liberado($dia,$token)
    {
    	$this->db->select('id_reserva');
    	$this->db->where('dia', $dia);
    	$this->db->where('usuario_token', $token);
    	$this->db->from('reservas');
    	$qnt = $this->db->count_all_results();
    	if ($qnt > 0) {
    		return $qnt;
    	} else {
    		return '';
    	}
    }

}

/* End of file Reservas_model.php */
/* Location: ./application/models/Reservas_model.php */