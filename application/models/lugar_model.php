<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lugar_model extends CI_Model {

	private $id;
	private $localizacao;
	private $alinhamento;
	private $fila;
	private $numero;
	private $ocupacao;
	private $id_usuario;

	function __construct()
	{
		parent::__construct();
	}

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of localizacao.
     *
     * @return mixed
     */
    public function getLocalizacao()
    {
        return $this->localizacao;
    }

    /**
     * Sets the value of localizacao.
     *
     * @param mixed $localizacao the localizacao
     *
     * @return self
     */
    public function _setLocalizacao($localizacao)
    {
        $this->localizacao = strtolower($localizacao);

        return $this;
    }

    /**
     * Gets the value of alinhamento.
     *
     * @return mixed
     */
    public function getAlinhamento()
    {
        return $this->alinhamento;
    }

    /**
     * Sets the value of alinhamento.
     *
     * @param mixed $alinhamento the alinhamento
     *
     * @return self
     */
    public function _setAlinhamento($alinhamento)
    {
        $this->alinhamento = strtolower($alinhamento);

        return $this;
    }

    /**
     * Gets the value of fila.
     *
     * @return mixed
     */
    public function getFila()
    {
        return $this->fila;
    }

    /**
     * Sets the value of fila.
     *
     * @param mixed $fila the fila
     *
     * @return self
     */
    public function _setFila($fila)
    {
        $this->fila = $fila;

        return $this;
    }

    /**
     * Gets the value of numero.
     *
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Sets the value of numero.
     *
     * @param mixed $numero the numero
     *
     * @return self
     */
    public function _setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Gets the value of ocupacao.
     *
     * @return mixed
     */
    public function getOcupacao()
    {
        return $this->ocupacao;
    }

    /**
     * Sets the value of ocupacao.
     *
     * @param mixed $ocupacao the ocupacao
     *
     * @return self
     */
    public function _setOcupacao($ocupacao)
    {
        $this->ocupacao = $ocupacao;

        return $this;
    }

    /**
     * Gets the value of ocupacao.
     *
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->id_usuario;
    }

    /**
     * Sets the value of ocupacao.
     *
     * @param mixed $ocupacao the ocupacao
     *
     * @return self
     */
    public function _setIdusuario($id)
    {
        $this->id_usuario = $id;

        return $this;
    }

    // METODOS

    public function edit()
    {
    	$object = [
        'ocupacao' => '1',
        'id_usuario' => $this->getIdusuario()
        ];

        $this->db->where('id', $this->getId());
        $this->db->update('lugares', $object);
    }

    public function getLugareslist()
    {
    	$this->db->select('*');
    	$this->db->where('localizacao', $this->getLocalizacao());
    	$this->db->where('alinhamento', $this->getAlinhamento());
        $this->db->order_by('id', 'desc');

    	return $this->db->get('lugares')->result_array();
    }
}

/* End of file lugar_model.php */
/* Location: ./application/models/lugar_model.php */