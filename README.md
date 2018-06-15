# LEIA-ME #

Todas as resoluções foram resolvidas subindo os arquivos em questão para o git.

No entanto está registrado aqui em caso de problemas futuros.

### Possiveis problemas ###
* Mesmo que o .env esteja no git, dê um `php artisan key:generate` sempre que clonar o projeto
* Page not found -> verifique se existe o arquivo .env (por padrão ele sobe pro git)
* Os textos do admin LTE não estão encontrando a tradução. Vá em `resources/lang/vendor/adminlte/` verifique se a pasta está com o nome de `pt-BR`. PS: É case-sensitive.

### Problema select2 ###
* Instalar o bower na máquina (globalmente)
* Rodar o comando `bower install select2-tab-fix`
* Rodar o comando `npm run dev`
* Colocar a tag `<script src="{{ asset('js/select2-tab-fix/select2-tab-fix.min.js') }}"></script>`
* Adicionar a tag HTML `tabindex="número_sequenciador_dos_inputs"`, exemplo `tabindex="1"`,
segundo input: `tabindex="2"`, e assim por diante.


### Problema ao carregar a data em um input date ###

Adicionar na model do dado, um array de configurações do laravel `protected $dates = [ "campo_data_banco_dados" ];` 
Feito isso, temos uma instância do Carbon nessa propriedade (`http://carbon.nesbot.com/docs/`)
com isso, podemos chamar `$objeto->propriedade->format('Y-m-d)`, padrão dos EUA, pois o navegador
irá interpretar isso, e reconhecer nosso padrão. Temos que reforçar esse formato, pois o laravel
tenta jogar para o nosso padrão também.

### PROBLEMA COM CARREGAMENTO APÓS O UPLOAD ###

Rodar o comando `php artisan storage:link`. Após voltarmos o HTML puro,
esqueci de adicionar o enctype no formulário que faz o upload.