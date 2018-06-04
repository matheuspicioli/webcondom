$(document).ready(function () {
	$('.select2').select2();
	$('#tipo').focus();
	if ($("select[id=tipo]").val() == 'CNPJ') {
		$(".cnpj").show();
		$(".cpf").hide();
		$('#cpf_cnpj').mask('99.999.999/9999-99');
	} else {
		$(".cnpj").hide();
		$(".cpf").show();
		$('#cpf_cnpj').mask('999.999.999-99');
	}

	$("select[id=tipo]").on('change', function () {
		if ($("select[id=tipo]").val() == 'CNPJ') {
			$(".cnpj").show();
			$(".cpf").hide();
			$('#cpf_cnpj').mask('99.999.999/9999-99');
		} else {
			$(".cnpj").hide();
			$(".cpf").show();
			$('#cpf_cnpj').mask('999.999.999-99');
		}
	});
});
$('#salvar').on('click', function(e){
	e.preventDefault();
	$('#celular_1').unmask();
	$('#celular_2').unmask();
	$('#telefone_principal').unmask();
	$('#telefone_comercial').unmask();
	$('#CEP').unmask();
	$('#cpf_cnpj').unmask();
	$('#form').submit();
});