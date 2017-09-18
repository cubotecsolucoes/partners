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

  <body style="width: 100%margin: 0px;padding: 0px; background-color: grey;">
  <div class="row">
      <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 text-center" style="background-color: white;vertical-align: middle; position: relative;margin-top: 30px;padding-bottom: 20px ;border-radius: 5px">
          <div class="row">
              <div class="row" id="info" style="display: none">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    </div>
              </div>
              <div class="row">
                  <div class="aviso">
                      <h2 style="font-family: sans-serif;font-variant: small-caps;font-weight: bold;">Insira o código</h2>
                      <input type="text" name="codigo" id="codigo" autofocus>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </body>
<script>
    window.onload = function () {
        var input = $('input');
        var body = $('body');
        var base_url = "<?php echo(base_url()); ?>";

        var info = $('#info');
        var innerinfo = $('#info').children();

        input.focus();
        input.on('keyup', function (event) {
            info.hide();
            innerinfo.html('');
            if (this.value.length == 11)
            {
                $.ajax({
                    url: base_url + 'index.php/controle/liberado/' + this.value,
                    type: 'POST',
                    dataType: 'json'
                })
                    .done(function(data) {
                        if (data.status) {
                            body.css('background-color', 'green');

                            info.show();
                            innerinfo.html('<h3><b><span id="msg">Ingresso Liberado!</span></b></h3>\n' +
                                '<h4>Nome: <b><span id="nome">'+ data.nome +'</span></b></h4>\n' +
                                '<h5>Quantidade: <b><span id="qnt">'+ data.qnt +'</span></b></h5>');
                            input.val('');
                        } else {
                            body.css('background-color', 'red');

                            info.show();
                            innerinfo.html('<h3><b><span id="msg">Ingresso Não Encontrado!</span></b></h3>\n');
                            input.val('');
                        }
                    })
                    .fail(function() {
                        console.log('Error ao consultar o código!')
                    });

                input.focus();

            }
            else
            {
                return true;
            }

        });
    };
</script>
</html>
