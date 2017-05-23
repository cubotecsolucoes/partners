<script src="<?php echo(base_url()); ?>/assets/js/jquery-qrcode-0.14.0.min.js"></script>
<div class="row" style="min-height: 740px;">
    <div class="col-lg-10 col-lg-offset-1 col-md-12 panel-graficos">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Lugares Reservados</h3></div>
            <div class="panel-body">
                <?php if (!$imprimiu): ?>
                <button id="reserva" class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#modal-cadastro"><i class="glyphicon glyphicon-plus"></i> Fazer Reserva</button>
                <hr>
                <div class="table-responsive">
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
                <br>
              <?php endif; ?>
                <button type="button" id="encerrar" class="btn btn-danger btn-block btn-lg">Imprimir Reservas</button>
            </div>
        </div>
    </div>
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
                <button type="submit" id="cadastrar" tabindex="4" class="btn btn-primary btn-lg pull-right">Reservar</button>
            </form>
          </div>
      </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="ingresso" style="display: none;">

</div>
<script type="text/javascript">
  $(document).ready(function(){
    
    DrawIngresso();
    $(document).on('click', '#encerrar', function(event) {
      alertify.set({ labels: {
    ok     : "Imprimir",
    cancel : "Cancelar"
} });
      alertify.confirm('<h2 style="color: red;"><b>Atenção</b></h2><p style="padding: 20px;">Para imprimir <b>efetue todas as reservas</b>, após a impressão, não será mais possível editar os lugares! Deja imprimir?<p>', function(e) {
        if (e) {
          $.post(base_url + 'index.php/controle/imprimir/' + user_token);
          $('#ingresso').show();
          printJS({printable: 'ingresso', type: 'html'});
          $('#ingresso').hide();
        } else {
          console.log('Erro ao imprimir');
        }
      });
    });

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
    var qntReservas;
    var qntReservados;

    $.ajax({
      url: base_url + 'index.php/controle/getQntReservas',
      type: 'POST',
      dataType: 'json'
    })
    .done(function(data) {
      qntReservas = data;
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

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
      qntReservados = data.split('-');
      qntReservados = qntReservados[2]+'-'+qntReservados[1]+'-'+qntReservados[0];

      $.ajax({
        url: base_url + 'index.php/controle/getQntUsuarioReservou',
        type: 'POST',
        dataType: 'json',
        data: {dia: qntReservados,token: user_token},
      })
      .done(function(data) {
        qntReservados = data;
      })
      .fail(function() {
        console.log("Error ao tentar obter quantos lugares o usuario reservou!");
      });
      
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
              if ($('.selecionado').length <= (qntReservas - qntReservados)-1) {
                $(this).addClass('selecionado');
              }
            });
        })
        .fail(function() {
          console.log("error");
        });
      })
      .fail(function() {
        console.log("Error ao tentar obter os lugares ocupados!");
      });
    
    
  });

    var tabela = $('#tabelaReservas').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 5,
        "lengthChange": false
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
          alertify.success("Reserva feita com sucesso!");
          DrawTable();
          DrawIngresso();
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
    });

    function DrawIngresso() {
      $('#ingresso').html('');
      $.getJSON( base_url + 'index.php/controle/diasQueVai/'+ user_token, function(dias, Status) {
            
              if (Status == 'success') {
                $.each(dias, function(index, item) {
                  var ingressounico = '';
                  ingressounico += '<div class="row ingresso'+ index +'"><div class="col-md-12 col-md-offset-0 coluna-reserva"><div class="row"><div class="col-md-8 col-lg-8 col-sm-8 col-xs-8"><h4 class="text-center">Partners Centro de Dança</h4><h5 id="cabecalho" class="text-center">Evento Teste<br>Data: <b class="data">'+ item +'</b></h5></div><div class="col-md-4 col-lg-4 col-sm-4 col-xs-4"><div class="qrcode'+ index +'"></div></div></div><div class="row"><div class="col-lg-10 col-lg-offset-1 col-md-12"><div class="table-responsive"><table id="tabela'+ index +'" class="table"><thead><tr><th>CPF</th><th>Coluna</th><th>Número</th><th>Piso</th><th>Loc.</th></tr></thead><tbody></tbody></table></div></div></div><div class="row"><div class="col-md-12"></div></div></div><p>------------------------------------------------------------------------------------------------------------------------- Corte aqui</p></div>';
                $('#ingresso').append(ingressounico);

                  var tabelaIngresso = $('#tabela'+ index).DataTable({
                    "language": {
                          "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
                      },
                      "searching": false,
                      "ordering": false,
                      "info": false,
                      "paging": false,
                      "pageLength": 50,
                      "lengthChange": false
                  });


                  $.getJSON(base_url + 'index.php/controle/lugaresDoDia/' + item + '/' + user_token, function(lugares, textStatus) {
                      
                      $.each(lugares, function(indice, val) {
                        tabelaIngresso.row.add([
                            val.cpf,
                            val.coluna,
                            val.numero,
                            val.nivel,
                            val.localizacao
                          ]);
                        tabelaIngresso.draw();
                      });
                  });
                  var options = {
                      render: 'image',
                      minVersion: 1,
                      maxVersion: 40,
                      ecLevel: 'L',
                      left: 0,
                      top: 0,
                      size: 100,
                      fill: '#000',
                      background: 'white',
                      text: base_url + 'index.php/controle/valida/' + user_token + '/' + item,
                      radius: 0,
                      quiet: 0,
                      mode: 0,
                      mSize: 0.1,
                      mPosX: 0.5,
                      mPosY: 0.5,
                      label: 'no label',
                      fontname: 'sans',
                      fontcolor: '#000',
                      image: null
                  }
                  $('.qrcode'+index).qrcode(options);
                });

                
                 
              } else {
                console.log('Error ao obter os dias que o usuário irá!');
              }
          });
    }

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
                 alertify.log("Reserva deletada com sucesso!");
                 DrawTable();
                  DrawIngresso();
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
  });
</script>