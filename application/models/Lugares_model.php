<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lugares_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	private function addLugares($value)
	{
		set_time_limit(120);
		$this->db->select('id');
		if (!empty($this->db->get('lugares')->result_array())) {
			return false;
		}
		foreach ($value as $pis => $piso) {
			foreach ($piso as $localizaca => $localizacao) {
				foreach ($localizacao as $colun => $coluna) {
					for ($i=$coluna['inicio']; $i < $coluna['final']+1; $i++) { 
						$objeto = [
							'nivel' => $pis,
							'localizacao' => $localizaca,
							'numero' => $i,
							'coluna' => $colun
						];

						$this->db->insert('lugares', $objeto);
					}
				}
			}
		}
		return true;
	}

	private function clearLugares()
	{
		$this->db->truncate('lugares');
	}

	public function resetLugares($value)
	{
		$this->clearLugares();
		$this->addLugares($value);
	}

	public function getLugaresLivres($localizacao, $nivel)
	{
		$this->db->select('*');
    	$this->db->where('localizacao', $localizacao);
    	$this->db->where('nivel', $nivel);
        $this->db->order_by('id', 'desc');

    	return $this->db->get('lugares')->result_array();
	}

	public function getLugeresOcupados($dia)
	{
		$this->db->select('id_lugar');
		$this->db->from('reservas');
		$this->db->where('dia', $dia);
		return $this->db->get()->result_array();
	}

	// SELECT reservas.id_reserva AS id_reserva,reservas.dia AS dia,lugares.coluna as coluna,lugares.numero as numero,lugares.localizacao as localizacao,lugares.nivel as nivel, usuarios.usuario as usuario FROM reservas, lugares, usuarios WHERE reservas.id_lugar = lugares.id AND reservas.usuario_token = usuarios.usuario_token

}

/* End of file Lugares_model.php */
/* Location: ./application/models/Lugares_model.php */