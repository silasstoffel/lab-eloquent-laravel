## Laboratório de Estudo: ORM Laravel

Projeto com objetivo de estudos da ORM Eloquent do Laravel. Os conteúdos abordados são:

- Mapeamento de Modelo com suas relações (1 para 1, 1 para n).
- Execução de comandos de `insert, update, select e delete`.
- Migrations.
- Seeders.
- Principais comandos do artisan.

## Considerações técnicas

1. Banco de dados utilizado é o sqlite.
2. Faça uma cópia o database/database.sqlite.example e renomeie para atabase/database.sqlite
3. Rodar migrations `php artisan migrate`
4. Rodar seeders `php artisan db:seed`
5. Levantar o servidor com artisan, `php artisan serve` e acessar http://localhost:8000 para ver dados
6. Todos o processo de criação, atualização e exclusão estão sendo feito com seeder

Necessário ajustar o arquivo `.env` para mudar a conexão para sqlite:

```
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD=
```


Caso queira apagar os dados gerados via seeder, execute o comando `php artisan db:seed --class=ClearDataSeeder`
