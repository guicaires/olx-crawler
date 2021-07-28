## Dependências

1 - [Git](https://git-scm.com/)

2 - [Docker](https://docker.com) (Com [compose](https://docs.docker.com/compose/install/))

3 - Linux ou [WSL2](https://docs.microsoft.com/pt-br/windows/wsl/install-win10) (Windows Subsystem for Linux)

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

Crie o .env a partir do .env.example:

```sh
cp .env.example .env
```

Gere o APP_KEY do Laravel:

```sh
php artisan key:generate
```

Dê permissão de escrita para pasta storage:

```sh
chmod 777 -R ./storage/
```

Inicie o projeto:

```sh
php artisan serve
```

Abra o link em seu navegador: http://127.0.0.1:8000/
