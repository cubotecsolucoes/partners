<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
		}

	public function add($value)
	{
	    $uniqid = $this->uniqueAlfa(10);
        foreach ($value['id_lugar'] as $lugar) {

            $objeto = [
                'id_evento' => $value['id_evento'],
                'id_lugar' => $lugar,
                'usuario_token' => $value['usuario_token'],
                'dia' => $value['dia'],
                'uid' => $uniqid,
            ];

            if (!$this->db->insert('reservas', $objeto))
                return 2;
        }
        return 1;
	}

    public function uniqueAlfa($length=16)
    {
        $salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $len = strlen($salt);
        $pass = '';
        mt_srand(10000000*(double)microtime());
        for ($i = 0; $i < $length; $i++)
        {
            $pass .= $salt[mt_rand(0,$len - 1)];
        }
        return $pass;
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

	public function getListaReservas($id_evento)
	{
		$this->db->select('*');
		$this->db->where('id_evento', $id_evento);
		return $this->db->get('reservas')->result_array();
	}

	public function getListaReservasUsuario($id_evento, $token)
	{
		$this->db->select('*');
		$this->db->from('reservas');
		$this->db->where('usuario_token', $token);
		$this->db->where('id_evento', $id_evento);
		$this->db->join('lugares', 'lugares.id = reservas.id_lugar');
		return $this->db->get()->result_array();
	}

	public function getReservaId($id)
	{
		$this->db->select('*');
		$this->db->where('id_reserva', $id);
		return $this->db->get('reservas')->result();
	}

	public function getQntReservados($id_evento)
	{
		$this->db->select('dia, COUNT(*) as count');
		$this->db->where('id_evento', $id_evento);
		$this->db->group_by('dia');
		return $this->db->get('reservas')->result_array();
	}

    public function getQntUserReservou($id_evento,$token,$dia)
    {
        $this->db->from('reservas');
        $this->db->where('id_evento', $id_evento);
        $this->db->where('usuario_token', $token);
        $this->db->where('dia', $dia);
        
        return $this->db->count_all_results();
    }

    public function getInfoAllReservas($id_evento)
    {
    	$query = $this->db->query("SELECT  r.id_reserva AS id,r.dia, u.nome, u.cpf, u.email, l.coluna, l.numero FROM reservas AS r, usuarios AS u, lugares AS l WHERE r.id_evento = $id_evento AND r.id_lugar = l.id AND r.usuario_token = u.usuario_token ORDER BY r.dia")->result_array();
    	return $query;
    }

    public function getInfoReservaDia($id_evento,$dia)
    {
    	$this->db->select('*');
    	$this->db->from('view_reservas');
    	$this->db->where('dia', $dia);

    	return $this->db->get()->result_array();
    }


    public function diasQueEleVai($id_evento,$token)
    {
    	$retorno = [];
    	$this->db->select('DISTINCT(dia)');
    	$this->db->where('usuario_token', $token);
    	$this->db->where('id_evento', $id_evento);
    	foreach ($this->db->get('reservas')->result_array() as $key => $value) {
    	 	array_push($retorno, $value['dia']);
    	} 
    	return $retorno;
    }

    public function lugaresPorDia($id_evento,$dia,$token)
    {
    	$this->db->select('cpf,nome,coluna,numero,localizacao,nivel,uid');
    	$this->db->where('dia', $dia);
    	$this->db->where('id_evento', $id_evento);
    	$this->db->where('token', $token);
    	return $this->db->get('view_reservas')->result_array();
    }

    /**
     * @param $token
     * @return integer
     */
    public function liberado($token /* $id_evento,$dia,$token */)
    {
        if (!isset($token) || empty($token))
        {
            return false;
        }

        $this->db->select('usuario_token');
        $this->db->where('uid', $token);
        $user_token = $this->db->get('reservas')->result_array()[0]['usuario_token'];

        if ($this->hasImprimiu($user_token))
        {
            date_default_timezone_set('America/Sao_Paulo');
            $this->db->select('id');
            $this->db->where('uid', $token);
            $this->db->where('dia', date ("Y-m-d"));
            $this->db->from('view_reservas');
            $qnt = $this->db->count_all_results();

            return $qnt;
        }
//    	if ($this->hasImprimiuDia($token,$dia)) {
//    		$this->db->select('id_reserva');
//	    	$this->db->where('id_evento', $id_evento);
//	    	$this->db->where('dia', $dia);
//	    	$this->db->where('usuario_token', $token);
//	    	$this->db->from('reservas');
//	    	$qnt = $this->db->count_all_results();
//	    	if ($qnt > 0) {
//	    		return $qnt;
//	    	} else {
//	    		return '';
//	    	}
//    	} else {
//    		return 'block';
//    	}
    	
    }

    public function hasImprimiu($token)
    {
    	$resultado = $this->db->query("SELECT COUNT(id) as count FROM reservados WHERE usuario_token = '". $token ."'");
    	$row = $resultado->row();
    	return ($row->count > 0)? true : false;
    }

    public function hasImprimiuDia($token,$dia)
    {
    	$resultado = $this->db->query("SELECT COUNT(id) AS count FROM reservados WHERE usuario_token = '". $token ."' AND dia = '". $dia ."'");
    	$row = $resultado->row();

    	return ($row->count > 0)? true : false;
    }

    public function dadosImprimir($id_evento, $token)
    {
        $this->db->select('cpf,nome,dia,coluna,numero,localizacao,nivel,uid');
        $this->db->where('id_evento', $id_evento);
        $this->db->where('token', $token);
        return $this->db->get('view_reservas')->result_array();
    }

}

/* End of file Reservas_model.php */
/* Location: ./application/models/Reservas_model.php */