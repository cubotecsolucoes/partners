<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Partners - Sistema de reservas</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>/assets/css/logar.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
		<div class="box-login">
			<form action="<?php echo(base_url('index.php/login/logar/')); ?>" method="POST" role="form">
				<legend>Partners - Sistema de Reservas</legend>
			
				<div class="form-group">
					<label for="">Usuário</label>
					<input type="text" class="form-control" name="user" placeholder="Usuário">
				</div>

				<div class="form-group">
					<label for="password">Senha</label>
					<input type="password" class="form-control" name="pass" placeholder="*****">
				</div>

				<hr>

				<button type="submit" class="btn btn-primary pull-left">Entrar</button>
				<button type="reset" class="btn btn-warning pull-right">Limpar</button>
			</form>
		</div>

	<!-- JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
	</body>
</html>