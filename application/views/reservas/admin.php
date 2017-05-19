<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo(base_url()); ?>/assets/css/admin.css">
<div class="row">
    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
        <div class="panel panel-warning panel-graficos">
            <div class="panel-heading">
                <h3 class="panel-title">Eventos </h3></div>
            <div class="panel-body">
                <button class="btn btn-warning btn-modal" type="button" data-toggle="modal" data-target="#modal-eventos">Cadastrar Evento</button>
                <hr>
                <div class="table-responsive">
                    <table id="tabelaeventos" class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data Inicial</th>
                                <th>Data Final</th>
                                <th>Qnt de Reservas</th>
                                <th width="150px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
        <div class="panel panel-danger panel-graficos">
            <div class="panel-heading">
                <h3 class="panel-title">Lugares por dias</h3></div>
            <div class="panel-body">
            	<canvas id="myChart" width="500px" height="150px"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row linha-tabela-lugares">
    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Lugares Reservados</h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-modal" id="btnReserva" type="button" data-toggle="modal" data-target="#modal-lugares">Reservar Lugar</button>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tabelalugares" class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Dia</th>
                                        <th>Usuário</th>
                                        <th>CPF</th>
                                        <th>E-mail</th>
                                        <th>Coluna</th>
                                        <th>Número</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row linha-tabela-usuarios">
    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
        <div class="panel panel-success panel-user">
            <div class="panel-heading">
                <h3 class="panel-title">Usuarios Cadastrados</h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-modal" type="button" data-toggle="modal" data-target="#modal-usuarios">Cadastrar Usuário</button>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tabelausuarios" class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th width="100px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EVENTOS -->
<div class="modal fade" id="modal-eventos">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Cadastrar novo evento</h4>
			</div>
			<form id="formEventos" class="form-horizontal" role="form">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
							<div class="form-group">
								<div class="input-group" style="margin-bottom: 4px">
									<span class="input-group-addon" id="nome_evento">Nome</span>
									<input type="text" name="nome" id="nome" class="form-control" value="" aria-describedby="nome_evento" required="required" placeholder="Nome do Evento" title="Nome do evento">
								</div>
								<div class="input-group" style="margin-bottom: 4px">
									<span class="input-group-addon">Data Inicial</span>
									<input type="date" name="data_inicial" id="data_inicial" class="form-control" required="required" title="Data inicial do evento">
								</div>
								<div class="input-group" style="margin-bottom: 4px">
									<span class="input-group-addon">Data Final</span>
									<input type="date" name="data_final" id="data_final" class="form-control" required="required" title="Data final do evento">
								</div>
								<div class="input-group" style="margin-bottom: 4px">
									<span class="input-group-addon" id="nome_evento">Reservas por dia</span>
									<input type="number" name="reservas_dia" id="reservas_dia" class="form-control" value="1" min="1" max="" step="1" required="required" title="Quantidade de reservas que cada usuario pode ter">
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success pull-left">Cadastrar</button>
					<button type="reset" class="btn btn-warning pull-right" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- MODAL USUARIOS -->
<div class="modal fade" id="modal-usuarios">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Cadastro de Usuários</h4></div>
            <form id="formUsuario">
            	<div class="modal-body">
                	<div class="row">
                    	<div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Nome</span>
	                                    <input type="text" name="nome" placeholder="Nome do usuário" autofocus required minlength="3" maxlength="50" class="form-control" />
	                                </div>
	                                <div class="checkbox">
    	                                <label for="nome">
        	                            <input type="checkbox" id="responsavel" />Requer responsável</label>
            	                    </div>
            	                    <div id="input_responsavel" class="input-group hidden">
	                                    <span class="input-group-addon">Responsável</span>
	                                    <input type="text" name="nome_responsavel" placeholder="Nome do Responsável" minlength="3" maxlength="50" class="form-control" />
	                                </div>
	                                <div class="input-group">
                                    	<span class="input-group-addon">Cpf</span>
                                    	<input type="text" name="cpf" id="cpf" placeholder="CPF do " required class="form-control" />
                                	</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Usuário</span>
                                        <input type="text" name="usuario" placeholder="Usuário" required minlength="3" maxlength="50" class="form-control" />
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">Senha</span>
                                        <input type="text" name="senha" placeholder="Senha" required minlength="3" maxlength="50" class="form-control" />
                                    </div>
                                    <div class="input-group">
                                        <div class="radio">
                                            <label class="radio-inline">
                                                <input type="radio" name="acesso" value="1">Usuário
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="acesso" value="2">Admin
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Celular</span>
	                                    <input type="text" name="celular" id="celular" placeholder="Número do celular" class="form-control" />
                                	</div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Telefone</span>
                                    	<input type="text" name="telefone" id="telefone" placeholder="Telefone de contato" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Email</span>
                                    	<input type="email" name="email" placeholder="Email do usuário" required class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Cep</span>
                                    	<input type="text" name="cep" id="cep" placeholder="Cep do usuário" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Cidade</span>
                                    	<input type="text" name="cidade" id="cidade" placeholder="Cidade do usuário" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Bairro</span>
                                        <input type="text" name="bairro" id="bairro" placeholder="Bairro do usuário" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                    <input type="text" name="estado" id="uf" placeholder="UF" class="form-control" />
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Rua</span>
                                    	<input type="text" name="rua" id="rua" placeholder="Rua do usuário" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Número</span>
                                    	<input type="number" name="numero" id="numero" placeholder="Número" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea name="complemento" id="complemento" placeholder="Complemento" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Data de Nasc.</span>
                                    	<input type="date" class="form-control" name="data_nascimento" required />
                                    </div>
                                </div>
                            </div>
                        
                    	</div>
                	</div>
            	</div>
            	<div class="modal-footer">
            		<button class="btn btn-success pull-left" type="submit">Salvar </button>
                	<button class="btn btn-warning pull-right" type="reset" data-dismiss="modal">Cancelar </button>
            	</div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL LUGARES -->
<div class="modal fade" id="modal-lugares">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
	</div>
</div>


<!-- MODAL VER USUARIO -->
<div class="modal fade" id="modal-usuario">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Detalhes de usuário</h4></div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><img alt="Foto do usuário" src="<?php echo(base_url()); ?>/assets/images/user.png" class="img-circle img-responsive" /><a href="#" class="text-uppercase text-primary">MUDAR</a></div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 modal-usuario">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>NOME </h5>
                            </div>
                            <div class="col-md-6">
                                <h4 id="nome"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>USUÁRIO </h5>
                            </div>
                            <div class="col-md-6">
                                <h4 id="usuario"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>ACESSO </h5>
                            </div>
                            <div class="col-md-6">
                                <h4 id="acesso"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>EMAIL </h5>
                            </div>
                            <div class="col-md-6">
                                <h4 id="email"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>TELEFONE </h5>
                            </div>
                            <div class="col-md-6">
                                <h4 id="telefone"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>CELULAR </h5>
                            </div>
                            <div class="col-md-6">
                                <h4 id="celular"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>CPF </h5>
                            </div>
                            <div class="col-md-6">
                                <h4 id="cpf"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>NASCIMENTO </h5>
                            </div>
                            <div class="col-md-6">
                                <h4 id="nascimento"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>ENDEREÇO</h5>
                            </div>
                            <div class="col-md-12">
                                <h4 id="endereco"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){

	// CADASTRO DE USUARIOS
	var place = $('#cpf').attr('placeholder');
	$('#cpf').attr('placeholder', place + 'usuário');
	$('#cpf').mask('000.000.000-00', {reverse: true});
	$('#celular').mask('(00) 00000-0000');
	$('#telefone').mask('(00) 0000-0000');
	$('#cep').mask('00000-000');

	function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#cidade").val("");
        $("#bairro").val("");
        $("#uf").val("");
        $("#complemento").val("");
   }

	$('#cep').blur(function(event) {
		
		$("#numero").focus();		
		$("#rua").val("...");
        $("#cidade").val("...");
        $("#bairro").val("...");
        $("#uf").val("...");

		$.getJSON("//viacep.com.br/ws/"+ $(this).val().replace('-','') +"/json/?callback=?", function(dados) {
			if (!("erro" in dados)) {
				$("#rua").val(dados.logradouro);
                $("#cidade").val(dados.localidade);
		        $("#bairro").val(dados.bairro);
	    	    $("#uf").val(dados.uf);
				$("#complemento").val(dados.complemento);
			} else {
				limpa_formulário_cep();
			}
		});
	});


	$('#responsavel').click(function(event) {
		$('#input_responsavel').toggleClass('hidden');

		if ($('#cpf').attr('placeholder').indexOf("responsável") == -1) {
			$('#cpf').attr('placeholder', 'CPF do responsável');
		} else {
			$('#cpf').attr('placeholder', 'CPF do usuário');
		}
	});

	$('#formUsuario').submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: base_url + 'index.php/controle/addUsuario/',
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
		})
		.done(function() {
            DrawTableUsuarios();
			$(this).trigger("reset");
            $('#modal-usuarios').modal('hide');
            alertify.success("Usuário adicionado com sucesso!");
		})
		.fail(function() {
			console.log("error ao salvar usuario!");
		})
		
	});


    $(document).on('click', '.acaoquatro', function(event) {
        event.preventDefault();
        $('#modal-usuario').modal();
        $.ajax({
            url: base_url + 'index.php/controle/getUsuario/' + this.getAttribute('data-id'),
            type: 'POST',
            dataType: 'json'
        })
        .done(function(data) {
            $('h4#nome').text(data[0].nome);
            $('h4#usuario').text(data[0].usuario);
            var acesso;
            if (data[0].acesso == 2) {
                acesso = 'Administrador';
            } else {
                acesso = 'Usuário';
            }
            $('h4#acesso').text(acesso);
            $('h4#email').text(data[0].email);
            $('h4#telefone').text(data[0].telefone);
            $('h4#celular').text(data[0].celular);
            $('h4#cpf').text(data[0].cpf);
            var nascimento = data[0].data_nascimento.split('-');
            $('h4#nascimento').text(nascimento[2] + '/' + nascimento[1] + '/' + nascimento[0]);
            $('h4#endereco').text('Rua ' + data[0].rua + ', número ' + data[0].numero + ', ' + data[0].complemento + ', Bairro ' + data[0].bairro + ', ' + data[0].cidade + '-' + data[0].estado + ', ' + data[0].cep);
        })
        .fail(function() {
          console.log("Erro ao tentar pegar as informações do usuário!");
        });                
    });
	// CADASTRO DE EVENTOS
    $('#data_inicial').blur(function(event) {
        $('#data_final').attr('min', $(this).val());
    });

	$('#formEventos').submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: base_url + 'index.php/controle/addEvento/',
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
		})
		.done(function() {
			DrawTableEventos();
			$('#modal-eventos').modal("hide");
			$(this).trigger("reset");
            alertify.success("Evento adicionado com sucesso!");
		})
		.fail(function() {
			console.log("Error ao tentar inserir os dados no banco de dados!");
		})
	});

	// RESERVA DE LUGAR
	var nome = $('#nome');
    var local = $('#local');
    var alinhamento = $('#alinhamento');
    var btnReserva = $('#btnReserva');
    var btnLoc = local.children().children();
    var btnAli = alinhamento.children().children();
    var lug = $('#lug');
    var lugares = $('#lugares');
    var locVal;
    var aliVal;
    var dia;
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
      dia = $(this).text();
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
    var dataCorreta = dia.split('-')
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
          lugares.html("<div class='recado'><h3>Selecione os lugares</h3></div>");
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
              } else {
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

    $(document).on('click', '#cadastrar', function(event) {
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
        data: {lugares: ids, data: dia,user_token: user_token},
        })
        .done(function(data) {
        if (data.error == 0) {
          $('#modal-lugares').modal('hide');
          $('.alert').show('slow');
          alertify.success("Reserva adicionada com sucesso!");
          tabelaLugares.clear().draw();
        }    
        })
        .fail(function() {
        console.log("Error em adicionar os lugares no banco de dados!");
        });
    });

    $('#modal-lugares').on('hidden.bs.modal', function () {
        $('.datas').html("");
        local.hide('fast');
        alinhamento.hide('fast');
        $('#lugares').html("");
    });

	// INSTANCIANDO AS TABELAS

	var tabelaLugares = $('#tabelalugares').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 10,
        "lengthChange": false,
        "processing": true,
        "serverSide": true,
        "ajax": base_url + "assets/datatable.processing.php",
        "aoColumnDefs": [    
        {
        "bSearchable": false,
        "bVisible": true,
        "aTargets": [0] // aqui é a coluna do id como é a primeira é 0
        },  
     {
       "aTargets": [ 7 ], // o numero 6 é o nº da coluna
       "mRender": function ( data, type, full ) { //aqui é uma funçãozinha para pegar os ids
         return '<button id="deletarReserva" data-id=' + full[0] + ' type="button" class="btn btn-danger">Deletar</button>';
       }
     }
   ]
    });

    var tabelaEventos = $('#tabelaeventos').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 10,
        "lengthChange": false
    });

    var tabelaUsuarios = $('#tabelausuarios').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 10,
        "lengthChange": false
    });

    $(document).on('click', '#deletarReserva', function(event) {
        event.preventDefault();
        $.ajax({
            url: base_url + 'index.php/controle/deleteReserva/' + $(this).attr('data-id'),
            type: 'POST',
        })
        .done(function() {
            alertify.log("Reserva deletada com sucesso!");
            tabelaLugares.draw();
        })
        .fail(function() {
            console.log("Erro ao tentar excluir a reserva!");
        });                
    });

    DrawTableEventos();
    DrawTableUsuarios();

    // CARREGAR GRÁFICO

	var dias = [<?php  
	foreach ($dados as $value) {
		echo('"'.$value['dia'].'",');
	}
	?>];
	var reservas = [<?php  
	foreach ($dados as $value) {
		echo($value['count'].',');
	}
	?>];

	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: dias,
        datasets: [{
            label: 'Quantidade de Lugares Reservados',
            data: reservas,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(242, 98, 255, 0.2)',
                'rgba(192, 97, 255, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(97, 110, 255, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(242, 98, 255, 1)',
                'rgba(192, 97, 255, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(97, 110, 255, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
    

	// FUNÇÕES DE "DESENHO" DAS TABELAS

	function DrawTableEventos() {
		$.ajax({
		    url: base_url + 'index.php/controle/getEvento/',
		    type: 'POST',
		    dataType: 'json'
		  })
		  .done(function(data) {
		      tabelaEventos.clear();
		      if (data.length > 0) {
		        $.each(data, function(i, item) {
		        	var button;
		        	if (item.ativo == 1) {
		        		button = "<button type=\"button\" class=\"btn btn-warning text-center pull-left acao\" data-acao=\"desativa\" data-nome=\""+ item.nome +"\" data-ini=\""+ item.data_inicial +"\" data-fin=\""+ item.data_final +"\" data-id=\""+ item.id +"\">Encerrar</button><button type=\"button\" class=\"btn btn-danger text-center pull-right acao\" data-acao=\"excluir\" data-id=\""+ item.id +"\">Excluir</button>";
		        	}
		          tabelaEventos.row.add([
		              item.nome,
		              item.data_inicial,
		              item.data_final,
		              item.reservas,
		              button
		            ]).draw();
		        })
		      } else {
		        tabelaEventos.clear().draw();
		      }
		      $('.acao').click(function(event) {
                var nome = this.getAttribute('data-nome');
                var data_ini = this.getAttribute('data-ini').split('-');
                data_ini = data_ini[2] + '/' + data_ini[1] + '/' + data_ini[0];

                var data_fin = this.getAttribute('data-fin').split('-');
                data_fin = data_fin[2] + '/' + data_fin[1] + '/' + data_fin[0];
                var tabela = '';
                $.ajax({
                    url: base_url + 'index.php/controle/alllugaresOcupados/',
                    type: 'POST',
                    dataType: 'json',
                  })
                  .done(function(lugares_ocupados) {
                    $.ajax({
                      url: base_url + 'index.php/controle/alllugareslist/',
                      type: 'POST',
                      dataType: 'json'
                    })
                    .done(function(data) {
                    tabela += '<h3>Lugares Livres</h3><table class="table table-striped table-bordered"><thead><tr><th>Coluna</th><th>Número</th><th>Localização</th><th>Nível</th></tr></thead><tbody>';
                      $.each(data, function(index, el) {
                        if (!lugares_ocupados.includes(el.id)) {
                            tabela += "<tr><td>"+ el.coluna +"</td><td>"+ el.numero +"</td><td>"+ el.localizacao +"</td><td>"+ el.nivel +"</td></tr>";
                        }

                      });
                      tabela += '</tbody></table>';
                    })
                    .fail(function() {
                      console.log("error ao obter a lista de todos os lugares");
                    });
                  })
                  .fail(function() {
                    console.log("Error ao tentar obter os lugares ocupados!");
                  });

                tabela += '<br><h3>Lugares Reservados</h3><table class="table table-striped table-bordered"><thead><tr><th>Usuário</th><th>CPF</th><th>E-mail</th><th>Dia</th><th>Coluna</th><th>Número</th></tr></thead><tbody>';
                $.getJSON(base_url + 'index.php/controle/getInfoAllReservas/', function(json, textStatus) {
                        $.each(json, function(index, item) {
                            var dia = item.dia.split('-');
                            dia = dia[2] + '/' + dia[1] + '/' + dia[0];
                            tabela += "<tr><td>"+ item.nome +"</td><td>"+ item.cpf +"</td><td>"+ item.email +"</td><td>"+ dia +"</td><td>"+ item.coluna +"</td><td>"+ item.numero +"</td></tr>";
                        });
                    tabela += '</tbody></table>';
                });

                if (this.getAttribute('data-acao') == 'desativa') {
                    var url = base_url + 'index.php/controle/desativarEvento/' + this.getAttribute('data-id')
                    alertify.confirm("Deseja imprimir o log do evento?", function (e) {
                        if (e) {
                            $('body').append("<div id=\"imprimir\"><h1>Evento: "+ nome +"</h1><h2>Data inicial: "+ data_ini +", Data final: "+ data_fin +"</h2>"+ tabela +"</div>");
                            printJS('imprimir', 'html');
                            $('#imprimir').remove();
                        } else {
                            alertify.confirm("TEM CERTEZA QUE NÃO DESEJA IMPRIMIR O LOG DO EVENTO?", function (e) {
                                if (e) {
                                    $('body').append("<div id=\"imprimir\"><h1>Evento: "+ nome +"</h1><h2>Data inicial: "+ data_ini +", Data final: "+ data_fin +"</h2>"+ tabela +"</div>");
                                    printJS('imprimir', 'html');
                                    $('#imprimir').remove();
                                }
                            });
                        }
                    });
                } else {
                    var url = base_url + 'index.php/controle/deleteEvento/' + this.getAttribute('data-id')
                }
		        // $.ajax({
		        //   url: url,
		        //   type: 'POST',
		        // })
		        // .done(function() {
		        //  DrawTableEventos();
		        // })
		        // .fail(function() {
		        //   console.log("Erro ao tentar desativar ou excluir o evento!");
		        // });                
		      });
		  })
		  .fail(function() {
		    console.log('Error ao tentar carregar a lista de eventos!')
		  });
    }

    function DrawTableUsuarios() {
		$.ajax({
		    url: base_url + 'index.php/controle/getUsuariosList/',
		    type: 'POST',
		    dataType: 'json'
		  })
		  .done(function(data) {
		      tabelaUsuarios.clear();
		      if (data.length > 0) {
		        $.each(data, function(i, item) {
		          tabelaUsuarios.row.add([
		              item.nome,
		              item.email,
		              item.telefone,
		              "<button type=\"button\" class=\"btn btn-info text-center pull-left acaoquatro\" data-acao=\"visualizar\" data-id=\""+ item.id +"\">Ver</button><button type=\"button\" class=\"btn btn-danger text-center pull-right acaotres\" data-acao=\"deleta\" data-id=\""+ item.id +"\">Deletar</button>"
		            ]).draw();
		        })
		      } else {
		        tabelaUsuarios.clear().draw();
		      }
		      $('.acaotres').click(function(event) {
		        $.ajax({
		          url: base_url + 'index.php/controle/deleteUsuario/' + this.getAttribute('data-id'),
		          type: 'POST',
		        })
		        .done(function() {
                 alertify.log("Usuário deletado com sucesso!");
		         DrawTableUsuarios();
		        })
		        .fail(function() {
		          console.log("Erro ao tentar excluir a reserva!");
		        });                
		      });
		  })
		  .fail(function() {
		    console.log('Error ao tentar carregar a lista de reservas!')
		  });
    }
});
</script>