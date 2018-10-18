# DEPENDENCIASDEPENDENCIAS
MySQL
PHP 7.2+
Composer
# Tutorial de instalação
baixar o projeto e colocar o mesmo na pasta do seu servidor web
> (htdocs no xampp, www no wamp)

alterar o arquivo hosts do windows (C: » Windows » System32 » Drivers » etc)
adicionar o seguinte:
```c
127.0.0.2       mercadao.api
```


Adicionar um virtual host com a seguinte configuração:
> (arquivo httpd-vhosts.conf, localizado dentro da pasta extra na pasta de configurações do apache
Ex: C:\xampp\apache\conf\extra)


    <VirtualHost 127.0.0.2:80>
        DocumentRoot "C:/xampp/htdocs/mercadao-api/public"
        DirectoryIndex index.php      
        <Directory "C:/xampp/htdocs/mercadao-api/public">
            Options All
            AllowOverride All
            Order Allow,Deny
            Allow from all
        </Directory>
    </VirtualHost>

Reiniciar o servidor apache após essas configurações

criar um banco de dados no mysql

copiar o arquivo .env.example para um arquivo .env
adicionar os dados do banco de dados nas opções:
```c
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```

acessar a pasta do projeto via linha de comando
rodar o comando **php artisan migrate** para que o laravel crie as tabelas necessárias no banco de dados

rodar o comando php artisan passport:install

alterar as seguintes variaveis do .env:
```c
// dominio definido no arquivo de hosts do windows
LOGIN_ENDPOINT=http://mercadao.api/oauth/token

//valor retornado do comando php artisan passport:install (do id 2)
CLIENT_ID=2
CLIENT_SECRET=
```

executar frontend e ser feliz :D
