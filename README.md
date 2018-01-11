# LEIA-ME #

Todas as resoluções foram resolvidas subindo os arquivos em questão para o git.

No entanto está registrado aqui em caso de problemas futuros.

### Possiveis problemas ###
* Mesmo que o .env esteja no git, dê um `php artisan key:generate` sempre que clonar o projeto
* Page not found -> verifique se existe o arquivo .env (por padrão ele sobe pro git)
* Os textos do admin LTE não estão encontrando a tradução. Vá em `resources/lang/vendor/adminlte/` verifique se a pasta está com o nome de `pt-BR`. PS: É case-sensitive.