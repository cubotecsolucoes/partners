<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	private $id;
    private $nome;
	private $usuario;
    private $senha;
    private $nome_responsavel;
    private $cpf;
    private $telefone;
    private $celular;
    private $email;
    private $rua;
    private $numero;
    private $bairro;
    private $complemento;
    private $cep;
    private $cidade;
    private $estado;
	private $data_nascimento;
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

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setNome($nome)
    {
        $nome = strtolower($nome);
        $this->nome = ucwords($nome);

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNomeResponsavel()
    {
        return $this->nome_responsavel;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setNomeResponsavel($nome)
    {
        $this->nome_responsavel = $nome;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setCpf($cpf)
    {
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        $this->cpf = $cpf;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setRua($rua)
    {
        $this->rua = $rua;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setCep($cep)
    {
        $cep = str_replace('-', '', $cep);
        $this->cep = $cep;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

     /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setDataNascimento($data)
    {
        $this->data_nascimento = $data;

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

    public function getUserById($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        
        return $this->db->get('usuarios')->result_array();
    }

    public function getUserByToken($token)
    {
        $this->db->select('*');
        $this->db->where('usuario_token', $token);

        return $this->db->get('usuarios')->result_array();
    }

    public function add() {
    	$object = [
            'nome' => $this->getNome(),
    		'usuario' => $this->getUsuario(),
            'senha' => $this->getSenha(),
            'nome_responsavel' => $this->getNomeResponsavel(),
            'cpf' => $this->getCpf(),
            'telefone' => $this->getTelefone(),
            'celular' => $this->getCelular(),
            'email' => $this->getEmail(),
            'rua' => $this->getRua(),
            'numero' => $this->getNumero(),
            'bairro' => $this->getBairro(),
            'complemento' => $this->getComplemento(),
            'cep' => $this->getCep(),
            'cidade' => $this->getCidade(),
            'estado' => $this->getEstado(),
            'data_nascimento' => $this->getDataNascimento(),
            'usuario_token' => $this->getToken(),
            'acesso' => $this->getAcesso()
    	];
    	$this->db->insert('usuarios', $object);
        return true;
    }

    public function edit() {
        $object = [
            'nome' => $this->getNome(),
            'usuario' => $this->getUsuario(),
            'senha' => $this->getSenha(),
            'nome_responsavel' => $this->getNomeResponsavel(),
            'cpf' => $this->getCpf(),
            'telefone' => $this->getTelefone(),
            'celular' => $this->getCelular(),
            'email' => $this->getEmail(),
            'rua' => $this->getRua(),
            'numero' => $this->getNumero(),
            'bairro' => $this->getBairro(),
            'complemento' => $this->getComplemento(),
            'cep' => $this->getCep(),
            'cidade' => $this->getCidade(),
            'estado' => $this->getEstado(),
            'data_nascimento' => $this->getDataNascimento(),
            'usuario_token' => $this->getToken(),
            'acesso' => $this->getAcesso()
        ];
        $this->db->where('id', $this->getId());
        $this->db->update('usuarios', $object);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('usuarios');
    }

    public function getUserbynome($value)
    {
        $this->db->select('id');
        $this->db->from('usuarios');
        $this->db->like('usuario', $value, 'BOTH');

        return $this->db->get()->result_array();
    }

    public function updatePass($token, $old_pass, $new_pass)
    {
        $this->_setSenha($new_pass);
        $this->db->set('senha',$this->getSenha());
        $this->db->where('usuario_token', $token);
        $this->db->where('senha', $old_pass);
        $this->db->update('usuarios');

        if ($this->db->affected_rows() > 0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}

/* End of file Usuarios_model.php */
/* Location: ./application/models/Usuarios_model.php */
