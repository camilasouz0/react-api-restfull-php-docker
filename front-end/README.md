Para execução do ambiente de desenvolvimento front-end:
```bash
# Faça o clone do projeto
  git clone https://github.com/camilasouz0/react-php-api-restful-docker.git
```

```bash
# Entre na pasta
cd front-end
```

```bash
# Copie o arquivo .env example
cp .env.example .env
```

```bash
# Cria uma rede que possibilita a comunicação entre os containers usando o nome do container como hostname
docker network create react_network

# Subir container
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

Acesse [http://localhost:3000](http://localhost:3000) em seu navegador.