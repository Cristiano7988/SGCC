# Sistema de Gerenciamento para Concessionária de Carros - SGCC

## Clonando o sistema
```sh
git clone https://github.com/Cristiano7988/SGCC.git
```
```sh
cd SGCC
```

## Inicializando o sistema

### Variáveis de ambiente (arquivo .env):
Para criação do banco de dados:
```dosini
    DB_CONNECTION=sqlite
    # DB_DATABASE=laravel
    # DB_USERNAME=root
    # DB_PASSWORD=
```

Para popular com os usuários iniciais:
```dosini
DEV_NAME="Nome do desenvolvedor"
DEV_EMAIL="acesso_do_dev@email.com"
DEV_PASSWORD="senhaDeAcessoDoDev"

CLIENT_NAME="Nome do Cliente"
CLIENT_EMAIL="acesso_do_cliente@email.com"
CLIENT_PASSWORD="senhaDeAcessoDoCliente"
```

PS.: Usaremos os dados do desenvolvedor para notificá-lo caso algum usuário encontre alguma dificuldade com o sistema

## Tabelas
### Criar:
```sh
php artisan migrate
```

### Popular:
```sh
php artisan db:seed
```

## Sistema
### Rodar:
```sh
npm install && npm run dev
```
```sh
php artisan serve
```

### Acessar:
[sistema](http://127.0.0.1:8000/)
[api](http://127.0.0.1:8000/api/carros)