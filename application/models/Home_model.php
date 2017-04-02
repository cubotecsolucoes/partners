<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News_model
 *
 * @author evert
 */
class Home_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }

    public function getEmpresa()
    {
        return $this->db->get('empresa');
    }

}
