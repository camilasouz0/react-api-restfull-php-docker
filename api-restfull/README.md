Para execução do ambiente de desenvolvimento front-end:
```bash
# Faça o clone do projeto
  git clone https://github.com/camilasouz0/react-php-api-restful-docker.git
```

```bash
# Entre na pasta
cd api-restfull
```

```bash
# Copie o arquivo .env example localizado na pasta src
cp .env.example .env
```

```bash
Crie um banco e adicione as variaveis de ambiente no arquivo .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# Subir container 
cd src

docker compose -f docker-compose.yml up
```

_não obrigatório_:

```bash
# Build em desenvolvimento ignorando cache
docker compose -f docker-compose.yml build --no-cache
```

```bash
# Build em desenvolvimento com output de logs
docker compose -f docker-compose.yml build --progress=plain
```

```bash
# Se você fizer alterações no arquivo .env restart o serviço
docker-compose restart mysql
```

```bash
# Execute o comando
sudo chown www-data:www-data -R src/storage
```


Acesse [http://localhost](http://localhost) em seu navegador.



