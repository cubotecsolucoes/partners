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

    public function getQntUserReservou($token,$dia)
    {
        $this->db->from('reservas');
        $this->db->where('usuario_token', $token);
        $this->db->where('dia', $dia);
        
        return $this->db->count_all_results();
    }

}

/* End of file Reservas_model.php */
/* Location: ./application/models/Reservas_model.php */