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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <script type="text/javascript">
      var base_url = "<?php echo(base_url()); ?>";
      var user_token = "<?php echo("qweasdzxc"); //echo($this->session->userdata('user_token');) ?>";
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo(base_url()); ?>">Partners</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo(base_url('index.php/login/logout')) ?>">Sair</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="conteudo">
    <div class="alerta">
      <div class="alert alert-success" style="display: none;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sucesso!</strong> Os lugares foram reservados com sucesso.</div>
    </div>
      <h1>Lugares Reservados</h1>
      <hr>
      <button type="button" id="reserva" class="btn btn-info btn-lg" style="margin-bottom: 15px;" data-toggle="modal" data-target="#modal-cadastro"><i class="fa fa-plus"></i> Fazer Reserva</button>
      <hr>
      <table id="tabelaReservas" class="table table-striped table-responsive table-hover">
        <thead>
          <tr>
            <th>Data</th>
            <th>Fila</th>
            <th>Número</th>
            <th>Nível</th>
            <th>Lugar</th>
            <th width="60px">Excluir</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <!-- Modal de cadastro -->
<div class="modal" id="modal-cadastro">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reservar Lugar</h4>
            </div>
          <div class="modal-body" style="padding: ">
            <form action="" id="reserva" method="POST" role="form">
              <div class="form-group">
                <div class="alert alerta" id="alertas" style="display: none;"></div>
                <div class="datas"></div>
                <div class="row" id="local" style="margin-top: 15px; display: none;">
                  <div class="col-lg-6">
                    <button type="button" tabindex="2" data-valor="mezanino" class="btn btn-danger btn-block btn-lg">Mezanino</button>
                  </div>
                  <div class="col-lg-6">
                    <button type="button" tabindex="3" data-valor="plateia" class="btn btn-danger btn-block btn-lg">Plateia</button>
                  </div>
                </div>
                <div class="row" id="alinhamento" style="margin-top: 15px; display: none;">
                  <div class="col-lg-4">
                    <button type="button" data-valor="esquerda" class="btn btn-danger btn-block btn-lg">Esquerda</button>
                  </div>
                  <div class="col-lg-4">
                    <button type="button" data-valor="centro" class="btn btn-danger btn-block btn-lg">Centro</button>
                  </div>
                  <div class="col-lg-4">
                    <button type="button" data-valor="direita" class="btn btn-danger btn-block btn-lg">Direita</button>
                  </div>
                </div>
                <div id="lug" style="margin-top: 15px; display: none;">
                  <hr>
                  <div class="row">
                    <div class="col-lg-12" id="lugares">
                      
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning btn-lg pull-left" tabindex="5" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="cadastrar" tabindex="4" class="btn disabled btn-primary btn-lg pull-right">Reservar</button>
            </form>
          </div>
      </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
  <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 

  <!-- DataTable -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

  <!-- Custom -->
    <script type="text/javascript" src="<?php echo(base_url()); ?>/assets/js/painel.js"></script>
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    var nome = $('#nome');
    var local = $('#local');
    var alinhamento = $('#alinhamento');
    var btnReserva = $('#reserva');
    var btnLoc = local.children().children();
    var btnAli = alinhamento.children().children();
    var lug = $('#lug');
    var lugares = $('#lugares');
    var locVal;
    var aliVal;
    var data;
    var check
    var classe;
    var lugares_ocupados = [];

    btnReserva.click(function(event) {
      $.ajax({
        url: base_url + 'index.php/controle/getDiasEvento',
        type: 'POST',
        dataType: 'json',
      })
      .done(function(data) {
        var string = "";
        $('.datas').html("");
        $.each(data, function(index, val) {
           string += "<div class=\"data\"><button type=\"button\" tabindex=\""+ index +"\" data-valor=\""+ val +"\" class=\"btn btn-danger btn-lg\">"+ val +"</button></div>";
        });
        string += "<hr>";
        $('.datas').append(string);
      })
      .fail(function() {
        console.log("Error ao tentar recuperar as datas do evento!");
      })
      
    });

    $(document).on('click', '.data', function(event) {
      event.preventDefault();
      data = $(this).text();
      local.show('slow');
    });

    btnLoc.click(function(event) {
      /* Act on the event */
      locVal = $(this).attr('data-valor');
      $(this).css('backgroundColor', '#b11f0e');
      alinhamento.show("slow");
    });

    btnAli.click(function(event) {
    /* Act on the event */
    aliVal = $(this).attr('data-valor');
    var dataCorreta = data.split('-')
    $.ajax({
        url: base_url + 'index.php/controle/lugaresOcupados/'+ dataCorreta[2]+'-'+dataCorreta[1]+'-'+dataCorreta[0],
        type: 'POST',
        dataType: 'json',
      })
      .done(function(lugares_ocupados) {
        $(this).css('backgroundColor', '#b11f0e');
        lug.show('slow');
        $.ajax({
          url: base_url + 'index.php/controle/lugareslist/',
          type: 'POST',
          dataType: 'json',
          data: {localizacao: aliVal,piso: locVal},
        })
        .done(function(data) {
          lugares.html("<div class='recado'><h3>Selecione três lugares</h3></div>");
          var adiciona = '<div class="fila">';
          var colum = data[0];
          $.each(data, function(index, el) {
            if (lugares_ocupados.includes(el.id)) {
              classe = 'notok';
            } else {
              classe = 'ok';
            }
            if (el.coluna != colum.coluna) {
              adiciona += '</div><div class="fila">';
              colum.coluna = el.coluna;
            }
            adiciona +='<div class="cadeira '+ classe +'" data-id="'+ el.id +'"><img class="img-responsive" src="<?php echo(base_url("assets/images/icones/cadeira.svg")); ?>"><div class="descricao">'+ el.coluna +' - '+ el.numero +'</div></div>';

          });
          adiciona += '</div>';
          
          lugares.append(adiciona);
          lugares.append('<hr>')
          lugares.append('<h6><b style="color: red">*</b> Cadeira Indisponivel</h6>');
          lugares.append('<h6><b style="color: green">*</b> Cadeira Disponivel</h6>');
          lugares.append('<h6><b style="color: grey">*</b> Cadeira Selecionada</h6>');

          $('.ok').click(function(event) {
              /* Act on the event */
              if ($(this).hasClass('selecionado')) {
                $(this).removeClass('selecionado');
                if ($('.selecionado').length < 3) {
                    $('#cadastrar').addClass('disabled');
                }
              } else {
                if ($('.selecionado').length <= 2) {
                  $(this).addClass('selecionado');
                }

                if ($('.selecionado').length == 3) {
                    $('#cadastrar').removeClass('disabled');
                }
              }
            });
        })
        .fail(function() {
          console.log("error");
        })
        .always(function(data) {
          

        });
      })
      .fail(function() {
        console.log("Error ao tentar obter os lugares ocupados!");
      });
    
    
  });

    var tabela = $('#tabelaReservas').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        }
    });
    
    DrawTable();

    $('#cadastrar').click(function(event) {
      event.preventDefault();
      var ids = [];
      var dados = $('.selecionado');
      $.each(dados, function(index, el) {
        ids.push(el.getAttribute("data-id"));
      });

      $.ajax({
        url: base_url + 'index.php/controle/addReserva',
        type: 'POST',
        dataType: 'json',
        data: {lugares: ids, data: data,user_token: user_token},
      })
      .done(function(data) {
        if (data.error == 0) {
          $('#modal-cadastro').modal('hide');
          $('.alert').show('slow');
          DrawTable();
        }    
      })
      .fail(function() {
        console.log("Error em adicionar os lugares no banco de dados!");
      });
    });

    $('#modal-cadastro').on('hidden.bs.modal', function () {
        $('.datas').html("");
        local.hide('fast');
        alinhamento.hide('fast');
        $('#lugares').html("");
        $('#cadastrar').addClass('disabled');
    });

    function DrawTable() {
      $.ajax({
            url: base_url + 'index.php/controle/getReservaUser/'+ user_token +'/',
            type: 'POST',
            dataType: 'json'
          })
          .done(function(data) {
              tabela.clear();
              if (data.length > 0) {
                $.each(data, function(i, item) {
                  tabela.row.add([
                      item.dia,
                      item.coluna,
                      item.numero,
                      item.nivel,
                      item.localizacao,
                      "<button type=\"button\" class=\"btn btn-danger text-center delete\" data-id=\""+ item.id_reserva +"\">Excluir</button>"
                    ]).draw();
                })
              } else {
                tabela.clear().draw();
              }
              $('.delete').click(function(event) {
                $.ajax({
                  url: base_url + 'index.php/controle/deleteReserva/' + this.getAttribute('data-id'),
                  type: 'POST',
                })
                .done(function() {
                 DrawTable();
                })
                .fail(function() {
                  console.log("Erro ao tentar deletar esse item!");
                });                
              });
          })
          .fail(function() {
            console.log('Error ao tentar carregar a lista de reserva!')
          });
    }

    function LugaresOcupados() {
      
    }
  });
</script>