<?php

$nome=$_POST['nome'];

$email=$_POST['email'];

$Titulo=$_POST['assunto'];

$texto=$_POST['texto'];

$Destinatario="porktss@gmail.com";

$mensagem1="
Mensagem recebida do site do Evento!

Nome: $nome

Email: $email

Mensagem: $texto";


mail("$Destinatario","$Titulo", "$mensagem1","From:$email");

?>
