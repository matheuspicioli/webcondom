$(document).ready(function(){
    /* ao pressionar uma tecla em um campo que seja de class="pula" */
    $('.pula').keypress(function(e){
        /*
         * verifica se o evento é Keycode (para IE e outros browsers)
         * se não for pega o evento Which (Firefox)
        */
        var tecla = (e.keyCode ? e.keyCode : e.which);

        /* verifica se a tecla pressionada foi o ENTER */
        if(tecla == 13){
            /* guarda o seletor do campo que foi pressionado Enter */
            campo =  $('.pula');
            /* pega o indice do elemento*/
            indice = campo.index(this);
            /*soma mais um ao indice e verifica se não é null
             *se não for é porque existe outro elemento
            */
            if(campo[indice+1] != null){
                /* adiciona mais 1 no valor do indice */
                proximo = campo[indice + 1];
                /* passa o foco para o proximo elemento */
                proximo.focus();
            }
        }
        /* impede o sumbit caso esteja dentro de um form */
        e.preventDefault(e);
        return false;
    })
});