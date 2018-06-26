<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
	<style type="text/css">
		thead:before, thead:after { display: none; }
		tbody:before, tbody:after { display: none; }
		.table {
			overflow: hidden;
		}
	</style>
</head>
<body>
<div class="flex-center position-ref full-height">
	<div class="container">
		<table class="table table-bordered table-striped" style="margin-top: 30px">
			<thead>
			<tr>
				<th>Data</th>
				<th>Docto</th>
				<th>Histórico</th>
				<th>Crédito</th>
				<th>Débito</th>
				<th>Saldo</th>
				<th>Compensado</th>
			</tr>
			</thead>
			<tbody>
			@php $saldo = 0 @endphp
			<tr>
			@foreach($lancamentos as $lancamento)
				@if($lancamento->compensado == 'Sim')
					@if($lancamento->tipo == 'Debito')
						@php $saldo -= $lancamento->valor @endphp
					@else
						@php $saldo += $lancamento->valor @endphp
					@endif
				@endif
				<tr>
					<td>{{ $lancamento->data_lancamento->format('d/m/Y') }}</td>
					<td>{{ $lancamento->documento }}</td>
					<td>{{ $lancamento->historico }}</td>
					<td>{{ $lancamento->tipo == 'Credito' ? $lancamento->valor_view : null }}</td>
					<td>{{ $lancamento->tipo == 'Debito' ? $lancamento->valor_view : null }}</td>
					<td>{{ number_format($saldo,2,',','.') }}</td>
					<td>{{ $lancamento->compensado }}</td>
				</tr>
				@endforeach
				</tr>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>