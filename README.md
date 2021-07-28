## Instalação

Clone o repositório:

```sh
git clone https://github.com/gcairesdev/teste-vaga-alpes-one
```

Navegue à pasta do projeto:

```sh
cd teste-vaga-alpes-one
```

Suba o container do docker:

```sh
docker compose up -d
```

Acesse o bash do container:

```sh
docker exec -it teste-vaga-alpes-one_php-fpm_1 /bin/bash
```

Instale as dependências:

```sh
composer install
```

Gere o APP_KEY do Laravel:

```sh
php artisan key:generate
```

Dê permissão de escrita para pasta storage:

```sh
sudo chmod 777 -R ./storage/
```

Inicie o projeto:

```sh
php artisan serve
```

Abra o link em seu navegador: http://127.0.0.1:8000/
