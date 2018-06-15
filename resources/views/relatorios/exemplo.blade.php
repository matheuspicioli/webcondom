<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Relatório</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @yield('adminlte_css')

    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
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
					<tfoot>
						<tr>
							<th>Data</th>
							<th>Docto</th>
							<th>Histórico</th>
							<th>Crédito</th>
							<th>Débito</th>
							<th>Saldo</th>
							<th>Compensado</th>
						</tr>
					</tfoot>
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
	</div>
</body>
</html>