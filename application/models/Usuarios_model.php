<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	private $id;
	private $usuario;
	private $senha;
    private $usuario_token;
    private $acesso;
	
	public function __construct()
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
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Gets the value of senha.
     *
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Sets the value of senha.
     *
     * @param mixed $senha the senha
     *
     * @return self
     */
    public function _setSenha($senha)
    {
        $this->senha = md5($senha);

        return $this;
    }

    /**
     * Gets the value of senha.
     *
     * @return mixed
     */
    public function getToken()
    {
        return $this->usuario_token;
    }

    /**
     * Sets the value of senha.
     *
     * @param mixed $senha the senha
     *
     * @return self
     */
    public function _setToken($token)
    {
        $data = date("h:i:s");
        $this->usuario_token = md5($token.$data);

        return $this;
    }

    /**
     * Gets the value of acesso.
     *
     * @return mixed
     */
    public function getAcesso()
    {
        return $this->acesso;
    }

    /**
     * Sets the value of acesso.
     *
     * @param mixed $acesso the acesso
     *
     * @return self
     */
    public function _setAcesso($access)
    {
        $this->acesso = $access;

        return $this;
    }

    public function isUser() {
    	$this->db->select('id');
    	$this->db->where('usuario', $this->getUsuario());
    	$this->db->where('senha', $this->getSenha());
    	$this->db->from('usuarios');

    	$result = $this->db->get()->result_array();
    
    	if (!empty($result)) {
    		return true;
    	} else {
    		return false;
    	}
    }

    public function getUserList()
    {
        $this->db->select('*');
        return $this->db->get('usuarios')->result_array();
    }

    public function getUser($usuario, $senha)
    {
        $this->db->select('*');
        $this->db->where('usuario', $this->getUsuario());
        $this->db->where('senha', $this->getSenha());
        
        return $this->db->get('usuarios')->result_array();
    }

    public function add() {
    	$object = [
    		'usuario' => $this->getUsuario(),
    		'senha' => $this->getSenha(),
            'usuario_token' => $this->getToken(),
            'acesso' => '1'
    	];
    	$this->db->insert('usuarios', $object);
    }

    public function delete($id)
    {
        $this->db->where('id_reserva', $id);
        $this->db->delete('usuarios');
    }
}

/* End of file Usuarios_model.php */
/* Location: ./application/models/Usuarios_model.php */