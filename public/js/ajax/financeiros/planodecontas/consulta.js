$(document).ready(function () {
    // var tipo  = $('#tipo').val();
    // $.ajax({
    //     url: "http://localhost:8000/Financeiros/PlanoDeContas/ConsultarProximoGrupo/"+tipo,
    //     type: "GET"
    // }).done(function(retorno){
    //     $('#grupo').val(retorno);
    // }).fail(function(xhr, status, retorno){
    //     console.log("Erro ao consultar próximo grupo (ready). "+retorno);
    // });
    // $('#tipo').change(function(){
    //     var tipo  = $('#tipo').val();
    //     $.ajax({
    //         url: "http://localhost:8000/Financeiros/PlanoDeContas/ConsultarProximoGrupo/"+tipo,
    //         type: "GET"
    //     }).done(function(retorno){
    //         if(retorno)
    //             $('#grupo').val(retorno);
    //         else
    //             $('#grupo').val('001');
    //         //var tipo  = $('#tipo').val();
    //         //var grupo = $('#grupo').val();
    //         // $.ajax({
    //         //     url: "http://localhost:8000/Financeiros/PlanoDeContas/ConsultarProximaConta/"+tipo+'/'+grupo,
    //         //     type: "GET"
    //         // }).done(function(retorno){
    //         //     $('#conta').val(retorno);
    //         //     if($('#conta').val() == ''){
    //         //         $('#conta').val('0001');
    //         //     }
    //         // }).fail(function(xhr, status, retorno){
    //         //     console.log("Erro ao consultar próxima conta (change). "+retorno);
    //         //     //$('#conta').val(retorno['proxima-conta']);
    //         //     // if(!retorno['sucesso']){
    //         //     //     $('#modal-erro').modal('show');
    //         //     //     $('#mensagem-erro').text(retorno['mensagem']);
    //         //     //     $('#botao-fechar-modal-erro').focus();
    //         //     // }
    //         // });
    //     }).fail(function(xhr, status, retorno){
    //         $('#grupo').attr('disabled', false);
    //     });
    // });

    // $('#grupo').blur(function () {
    //     if ($('#grupo').val() == '') {
    //         tipo = $('#tipo').val();
    //         console.log(tipo);
    //         $.ajax({
    //             url: "http://webcondom.dev/Financeiros/PlanoDeContas/ConsultarProximoGrupo/" + tipo,
    //             type: "GET"
    //         }).done(function (retorno) {
    //             $('#grupo').val(retorno);
    //         }).fail(function (xhr, status, retorno) {
    //             console.log("Erro ao consultar próximo grupo (blur grupo). " + retorno);
    //         });
    //     }
    // });
});