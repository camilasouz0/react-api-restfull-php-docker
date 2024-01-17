Para execução no 

Suporte para: macOS, Linux, e Windows usando WSL2.

.docker/docker-compose.yml up -d

Crie um banco e adicione as variaveis de ambiente no arquivo .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=