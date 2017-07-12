<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('image_lib');
	}

	public function addPortfolio($objeto)
	{
		return $this->db->insert('portfolio', $object);
	}

	public function deletePortfolio($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('portfolio');
	}

	public function addCategory($objeto)
	{
		return $this->db->insert('portfolio_category', $object);
	}

	public function deleteCategory($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('portfolio_category');
	}

	public function getAllPortfolioList()
	{
		$this->db->select('*');
		$this->db->from('portfolio');
		return $this->db->get()->result_array();
	}

	public function getPortfolioListByCategory($category_id)
	{
		$this->db->select('*');
		$this->db->from('portfolio');
		$this->db->where('id_category', $category_id);
		return $this->db->get()->result_array();
	}

	public function getAllCategoryList()
	{
		$this->db->select('*');
		$this->db->from('portfolio_category');
		return $this->db->get()->result_array();
	}

	public function getAll()
	{
		$query = $this->db->query("SELECT portfolio.id, portfolio_category.nome as categoria, portfolio.nome,portfolio.ano, portfolio.foto FROM portfolio, portfolio_category WHERE portfolio.id_category = portfolio_category.id");

		return $query->result_array();
	}

	// MANIPULACAO DO ARQUIVO
	public function uploadImg($objeto)
	{
		$this->load->library('upload');
		$config['upload_path'] = base_url().'/assets/images/portfolio/fotos/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

	}

	// MANIPULAÇÃO DA IMAGEM
	public function thumbs($img, $largura, $altura)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = str_replace("-", "/", $img);
		$config['maintain_ratio'] = true;
		$config['dynamic_output'] = true;
		$config['width'] = $largura;
		$config['quality'] = "100%";
		$config['height'] = $altura;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

}

/* End of file Portfolio_model.php */
/* Location: ./application/models/Portfolio_model.php */