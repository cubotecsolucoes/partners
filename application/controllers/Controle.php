<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controle extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}




// EVENTOS

	public function getEvento()
	{
		echo "oi";
		$this->load->model('eventos_model', 'eventos');
		print_r($this->eventos->getEventoAtivo());
	}

	public function getDiasEvento()
	{
		$this->load->model('eventos_model', 'eventos');
		echo(json_encode($this->eventos->getDiasEvento()));
	}

	public function getQntDias()
	{
		$this->load->model('eventos_model', 'eventos');
		echo(json_encode($this->eventos->getQntDias()));
	}

	public function addEvento()
	{
		$this->load->model('eventos_model', 'eventos');

		$data = [
			'nome' => 'Evento Teste',
			'data_inicial' => '2017-04-28',
			'data_final' => '2017-05-25',
			'ativo' => 1,
			'editado_em' => time(),
		];

		$this->eventos->add($data);
	}

	public function editEvento($id)
	{
		$this->load->model('eventos_model', 'eventos');

		$data = [
			'nome' => 'Evento Teste',
			'data_inicial' => '2017-04-28',
			'data_final' => '2017-05-25',
			'ativo' => 1,
			'editado_em' => time(),
		];

		$this->eventos->edit($id,$data);
	}

	public function deleteEvento($id)
	{
		$this->load->model('eventos_model', 'eventos');
		$this->eventos->delete($id);
	}

	public function ativarEvento($id)
	{
		$this->load->model('eventos_model', 'eventos');
		$this->eventos->ativarEvento($id);
	}

	public function desativarEvento($id)
	{
		$this->load->model('eventos_model', 'eventos');
		$this->eventos->desativarEvento($id);
	}




	// RESERVAS

	public function addReserva()
	{
		$this->load->model('reservas_model','reservas');
		$dia = $_POST['data'];
		$dia = explode('-', $dia);
		$objeto = [
			'id_lugar' => $_POST['lugares'],
			'usuario_token' => $_POST['user_token'],
			'dia' => "$dia[2]-$dia[1]-$dia[0]"
		];

		if ($this->reservas->add($objeto)) {
			echo(json_encode(['error' => 0]));
		} else {
			echo(json_encode(['error' => 1]));
		}
	}

	public function editReserva($id)
	{
		$this->load->model('reservas_model','reservas');

		$objeto = [
			'id_lugar' => [1,3,5],
			'usuario_token' => 10,
			'dia' => '2017-08-12'
		];

		$this->reservas->edit($id, $objeto);
	}

	public function deleteReserva($id)
	{
		$this->load->model('reservas_model','reservas');
		$this->reservas->delete($id);
	}

	public function getReservaList()
	{
		$this->load->model('reservas_model','reservas');
		$this->reservas->getListaReservas();
	}

	public function getReservaUser($token)
	{
		$this->load->model('reservas_model','reservas');
		echo(json_encode($this->reservas->getListaReservasUsuario($token)));
	}




	// LUGARES

	public function lugareslist()
	{
		$this->load->model('lugares_model','lugares');
		$loc = $_POST['localizacao'];
		$nivel = $_POST['piso'];
		echo(json_encode($this->lugares->getLugaresLivres($loc,$nivel)));
	}

	public function resetLugares($token)
	{
		$this->load->model('lugares_model','lugares');
		if ($token === "qweasdzxc") {
			$mapa = [
				'Plateia' => [
					'Direita' => [
						'A' => ['inicio' => 01, 'final' => 11],
						'B' => ['inicio' => 01, 'final' => 11],
						'C' => ['inicio' => 01, 'final' => 11],
						'D' => ['inicio' => 01, 'final' => 12],
						'E' => ['inicio' => 01, 'final' => 12],
						'F' => ['inicio' => 01, 'final' => 12],
						'G' => ['inicio' => 01, 'final' => 13],
						'H' => ['inicio' => 01, 'final' => 13],
						'I' => ['inicio' => 01, 'final' => 13],
						'J' => ['inicio' => 01, 'final' => 14],
						'K' => ['inicio' => 01, 'final' => 14],
						'L' => ['inicio' => 01, 'final' => 14],
						'M' => ['inicio' => 01, 'final' => 15],
					],

					'Centro' => [
						'A' => ['inicio' => 12, 'final' => 22],
						'B' => ['inicio' => 12, 'final' => 22],
						'C' => ['inicio' => 12, 'final' => 22],
						'D' => ['inicio' => 13, 'final' => 24],
						'E' => ['inicio' => 13, 'final' => 24],
						'F' => ['inicio' => 13, 'final' => 25],
						'G' => ['inicio' => 14, 'final' => 26],
						'H' => ['inicio' => 14, 'final' => 26],
						'I' => ['inicio' => 14, 'final' => 27],
						'J' => ['inicio' => 15, 'final' => 28],
						'K' => ['inicio' => 15, 'final' => 28],
						'L' => ['inicio' => 15, 'final' => 29],
					],

					'Esquerda' => [
						'A' => ['inicio' => 23, 'final' => 33],
						'B' => ['inicio' => 23, 'final' => 33],
						'C' => ['inicio' => 23, 'final' => 33],
						'D' => ['inicio' => 25, 'final' => 36],
						'E' => ['inicio' => 25, 'final' => 36],
						'F' => ['inicio' => 26, 'final' => 37],
						'G' => ['inicio' => 27, 'final' => 39],
						'H' => ['inicio' => 27, 'final' => 39],
						'I' => ['inicio' => 28, 'final' => 40],
						'J' => ['inicio' => 29, 'final' => 42],
						'K' => ['inicio' => 29, 'final' => 42],
						'L' => ['inicio' => 30, 'final' => 43],
						'M' => ['inicio' => 16, 'final' => 30],
					]
				],
				'Mezanino' => [
					'Direita' => [
						'N' => ['inicio' => 1, 'final' => 12],
						'O' => ['inicio' => 1, 'final' => 12],
						'P' => ['inicio' => 1, 'final' => 12],
						'Q' => ['inicio' => 1, 'final' => 16],
						'R' => ['inicio' => 1, 'final' => 17],
						'S' => ['inicio' => 1, 'final' => 17],
						'T' => ['inicio' => 1, 'final' => 17],
						'U' => ['inicio' => 1, 'final' => 18],
						'V' => ['inicio' => 1, 'final' => 18],
						'W' => ['inicio' => 1, 'final' => 18],
						'X' => ['inicio' => 1, 'final' => 19],
						'Y' => ['inicio' => 1, 'final' => 19],
						'Z' => ['inicio' => 1, 'final' => 19],
						'Z1' => ['inicio' => 1, 'final' => 20],
						'Z2' => ['inicio' => 1, 'final' => 20],
						'Z3' => ['inicio' => 1, 'final' => 20],
						'Z4' => ['inicio' => 1, 'final' => 18],
					],

					'Centro' => [
						'Q' => ['inicio' => 17, 'final' => 34],
						'R' => ['inicio' => 18, 'final' => 35],
						'S' => ['inicio' => 18, 'final' => 36],
						'T' => ['inicio' => 18, 'final' => 36],
						'U' => ['inicio' => 19, 'final' => 37],
						'V' => ['inicio' => 19, 'final' => 38],
						'W' => ['inicio' => 19, 'final' => 38],
						'X' => ['inicio' => 20, 'final' => 39],
						'Y' => ['inicio' => 20, 'final' => 40],
						'Z' => ['inicio' => 20, 'final' => 40],
						'Z1' => ['inicio' => 21, 'final' => 41],
						'Z2' => ['inicio' => 21, 'final' => 42],
					],

					'Esquerda' => [
						'N' => ['inicio' => 13, 'final' => 24],
						'O' => ['inicio' => 13, 'final' => 24],
						'P' => ['inicio' => 13, 'final' => 24],
						'Q' => ['inicio' => 35, 'final' => 50],
						'R' => ['inicio' => 36, 'final' => 52],
						'S' => ['inicio' => 37, 'final' => 53],
						'T' => ['inicio' => 37, 'final' => 53],
						'U' => ['inicio' => 38, 'final' => 55],
						'V' => ['inicio' => 39, 'final' => 56],
						'W' => ['inicio' => 39, 'final' => 56],
						'X' => ['inicio' => 40, 'final' => 58],
						'Y' => ['inicio' => 41, 'final' => 59],
						'Z' => ['inicio' => 41, 'final' => 59],
						'Z1' => ['inicio' => 42, 'final' => 61],
						'Z2' => ['inicio' => 43, 'final' => 62],
						'Z3' => ['inicio' => 44, 'final' => 63],
						'Z4' => ['inicio' => 19, 'final' => 36],
					]
				]
			];
		} else {
			echo("Error");
			return false;
		}

		$this->lugares->resetLugares($mapa);
	}

	public function lugaresOcupados($dia)
	{
		$this->load->model('lugares_model','lugares');
		$retorno = [];
		$dados = $this->lugares->getLugeresOcupados($dia);
		foreach ($dados as $key => $value) {
			$retorno[] = $value['id_lugar'];
		}
		echo(json_encode($retorno));
	}


}

/* End of file Controle.php */
/* Location: ./application/controllers/Controle.php */
