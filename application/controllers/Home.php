<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News
 *
 * @author evert
 */
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }


    public function index()
    {
        $data = array('email'=>'porktss@gmail.com');
        
        // $this->load->view('template/index',$data);
        $this->template->load('template/index','inicio/index',$data);
    }    

    public function contato()
    {
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $Titulo=$_POST['assunto'];
        $texto=$_POST['texto'];
        $Destinatario="porktss@gmail.com";
        $mensagem1="
        <h2>Mensagem recebida do site do Evento!</h2>
        
        <h3>Nome: <b>$nome</b></h3>
        <h3>Email: $email</h3>
        
        Mensagem: <p>$texto</p>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: $Destinatario" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

        // ENVIA O EMAIL
        $call = mail("$Destinatario","$Titulo", "$mensagem1",$headers);
        if (!$call) {
            $data=['erro'=>'Não foi possivel enviar a mensagem'];
        } else {
            $data=['sucesso'=>'Mensagem enviada com sucesso!'];
        }

        echo(json_encode($data));
    }
    //put your code here
}
