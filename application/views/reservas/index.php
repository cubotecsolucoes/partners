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
			<form class="form-group" action="<?php echo(base_url('index.php/login/logar/')); ?>" method="POST" role="form">
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
                <div id="aviso"></div>
				<button type="submit" class="btn btn-primary pull-left">Entrar</button>
				<button type="reset" class="btn btn-warning pull-right">Limpar</button>
			</form>
<!--            <h3 style="color: red">Sistema bloqueado temporariamente</h3>-->
		</div>

	<!-- JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
	    <script>
            // Opera 8.0+
            var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

            // Firefox 1.0+
            var isFirefox = typeof InstallTrigger !== 'undefined';

            // Safari 3.0+ "[object HTMLElementConstructor]"
            var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));

            // Internet Explorer 6-11
            var isIE = /*@cc_on!@*/false || !!document.documentMode;

            // Edge 20+
            var isEdge = !isIE && !!window.StyleMedia;

            // Chrome 1+
            var isChrome = !!window.chrome && !!window.chrome.webstore;

            // Blink engine detection
            var isBlink = (isChrome || isOpera) && !!window.CSS;

            function get_browser(){
                var ua=navigator.userAgent,tem,M=ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
                if(/trident/i.test(M[1])){
                    tem=/\brv[ :]+(\d+)/g.exec(ua) || [];
                    return {name:'IE',version:(tem[1]||'')};
                }
                if(M[1]==='Chrome'){
                    tem=ua.match(/\bOPR\/(\d+)/)
                    if(tem!=null)   {return {name:'Opera', version:tem[1]};}
                }
                M=M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
                if((tem=ua.match(/version\/(\d+)/i))!=null) {M.splice(1,1,tem[1]);}
                return {
                    name: M[0],
                    version: M[1]
                };
            }

            if (!isBlink || get_browser().name != 'Chrome')
            {
                var msg = 'Detectamos que você está usando o ' + get_browser().name;
                if (isOpera)
                    msg += 'Opera';
                else if (isFirefox)
                    msg += 'Firefox';
                else if (isSafari)
                    msg += 'Safari';
                else if (isIE)
                    msg += 'Internet Explorer';
                else if (isEdge)
                    msg += 'Edge';

                msg += ' Este navegador não tem uma boa compatibilidade com o sistema, recomendamos o uso do Google Chrome';

                $('.box-login').css('height', '460');
                $('#aviso').html('<h2 style="color: red">Atenção</h2><p>'+ msg +'</p>');

            }
        </script>

    </body>
</html>
