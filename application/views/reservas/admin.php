<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div class="row">
    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
        <div class="panel panel-warning panel-graficos">
            <div class="panel-heading">
                <h3 class="panel-title">Eventos </h3></div>
            <div class="panel-body">
                <button class="btn btn-warning btn-modal" type="button">Cadastrar Evento</button>
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
<div class="row linha-tabelas">
    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Lugares Reservados</h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-modal" type="button">Reservar Lugar</button>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tabelalugares" class="table">
                                <thead>
                                    <tr>
                                        <th>Coluna</th>
                                        <th>Número</th>
                                        <th>Usuário</th>
                                        <th width="60px">Ações</th>
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
    <div class="col-lg-5 col-md-5 col-md-offset-0 col-sm-6 col-xs-12">
        <div class="panel panel-success panel-user">
            <div class="panel-heading">
                <h3 class="panel-title">Usuarios Cadastrados</h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-modal" type="button">Cadastrar Usuário</button>
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
                                        <th>Usuário</th>
                                        <th>CPF</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th width="60px">Ações</th>
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

<script type="text/javascript">
$(document).ready(function(){

	var tabelaLugares = $('#tabelalugares').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 5,
        "lengthChange": false
    });

    var tabelaEventos = $('#tabelaeventos').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 5,
        "lengthChange": false
    });

    var tabelaUsuarios = $('#tabelausuarios').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 5,
        "lengthChange": false
    });

    DrawTableEventos();
    DrawTableLugares();
    DrawTableUsuarios();

    var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ["Dia 10-05", "Dia 11-05", "Dia 12-05", "Dia 13-05"],
	        datasets: [{
	            label: 'Quantidade de Lugares Reservados',
	            data: [680, 540, 780, 1000],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
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

	function DrawTableEventos() {
		$.ajax({
		    url: base_url + 'index.php/controle/getEventosList/',
		    type: 'POST',
		    dataType: 'json'
		  })
		  .done(function(data) {
		      tabelaEventos.clear();
		      if (data.length > 0) {
		        $.each(data, function(i, item) {
		        	var button;
		        	if (item.ativo == 1) {
		        		button = "<button type=\"button\" class=\"btn btn-warning text-center acao\" data-acao=\"desativa\" data-id=\""+ item.id +"\">Desativar</button>";
		        	} else {
		        		button = "<button type=\"button\" class=\"btn btn-info text-center acao\" data-acao=\"ativa\" data-id=\""+ item.id +"\">Ativar</button>";
		        	}
		          tabelaEventos.row.add([
		              item.nome,
		              item.data_inicial,
		              item.data_final,
		              item.reservas,
		              button + "<button type=\"button\" class=\"btn btn-danger text-center pull-right acao\" data-acao=\"deleta\" data-id=\""+ item.id +"\">Deletar</button>"
		            ]).draw();
		        })
		      } else {
		        tabelaEventos.clear().draw();
		      }
		      $('.acao').click(function(event) {
		      	var url;
		      	if (this.getAttribute('data-acao') == 'desativa') {
		      		url = base_url + 'index.php/controle/desativarEvento/' + this.getAttribute('data-id');
		      	}
		      	if (this.getAttribute('data-acao') == 'ativa') {
		      		url = base_url + 'index.php/controle/ativarEvento/' + this.getAttribute('data-id');
		      	}
		      	if (this.getAttribute('data-acao') == 'deleta') {
		      		url = base_url + 'index.php/controle/deleteEvento/' + this.getAttribute('data-id');
		      	}
		        $.ajax({
		          url: url,
		          type: 'POST',
		        })
		        .done(function() {
		         DrawTableEventos();
		        })
		        .fail(function() {
		          console.log("Erro ao tentar ativar, desativar ou excluir o evento!");
		        });                
		      });
		  })
		  .fail(function() {
		    console.log('Error ao tentar carregar a lista de eventos!')
		  });
    }

    function DrawTableLugares() {
		$.ajax({
		    url: base_url + 'index.php/controle/getReservaList/',
		    type: 'POST',
		    dataType: 'json'
		  })
		  .done(function(data) {
		      tabelaLugares.clear();
		      if (data.length > 0) {
		        $.each(data, function(i, item) {
		          tabelaLugares.row.add([
		              item.id_reserva,
		              item.id_lugar,
		              item.usuario_token,
		              item.dia,
		              "<button type=\"button\" class=\"btn btn-danger text-center pull-right acaodois\" data-acao=\"deleta\" data-id=\""+ item.id_reserva +"\">Deletar</button>"
		            ]).draw();
		        })
		      } else {
		        tabelaLugares.clear().draw();
		      }
		      $('.acaodois').click(function(event) {
		        $.ajax({
		          url: base_url + 'index.php/controle/deleteReserva/' + this.getAttribute('data-id'),
		          type: 'POST',
		        })
		        .done(function() {
		         DrawTableLugares();
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
		              item.usuario,
		              item.cpf,
		              item.email,
		              item.telefone,
		              "<button type=\"button\" class=\"btn btn-danger text-center pull-right acaotres\" data-acao=\"deleta\" data-id=\""+ item.id +"\">Deletar</button>"
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