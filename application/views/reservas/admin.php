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
                    <table id="tabelaeventoativo" class="table">
                        <legend>Evento Ativo</legend>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data Inicial</th>
                                <th>Data Final</th>
                                <th>Qnt de Reservas</th>
                                <th width="200px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="tabelaeventos" class="table">
                        <legend>Eventos Anteriores</legend>
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
                        <button class="btn btn-success btn-modal" id="cadastrarUsuarios" type="button" data-toggle="modal" data-target="#modal-usuarios">Cadastrar Usuário</button>
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
									<input type="text" name="reservas_dia" id="reservas_dia" class="form-control" value="1" min="1" max="" step="1" required="required" title="Quantidade de reservas que cada usuario pode ter">
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
                <h4 class="modal-title">Cadastro de Clientes</h4></div>
            <form id="formUsuario">
            	<div class="modal-body">
                	<div class="row">
                    	<div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="flag" id="inputFlag" class="form-control" value="">
                                	<div class="input-group">
                                		<span class="input-group-addon">Nome</span>
	                                    <input type="text" name="nome" id="nome" placeholder="Nome do usuário" autofocus required minlength="3" maxlength="50" class="form-control" />
	                                </div>
	                                <div class="checkbox">
    	                                <label for="nome">
        	                            <input type="checkbox" tabindex="1" id="responsavel" />Requer responsável</label>
            	                    </div>
            	                    <div id="input_responsavel" class="input-group hidden">
	                                    <span class="input-group-addon">Responsável</span>
	                                    <input type="text" name="nome_responsavel" placeholder="Nome do Responsável" tabindex="2" minlength="3" maxlength="50" class="form-control" />
	                                </div>
	                                <div class="input-group">
                                    	<span class="input-group-addon">Cpf</span>
                                    	<input type="text" name="cpf" id="cpf" tabindex="3" placeholder="CPF do " required class="form-control" />
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
                                    <div id="ContemUsuario" class="input-group">
                                        <span class="input-group-addon">Usuário</span>
                                        <input type="text" name="usuario" id="usuario" placeholder="Usuário" required minlength="3" maxlength="50" class="form-control" />
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">Senha</span>
                                        <input type="text" name="senha" placeholder="Senha" id="senha" required minlength="3" maxlength="50" class="form-control" />
                                    </div>
                                    <div class="input-group">
                                        <div class="radio">
                                            <label class="radio-inline">
                                                <input type="radio" tabindex="4" name="acesso" value="1">Usuário
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
	                                    <input type="text" name="celular" tabindex="5" id="celular" placeholder="Número do celular" class="form-control" />
                                	</div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Telefone</span>
                                    	<input type="text" name="telefone" tabindex="6" id="telefone" placeholder="Telefone de contato" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Email</span>
                                    	<input type="email" name="email" tabindex="7" placeholder="Email do usuário" required class="form-control" />
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
                                    	<input type="text" name="cep" id="cep" tabindex="8" placeholder="Cep do usuário" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Cidade</span>
                                    	<input type="text" name="cidade" id="cidade" tabindex="9" placeholder="Cidade do usuário" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Bairro</span>
                                        <input type="text" name="bairro" id="bairro" tabindex="10" placeholder="Bairro do usuário" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                    <input type="text" name="estado" id="uf" tabindex="11" placeholder="UF" class="form-control" />
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Rua</span>
                                    	<input type="text" name="rua" id="rua" tabindex="12" placeholder="Rua do usuário" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                	<div class="input-group">
                                		<span class="input-group-addon">Número</span>
                                    	<input type="number" name="numero" id="numero" tabindex="13" placeholder="Número" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea name="complemento" id="complemento" tabindex="14" placeholder="Complemento" rows="2" class="form-control"></textarea>
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
                                    	<input type="date" class="form-control" tabindex="15" name="data_nascimento" required />
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
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><img alt="Foto do usuário" src="<?php echo(base_url()); ?>/assets/images/user.png" class="img-circle img-responsive" />
                        <!-- <a href="#" class="text-uppercase text-primary">MUDAR</a> -->
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 modal-usuario">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>MATRICULA </h5>
                            </div>
                            <div class="col-md-6">
                                <h4 id="matricula"></h4>
                            </div>
                        </div>
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
                <button id="editarUsuario" class="btn btn-warning pull-left" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL IMPRIMIR LOG -->
<div class="modal fade" id="modal-log-evento">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Escolha o dia</h4></div>
            <div class="modal-body">
                <div class="row" id="opcoesDias">
                    
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
        var id = $('input[type=hidden][name=flag]').val();
        if ($('#alertaErro').length < 1)
        {
            console.log($('input[type=hidden][name=flag]').val());
            if (id != 0)
            {
                $.ajax({
                    url: base_url + 'index.php/controle/editUsuario/' + id,
                    type: 'POST',
                    dataType: 'json',
                    data: $(this).serialize(),
                })
                .done(function() {
                    DrawTableUsuarios();
                    $('#formUsuario').trigger("reset")
                    $('input[type=hidden][name=flag]').val(0);
                    alertify.success("Usuário editado com sucesso!");
                })
                .fail(function() {
                    console.log("error ao editar usuario!");
                })
            }
            else
            {
                $.ajax({
                    url: base_url + 'index.php/controle/addUsuario/',
                    type: 'POST',
                    dataType: 'json',
                    data: $(this).serialize(),
                })
                .done(function() {
                    DrawTableUsuarios();
                    $('#formUsuario').trigger("reset")
                    alertify.success("Usuário adicionado com sucesso!");
                })
                .fail(function() {
                    console.log("error ao salvar usuario!");
                })
            }
        }		
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
            $('h4#matricula').text("000"+data[0].id);
            $('h4#nome').text(data[0].nome);
            $('h4#usuario').text(data[0].usuario);
            var acesso;
            if (data[0].acesso == 2) 
            {
                acesso = 'Administrador';
            } 
            else 
            {
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

    $(document).on('click', '#editarUsuario', function(event) {

        var id = parseInt($('h4#matricula').text());
        $.getJSON(base_url + 'index.php/controle/getUsuario/' + id, function(json, textStatus) {
            if (textStatus == 'success') 
            {
                $('input[type=text][name=nome]').val(json[0].nome);
                if (json[0].nome_responsavel != "") {
                    $('#responsavel').trigger('click');
                }
                $('input[type=text][name=cpf]').val(json[0].cpf);
                $('input[type=text][name=usuario]').val(json[0].usuario);

                if (json[0].acesso == 1) 
                {
                    $("input[name=acesso][value='1']").prop("checked",true);
                }
                else
                {
                    $("input[name=acesso][value='2']").prop("checked",true);
                }
                $('input[type=hidden][name=flag]').val(id);
                $('input[type=text][name=celular]').val(json[0].celular);
                $('input[type=text][name=telefone]').val(json[0].telefone);
                $('input[type=email][name=email]').val(json[0].email);
                $('input[type=text][name=cep]').val(json[0].cep);
                $('input[type=text][name=cidade]').val(json[0].cidade);
                $('input[type=text][name=bairro]').val(json[0].bairro);
                $('input[type=text][name=estado]').val(json[0].estado);
                $('input[type=text][name=rua]').val(json[0].rua);
                $('input[type=number][name=numero]').val(json[0].numero);
                $('textarea[name=complemento]').val(json[0].complemento);
                $('input[type=date][name=data_nascimento]').val(json[0].data_nascimento);

                $('#cadastrarUsuarios').trigger('click');
            }
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
			DrawTableEventoAtivo();
			$('#modal-eventos').modal("hide");
			$(this).trigger("reset");
            alertify.success("Evento adicionado com sucesso!");
            location.reload();
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
    var classe;
    var lugares_ocupados = [];
    var tabelaLugares;

    btnReserva.click(function(event) {
      $.ajax({
        url: base_url + 'index.php/controle/getDiasEvento/' + evento_id,
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

    $(document).on('keyup', '#usuario', function(event) {
        event.preventDefault();
        if ($(this).val().length > 0)
        {
            $.post(base_url + 'index.php/controle/getUserbyname/' + $(this).val(), function(data, textStatus, xhr) {
                if (textStatus == 'success')
                {
                    if (data.length > 2)
                    {
                        if ($('#alertaErro').length < 1)
                        {
                            $('#ContemUsuario').after('<div class="alert alert-danger" id="alertaErro" role="alert">Este usuário já existe</div>');
                            $('#ContemUsuario').addClass('has-error');
                        }
                    }
                    else
                    {
                        if ($('#alertaErro').length >  0)
                        {
                            $('#alertaErro').remove();
                            $('#ContemUsuario').removeClass('has-error');
                        }
                    }
                }
                else
                {
                    if ($('#alertaErro').length >  0)
                        {
                            $('#alertaErro').remove();
                            $('#ContemUsuario').removeClass('has-error');
                        }
                    console.log('Error ao obter usuário com esse nome!');
                }
            });
        }
        else
        {
            if ($('#alertaErro').length >  0)
            {
                $('#alertaErro').remove();
                $('#ContemNome').removeClass('has-error');
            }
        }
    });

    $(document).on('keyup', '#nome', function(event) {
        if ($(this).val().length > 0)
        {
            var palavras = $(this).val().split(" ");
            if (palavras.length > 0)
            {
                $('#usuario').val(palavras[0].toLowerCase());
                $('#usuario').trigger('keyup');
            }
        }
        else
        {
            $('#usuario').val("");
        }
    });

    $(document).blur('#nome', function(event) {
        /* Act on the event */
        
    });

    $(document).on('keyup', '#cpf', function(event) {

        if ($(this).val().length > 0)
        {
            var caracteres = $(this).val().replace('-','');
            caracteres = caracteres.replace('.','');
            $('#senha').val(caracteres.toString().replace('.',''));
        }
        else
        {
            $('#senha').val("");
        }
    });

    $(document).on('click', '.data', function(event) {
      event.preventDefault();
      dia = $(this).text();
      local.show('slow');
    });

    btnLoc.click(function(event) {
      alinhamento.hide();
      lug.hide();
      locVal = $(this).attr('data-valor');
      $(this).css('backgroundColor', '#b11f0e');
      alinhamento.show("slow");
    });

    btnAli.click(function(event) {
    /* Act on the event */
    aliVal = $(this).attr('data-valor');
    var dataCorreta = dia.split('-')
    $.ajax({
        url: base_url + 'index.php/controle/lugaresOcupados/'+ evento_id +'/'+ dataCorreta[2]+'-'+dataCorreta[1]+'-'+dataCorreta[0] + '/' + user_token,
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
          lugares.append('<h1 class="palco" style="padding: 50px;border: 1px solid grey;text-align: center;">PALCO</h1>');
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
        data: {id_evento: evento_id,lugares: ids, data: dia,user_token: user_token},
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

    $('#modal-log-evento').on('hidden.bs.modal', function () {
        $('#opcoesDias').html("");
    });

	// INSTANCIANDO AS TABELAS
    $.getJSON(base_url + 'index.php/controle/getEvento/', function(json, textStatus) {
        if (textStatus == 'success')
        {
            if (json.length == 0) {
                json[0] = {id:'0'};
            }
            tabelaLugares = $('#tabelalugares').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
                },
                "pageLength": 10,
                "lengthChange": false,
                "processing": true,
                "serverSide": true,
                "ajax": base_url + "assets/datatable.processing.php?idevento="+ json[0].id,
                "aoColumnDefs": [    
                    {
                       "bSearchable": false,
                        "bVisible": true,
                        "aTargets": [0] // aqui é a coluna do id como é a primeira é 0
                    },  
                    {
                       "aTargets": [7], // o numero 6 é o nº da coluna
                       "mRender": function ( data, type, full ) { //aqui é uma funçãozinha para pegar os ids
                         return '<button id="deletarReserva" title="Deletar" data-id=' + full[0] + ' type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>';
                        }
                    }
                ]
            });            
        }
        else
        {
            console.log("Erro ao obter evento ativo");
        }
    });

    var tabelaEventos = $('#tabelaeventos').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 10,
        "lengthChange": false
    });

    var tabelaEventoAtivo = $('#tabelaeventoativo').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 10,
        "lengthChange": false,
        "paging": false,
        "info": false,
        "searching": false
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

    DrawTableEventoAtivo();
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

    function DrawTableEventoAtivo() {
        $.getJSON(base_url + 'index.php/controle/getEvento/', function(json, textStatus) {
            if (textStatus == 'success') {
                if (json.length > 0) {
                    tabelaEventoAtivo.clear().draw();
                    var button = "<button type=\"button\" class=\"btn btn-info text-center pull-left evento\" data-acao=\"imprimelog\" data-id=\""+ json[0].id +"\" data-inicial=\""+ json[0].data_inicial +"\" data-final=\""+ json[0].data_final +"\">Log</button><button type=\"button\" class=\"btn btn-warning text-center evento\" style=\"margin-left: 5px;\" data-acao=\"desativar\" data-id=\""+ json[0].id +"\">Desativar</button><button type=\"button\" class=\"btn btn-danger text-center pull-right ativo\" data-acao=\"excluir\" data-id=\""+ json[0].id +"\">Excluir</button>";
                    tabelaEventoAtivo.row.add([
                            json[0].nome,
                            json[0].data_inicial,
                            json[0].data_final,
                            json[0].reservas,
                            button
                    ]).draw();
                }
                else
                {
                    tabelaEventoAtivo.clear().draw();
                }
            } 
            else 
            {
                console.log('Erro ao obter o evento ativo!');
            }
        });
    }

	function DrawTableEventos() {
		$.ajax({
		    url: base_url + 'index.php/controle/getEventoDesativados/',
		    type: 'POST',
		    dataType: 'json'
		  })
		  .done(function(data) {
		      tabelaEventos.clear();
		      if (data.length > 0) {
		        $.each(data, function(i, item) {
		        	var button = "<button type=\"button\" class=\"btn btn-info text-center pull-left evento\" data-acao=\"imprimelog\" data-eventonome=\""+ item.nome +"\" data-inicial=\""+ item.data_inicial +"\" data-final=\""+ item.data_final +"\" data-id=\""+ item.id +"\">Log</button><button type=\"button\" class=\"btn btn-danger text-center pull-right evento\" data-acao=\"excluir\" data-id=\""+ item.id +"\">Excluir</button>";
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
		  })
		  .fail(function() {
		    console.log('Error ao tentar carregar a lista de eventos!')
		  });
    }

    $(document).on('click', '.evento', function(event)
    {
        event.preventDefault();
        var acao = this.getAttribute('data-acao');
        var id = this.getAttribute('data-id');

        if (acao == 'excluir')
        {
            $.post(base_url + 'index.php/controle/deleteEvento/' + id, function(data, textStatus, xhr) {
                alertify.log('Evento deletado com sucesso!');
                DrawTableEventoAtivo();
                DrawTableEventos();
                return true;
            });
        }
        else if (acao == 'desativar')
        {
            $.post(base_url + 'index.php/controle/desativarEvento/' + id, function(data, textStatus, xhr) {
                alertify.log('Evento desativado com sucesso!');
                DrawTableEventoAtivo();
                DrawTableEventos();
                return true;
            });
        }
        else if (acao == 'imprimelog')
        {
            var data_id = this.getAttribute('data-id');
            var data_nome = this.getAttribute('data-eventonome');

            var tabela = '';

            $.getJSON(base_url + 'index.php/controle/getDiasEvento/' + data_id, function(json, textStatus) {
                if (textStatus == 'success') {
                    var size = json.length;
                    size = 12/size;
                    $.each(json, function(index, item) {
                        var dia = item.split('-');
                        dia = dia[0] + '/' + dia[1] + '/' + dia[2];
                        $('#opcoesDias').append("<div class=\"col-lg-"+ size +" col-md-"+ size +" col-xs-"+ size +"\"><button type=\"button\" class=\"btn btn-lg btn-block btn-danger text-center imprimir\" data-eventonome=\""+ data_nome +"\" data-dia=\""+ item +"\" data-id=\""+ data_id +"\">"+ dia +"</button></div>");
                    });
                } else {
                    console.log('Error ao obter os dias do evento!');
                }
            });

            $('#modal-log-evento').modal();
            
        }
    });

    $(document).on('click', '.imprimir', function(event) {
        event.preventDefault();

        var data_id = this.getAttribute('data-id');
        var data_nome = this.getAttribute('data-eventonome');

        var dia_selecionado = this.getAttribute('data-dia').split('-');
        dia_selecionado = dia_selecionado[2] + '-' + dia_selecionado[1] + '-' + dia_selecionado[0];
        var tabela = '';
        $.ajax({
                url: base_url + 'index.php/controle/lugaresOcupados/'+ data_id + '/' + dia_selecionado + '/' + user_token,
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
                tabela += '<h3>Lugares Livres</h3><h2>Lugares livres: '+ (data.length-lugares_ocupados.length) +'</h2><table class="table table-striped table-bordered"><thead><tr><th>Coluna</th><th>Número</th><th>Localização</th><th>Nível</th></tr></thead><tbody>';
                $.each(data, function(index, el) {
                    if (!lugares_ocupados.includes(el.id)) {
                        tabela += "<tr><td>"+ el.coluna +"</td><td>"+ el.numero +"</td><td>"+ el.localizacao +"</td><td>"+ el.nivel +"</td></tr>";
                    }
                });

                tabela += '</tbody></table>';
                tabela += '<br><h3>Lugares Reservados</h3><table class="table table-striped table-bordered"><thead><tr><th>Usuário</th><th>CPF</th><th>E-mail</th><th>Dia</th><th>Coluna</th><th>Número</th></tr></thead><tbody>';
        
                $.getJSON(base_url + 'index.php/controle/getInfoReservas/'+ evento_id +'/'+ dia_selecionado, function(json, textStatus) {
                    $.each(json, function(index, item) {
                        tabela += "<tr><td>"+ item.nome +"</td><td>"+ item.cpf +"</td><td>"+ item.email +"</td><td>"+ item.dia +"</td><td>"+ item.coluna +"</td><td>"+ item.numero +"</td></tr>";
                    });
                    tabela += '</tbody></table>';
                    $('body').append("<div id=\"imprimir\"><h1>Evento: "+ data_nome +"</h1><h2>Dia: "+ dia_selecionado +"</h2>"+ tabela +"</div>");
                    printJS('imprimir', 'html');
                    $('#imprimir').remove();

                });
            })
            .fail(function() {
                console.log("error ao obter a lista de todos os lugares");
            });
        })
        .fail(function() {
            console.log("Error ao tentar obter os lugares ocupados!");
        });
    });

    $('#modal-log-evento').on('hidden.bs.modal', function () {
        $('.opcoesDias').html("");
    });

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
                    if (item.usuario_token == user_token) {
                        var button = "<button type=\"button\" title=\"Visualizar\" class=\"btn btn-info text-center pull-left acaoquatro\" data-acao=\"visualizar\" data-id=\""+ item.id +"\"><span class=\"glyphicon glyphicon-zoom-in\"></span></button";
                    }
                    else 
                    {
                        var button = "<button type=\"button\" title=\"Visualizar\" class=\"btn btn-info text-center pull-left acaoquatro\" data-acao=\"visualizar\" data-id=\""+ item.id +"\"><span class=\"glyphicon glyphicon-zoom-in\"></span></button><button type=\"button\" title=\"Deletar\" class=\"btn btn-danger text-center pull-right acaotres\" data-acao=\"deleta\" data-id=\""+ item.id +"\"><span class=\"glyphicon glyphicon-remove\"></span></button>";
                    }
		          tabelaUsuarios.row.add([
		              item.nome,
		              item.email,
		              item.telefone,
		              button
		            ]).draw();
		        })
		      } else {
		        tabelaUsuarios.clear().draw();
		      }
		  })
		  .fail(function() {
		    console.log('Error ao tentar carregar a lista de Usuário!')
		  });
    }

    $(document).on('click','.acaotres', function () {
        alertify.set({ labels:
            {
                ok     : "Excluir",
                cancel : "Cancelar"
            }
        });
        alertify.confirm('<h2 style="color: red;"><b>Atenção</b></h2><p style="padding: 20px;"><b>Tem certeza que deseja excluir o usuário?</b><p>', function(e)
        {
            if (e)
            {
                $.ajax({
                    url: base_url + 'index.php/controle/deleteUsuario/' + this.getAttribute('data-id'),
                    type: 'POST'
                })
                    .done(function() {
                        alertify.log("Usuário deletado com sucesso!");
                        DrawTableUsuarios();
                    })
                    .fail(function() {
                        console.log("Erro ao tentar excluir o Usuário!");
                    });
            }
        });
    });
});
</script>