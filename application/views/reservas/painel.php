<script src="<?php echo(base_url()); ?>/assets/js/jquery-barcode.min.js"></script>
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
    <div class="modal-dialog modal-lg" style="@media (min-width: 992px).modal-lg{width: 950px !important;}">
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
            <button type="button" class="btn btn-warning btn-lg pull-right" tabindex="5" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="cadastrar" tabindex="4" class="btn btn-primary btn-lg pull-right">Reservar</button>
            </form>
          </div>
      </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalSenha">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formSenha" role="form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Alterar senha</h4>
        </div>
        <div class="modal-body">
            <div class="input-group" style="margin-bottom: 10px">
              <span class="input-group-addon">Senha atual</span>
              <input type="password" name="password" autofocus tabindex="1" placeholder="Senha Atual" class="form-control" />
            </div>
            <div class="input-group" style="margin-bottom: 10px">
              <span class="input-group-addon">Nova senha</span>
              <input type="password" name="new_password" autofocus tabindex="2" placeholder="Nova Senha" class="form-control" />
            </div>
            <div class="input-group" style="margin-bottom: 10px">
              <span class="input-group-addon">Repita a nova senha</span>
              <input type="password" name="new_password_confirm" autofocus tabindex="3" placeholder="Repita" class="form-control" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-right" tabindex="5" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success pull-left" tabindex="4">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="ingresso" style="display: none">

</div>
<script type="text/javascript">
  $(document).ready(function(){

    if (localStorage.mudasenha != 'true')
    {
      alertify.confirm('<h2 style="color: red;"><b>Atenção</b></h2><p style="padding: 20px;">Percebemos que essa é sua primeira vez por aqui. Deseja alterar sua senha de login?<p>', function(e) {
        if (e) {
          $('#modalSenha').modal();
        }
        else
        {
          localStorage.setItem('mudasenha', 'true');
        }
      });
    }

    $(document).on('submit', '#formSenha', function(event) {
      event.preventDefault();
      $.post(base_url + 'index.php/controle/updatePass/' + user_token, $(this).serialize(), function(data, textStatus, xhr) {
        if (textStatus == 'success')
        {
          if (data[1] == 1)
          {
            alertify.success('Senha alterada com sucesso!');
            localStorage.setItem('mudasenha', 'true');
            $('#modalSenha').modal('hide');
          }
          else
          {
            alertify.error('Erro ao alterar a senha!');
            $('#modalSenha').modal('hide');
          }
        }
      });
    });
    
    $(document).on('hide.bs.modal', '#modalSenha', function(event) {
      $('#formSenha').trigger('reset');
    });

    DrawIngresso();
    $(document).on('click', '#encerrar', function(event) {
      alertify.set({ labels: {
    ok     : "Imprimir",
    cancel : "Cancelar"
} });
      alertify.confirm('<h2 style="color: red;"><b>Atenção</b></h2><p style="padding: 20px;">Para imprimir <b>efetue todas as reservas</b>, após a impressão, não será mais possível editar os lugares! Deja imprimir?<p>', function(e) {
        if (e) {
          $.post(base_url + 'index.php/controle/imprimir/'+ evento_id +'/'+ user_token);
          $('#ingresso').show();
          printJS({printable: 'ingresso', type: 'html'});
          $('#ingresso').hide();
          location.reload();
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
    var arrayReservas;
    var qntReservas;
    var qntReservados;

    $.ajax({
      url: base_url + 'index.php/controle/getQntReservas/'+ evento_id,
      type: 'POST',
      dataType: 'json'
    })
    .done(function(data) {
        arrayReservas = data;
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

    btnReserva.click(function(event) {
      $.ajax({
        url: base_url + 'index.php/controle/getDiasEvento/'+ evento_id,
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
      qntReservas = arrayReservas[data];
      qntReservados = data.split('-');
      qntReservados = qntReservados[2]+'-'+qntReservados[1]+'-'+qntReservados[0];

      $.ajax({
        url: base_url + 'index.php/controle/getQntUsuarioReservou/'+ evento_id,
        type: 'POST',
        dataType: 'json',
        data: {id_evento: evento_id,dia: qntReservados,token: user_token},
      })
      .done(function(data) {
        qntReservados = data;
      })
      .fail(function() {
        console.log("Error ao tentar obter quantos lugares o usuario reservou!");
      });
      
    });

    btnLoc.click(function(event) {
      alinhamento.hide();
      lug.hide();
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
        url: base_url + 'index.php/controle/lugaresOcupados/'+ evento_id +'/'+ dataCorreta[2]+'-'+dataCorreta[1]+'-'+dataCorreta[0] +'/'+ user_token,
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
          lugares.html("<div class='recado'><h3>Selecione <span id=\"lugQnt\"></span> lugares</h3></div>");
          $('#lugQnt').text(qntReservas - qntReservados);
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
          lugares.append('<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border: 2px solid black;margin-top: 15px;margin-bottom: 15px; text-align: center"><h2>PALCO</h2></div>');
          lugares.append('<hr>');
          lugares.append('<h6><b style="color: red">*</b> Cadeira Indisponivel</h6>');
          lugares.append('<h6><b style="color: green">*</b> Cadeira Disponivel</h6>');
          lugares.append('<h6><b style="color: grey">*</b> Cadeira Selecionada</h6>');

          $('.ok').click(function(event) {
              if ($(this).hasClass('selecionado'))
              {
                  $('#lugQnt').text(qntReservas - $('.selecionado').length +1);
                  $(this).removeClass('selecionado');
              }
              else
              {
                  if ($('.selecionado').length <= (qntReservas - qntReservados)-1) {
                      $('#lugQnt').text(qntReservas - $('.selecionado').length -1);
                      $(this).addClass('selecionado');
                  }
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
        "pageLength": 7,
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
        data: {id_evento: evento_id, lugares: ids, data: data,user_token: user_token},
      })
      .done(function(data) {
        if (data.error == 0) {
          $('#modal-cadastro').modal('hide');
          $('.alert').show('slow');
          alertify.success("Reserva feita com sucesso!");
          DrawTable();
          DrawIngresso();
        }
        else
        {
            alertify.alert('<h2 style="color: red;"><b>Atenção</b></h2><p style="padding: 20px;">Alguns dos lugares selecionados <b>foram reservados primeiro</b>, por favor selecione outros lugares<p>', function() {
                location.reload();
            });
            alertify.error("A Reserva não pode ser concluída!");
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
      $.getJSON( base_url + 'index.php/controle/dadosImprimir/'+ evento_id + '/' + user_token, function (dados, status) {
          if (status == 'success')
          {
              var ingresso = '';
              $.each(dados, function (index, data) {
                  console.log('foi');
                  ingresso = '<div class="row ingresso' + index + '">' +
                      '<div style="margin-left: 40px;" class="coluna-reserva">' +
                      '<div>' +
                      '<div>' +
                      '<h4 class="text-center">Partners Centro de Dança</h4>' +
                      '</div>' +
                      '<div>' +
                      '<div class="qrcode' + index + '"></div>' +
                      '</div>' +
                      '</div>' +
                      '<div class="row">' +
                      '<div >' +
                      '<div >' +
                      '<table id="tabela' + index + '" class="table">' +
                      '<thead>' +
                      '<tr>' +
                      '<th>Data</th>' +
                      '<th>Setor</th>' +
                      '<th>Lugar</th>' +
                      '</tr>' +
                      '</thead>' +
                      '<tbody>' +
                      '<tr>' +
                      '<td>' + data.dia + '</td>' +
                      '<td>' + data.nivel + ' - ' + data.localizacao + '</td>' +
                      '<td>' + data.coluna + ' - ' + data.numero + '</td>' +
                      '</tr>' +
                      '</tbody>' +
                      '</table>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '<div class="row">' +
                      '<div>' +
                      '<h4><b>Nome:</b> ' + data.nome + '</h4>' +
                      '<h4><b>CPF:</b> ' + data.cpf + '</h4>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '<p>------------------------------------------------------------------------------------------------------------------------- Corte aqui</p>' +
                      '</div>';

                  $('#ingresso').append(ingresso);

                  $('.qrcode' + index).barcode(data.uid, "code128", {output: 'bmp', barWidth: 2});
              });
          }
      });
//      $.getJSON( base_url + 'index.php/controle/diasQueVai/'+ evento_id +'/'+ user_token, function(dias, Status) {
//
//              if (Status == 'success') {
//                  var ingresso = '';
//                  $.each(dias, function (index, item) {
//                      console.log(item);
//                      $.getJSON(base_url + 'index.php/controle/lugaresDoDia/' + evento_id + '/' + item + '/' + user_token, function (lugares, textStatus) {
//                          if (textStatus == 'success') {
//                              $.each(lugares, function (key, value) {
//                                  console.log('     ' + value.numero);
//                                  ingresso += '<div class="row ingresso' + index + '">' +
//                                      '<div style="margin-left: 40px;" class="coluna-reserva">' +
//                                      '<div>' +
//                                      '<div>' +
//                                      '<h4 class="text-center">Partners Centro de Dança</h4>' +
//                                      '<h5 id="cabecalho" class="text-center">Evento Teste<br>Data: <b class="data">' + item + '</b></h5>' +
//                                      '</div>' +
//                                      '<div>' +
//                                      '<div class="qrcode' + index + '"></div>' +
//                                      '</div>' +
//                                      '</div>' +
//                                      '<div class="row">' +
//                                      '<div >' +
//                                      '<div >' +
//                                      '<table id="tabela' + index + '" class="table">' +
//                                      '<thead>' +
//                                      '<tr>' +
//                                      '<th>Data</th>' +
//                                      '<th>Setor</th>' +
//                                      '<th>Lugar</th>' +
//                                      '</tr>' +
//                                      '</thead>' +
//                                      '<tbody>' +
//                                      '<tr>' +
//                                      '<td>' + item + '</td>' +
//                                      '<td>' + value.nivel + ' - ' + value.localizacao + '</td>' +
//                                      '<td>' + value.coluna + ' - ' + value.numero + '</td>' +
//                                      '</tr>' +
//                                      '</tbody>' +
//                                      '</table>' +
//                                      '</div>' +
//                                      '</div>' +
//                                      '</div>' +
//                                      '<div class="row">' +
//                                      '<div>' +
//                                      '<h4><b>Nome:</b> ' + value.nome + '</h4>' +
//                                      '<h4><b>CPF:</b> ' + value.cpf + '</h4>' +
//                                      '</div>' +
//                                      '</div>' +
//                                      '</div>' +
//                                      '<p>------------------------------------------------------------------------------------------------------------------------- Corte aqui</p>' +
//                                      '</div>';
//
//                                  $('.qrcode' + index).barcode(value.uid, "code128", {output: 'bmp', barWidth: 2});
//                              });
//                              $('#ingresso').append(ingresso);
//                          } else {
//                              console.log('Error ao obter os dias que o usuário irá!');
//                          }
//                      });
//                  });
//              }
//          });
    }

    function DrawTable() {
      $.ajax({
            url: base_url + 'index.php/controle/getReservaUser/'+ evento_id +'/'+ user_token +'/',
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
