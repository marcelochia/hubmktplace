## HUB

- Iniciar os containers Docker `docker-compose up -d`

- Copiar o arquivo .env.example para .env `cp .env.example .env`

- Entrar no container hub-api `docker exec -it hub-api /bin/bash`

- Instalar as dependências com o Composer `composer install`

- Executar `php artisan key:generate`

- Executar as migrações e seed do Laravel `php artisan migrate --seed`

- Executar o comando para iniciar a fila de trabalhos `php artisan queue:work`

Os logs de execução estão no arquivo `storage/logs/laravel.log`

A aplicação estará rodando em `localhost:8001`

O phpMyAdmin estará rodando em `localhost:8081`

### Endpoint da notificação recebida da platorma

- `POST /platform`

Corpo da requisição:

- `product_ref`: string, obrigatório

- `scope`: string, obrigatório