$(document).ready(function(){
    $('#grupo').blur(function(){
        var grupo = $('#grupo').val();
        $.ajax({
            url: "PlanoDeContas/ConsultarProximaConta/"+grupo,
            type: "GET",
            beforeSend: function(){
            }
        }).done(function(retorno){
            console.log(retorno);
            if(retorno['proxima-conta'] < 10){
                retorno['proxima-conta'] = '000'+retorno['proxima-conta'];
            } else if(retorno['proxima-conta'] < 100){
                retorno['proxima-conta'] = '00'+retorno['proxima-conta'];
            } else if(retorno['proxima-conta'] < 1000){
                retorno['proxima-conta'] = '0'+retorno['proxima-conta'];
            }
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
            $('#grupo').val('001');
            $('#conta').val('0001');
        });
    });
});