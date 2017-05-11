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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome do Evento</th>
                                <th>Data de Inicio</th>
                                <th>Data de Termino</th>
                                <th width="60px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                                <td>Cell 2</td>
                                <td><button type="button" class="btn btn-danger">deletar</button></td>
                            </tr>
                            <tr>
                                <td>Cell 3</td>
                                <td>Cell 3</td>
                                <td>Cell 3</td>
                                <td><button type="button" class="btn btn-danger">deletar</button></td>
                            </tr>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Coluna</th>
                                        <th>Número</th>
                                        <th>Usuário</th>
                                        <th width="60px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td><button type="button" class="btn btn-danger">deletar</button></td>
                                    </tr>
                                    <tr>
                                        <td>Cell 3</td>
                                        <td>Cell 4</td>
                                        <td>Cell 4</td>
                                        <td><button type="button" class="btn btn-danger">deletar</button></td>
                                    </tr>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th width="60px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 2</td>
                                        <td><button type="button" class="btn btn-danger">deletar</button></td>
                                    </tr>
                                    <tr>
                                        <td>Cell 3</td>
                                        <td>Cell 3</td>
                                        <td>Cell 3</td>
                                        <td><button type="button" class="btn btn-danger">deletar</button></td>
                                    </tr>
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
	$('.table').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 5,
        "lengthChange": false
    });

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
});
</script>