<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Lugares</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>/assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>/assets/css/logar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>/assets/css/admin.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

    <!-- JS -->
    <script src="<?php echo(base_url()); ?>/assets/js/jquery.js"></script>
    <script src="<?php echo(base_url()); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo(base_url()); ?>/assets/js/painel.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        var base_url = "<?php echo(base_url()); ?>";
        var user_token = "<?php echo($_SESSION['user']['usuario_token']); ?>";
    </script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand" href="<?php echo(base_url()); ?>">Partners</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation">
                        <a href="<?php echo(base_url('index.php/login/logout')) ?>"> <i class="glyphicon glyphicon-log-out"></i> Sair </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <?php echo($contents); ?>
    </div>
    <div class="rodape">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="list-unstyled">
                <a class="socialmedia" href="https://www.facebook.com/Partners-Centro-De-Dan%C3%A7a-315548875126309/" target="_blank"><li><i class="fa fa-facebook-square"></i> Facebook</li></a>
                <a class="socialmedia" href="https://www.instagram.com/partners_danca/" target="_blank"><li><i class="fa fa-instagram"></i> Instagram</li></a>
                <a class="socialmedia" href="<?php echo(base_url()); ?>" target="_blank"><li><i class="fa fa-plus-circle"></i> Sobre nós</li></a>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-12">
            <h3><strong>Partners</strong> Centro de Dança</h3><small>Av. Pedro Paes Azevedo, 135 - Salgado Filho, Aracaju - SE, 49020-450</small></div>
    </div>
</body>
</html>