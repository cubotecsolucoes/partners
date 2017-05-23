<!DOCTYPE html>
<html lang="pt" style="width: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>/assets/css/admin.css">

    <!-- JS -->
    <script src="<?php echo(base_url()); ?>/assets/js/jquery.js"></script>
    <script src="<?php echo(base_url()); ?>/assets/bootstrap/js/bootstrap.min.js"></script>

    <title>Válida Ingresso</title>
  </head>

  	<?php if (empty($liberado)): ?>
  		<body style="width: 100%margin: 0px;padding: 0px; background-color: red;">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 text-center" style="background-color: white;vertical-align: middle; position: relative;margin-top: 30px;padding-bottom: 20px ;border-radius: 5px">
					<div class="row">
						<div class="aviso">
							<h2 style="font-family: sans-serif;font-variant: small-caps;font-weight: bold;">Error! Código inexistente</h2>
						</div>
					</div>
				</div>
			</div>
		</body>
	<?php  elseif ($liberado == 'block'): ?>
		<body style="width: 100%margin: 0px;padding: 0px; background-color: red;">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 text-center" style="background-color: white;vertical-align: middle; position: relative;margin-top: 30px;height: 80px;border-radius: 5px">
					<div class="row">
						<div class="aviso">
							<h2 style="font-family: sans-serif;font-variant: small-caps;font-weight: bold;">Usuário já entrou!</h2>
						</div>
					</div>
				</div>
			</div>
		</body>
  	<?php  elseif ($liberado > 0): ?>
  		<body style="width: 100%margin: 0px;padding: 0px; background-color: green;">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 text-center" style="background-color: white;vertical-align: middle; position: relative;margin-top: 30px;padding-bottom: 20px ;border-radius: 5px">
					<div class="row">
						<div class="aviso">
							<h2 id="aviso" style="font-family: sans-serif;font-variant: small-caps;font-weight: bold;">Liberado: <?php echo($liberado); ?> Lugares</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 30px">
							<button id="bloquear" type="button" class="btn btn-block btn-lg btn-block btn-danger" style="height: 80px">Bloquear Acesso</button>
						</div>
					</div>
				</div>
			</div>
		</body>
		<script type="text/javascript">
			$(document).ready(function($) {
				var butao = $('#bloquear');

				butao.click(function(event) {
					$.post('<?php echo(base_url()); ?>index.php/controle/bloquear/<?php echo($token); ?>/<?php echo($dia); ?>');
					$(this).hide('fast');
					$('#aviso').text('Código bloqueado!');
				});
			});
		</script>
	<?php else: ?>
		<body style="width: 100%margin: 0px;padding: 0px; background-color: red;">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 text-center" style="background-color: white;vertical-align: middle; position: relative;margin-top: 30px;height: 80px;border-radius: 5px">
					<div class="row">
						<div class="aviso">
							<h2 style="font-family: sans-serif;font-variant: small-caps;font-weight: bold;">Usuário sem Reservas para hoje!</h2>
						</div>
					</div>
				</div>
			</div>
		</body>
	<?php endif; ?>
</html>
