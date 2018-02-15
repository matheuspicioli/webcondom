$(document).ready(function(){
    $.ajax({
        url: "PlanoDeContas/ConsultarProximoCodigo",
        type: "GET",
        beforeSend: function(){
        }
    }).done(function(retorno){
        console.log(retorno);
        if(retorno['proximo-grupo'] < 10){
            retorno['proximo-grupo'] = '00'+retorno['proximo-grupo'];
        } else if(retorno['proximo-grupo'] < 100){
            retorno['proximo-grupo'] = '0'+retorno['proximo-grupo'];
        }

        if(retorno['proxima-conta'] < 10){
            retorno['proxima-conta'] = '000'+retorno['proxima-conta'];
        } else if(retorno['proxima-conta'] < 100){
            retorno['proxima-conta'] = '00'+retorno['proxima-conta'];
        } else if(retorno['proxima-conta'] < 1000){
            retorno['proxima-conta'] = '0'+retorno['proxima-conta'];
        }
        $('#grupo').val(retorno['proximo-grupo']);
        $('#conta').val(retorno['proxima-conta']);
    }).fail(function(xhr, status, retorno){
        $('#grupo').val('001');
        $('#conta').val('0001');
    });
    $('#grupo').blur(function(){

    })
});