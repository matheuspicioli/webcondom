$(document).ready(function(){
    $('#tipo').blur(function(){
        var tipo = $('#tipo').val();
        $.ajax({
            //ALTERAR CONFORME SUA URL
            url: "http://localhost:8000/Financeiros/PlanoDeContas/ConsultarProximoGrupo/"+tipo,
            type: "GET",
            beforeSend: function(){
            }
        }).done(function(retorno){
            console.log(retorno);
        });
    });
    $('#grupo').blur(function(){
        var grupo = $('#grupo').val();
        $.ajax({
            //ALTERAR CONFORME SUA URL
            url: "http://localhost:8000/Financeiros/PlanoDeContas/ConsultarProximaConta/"+grupo,
            type: "GET",
            beforeSend: function(){
            }
        }).done(function(retorno){
            console.log(retorno);
            $('#conta').val(retorno['proxima-conta']);

            if(!retorno['sucesso']){
                $('#modal-erro').modal('show');
                $('#mensagem-erro').text(retorno['mensagem']);
                $('#botao-fechar-modal-erro').focus();
            }
        }).fail(function(xhr, status, retorno){
            if(!retorno['sucesso']){
                $('#modal-erro').modal('show');
                $('#mensagem-erro').text('Erro ao consultar o serviço, não cadastre nenhuma conta.');
                $('#botao-fechar-modal-erro').focus();
            }
        });
    });
});