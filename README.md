# Projeto

Este é um projeto construído com Laravel 10, Composer 2.5 e Docker.

este projeto foi desenvolvido seguindo algumas boas práticas da Arquitetura Limpa (Clean Architecture), Código Limpo (Clean Code) e DDD;

## Pré-requisitos

Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina.

- Docker: [Instalação do Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Instalação do Docker Compose](https://docs.docker.com/compose/install/)
- Ferramenta de versionamento: [Instalação do Git](https://git-scm.com/)

## Como executar

1. Clone o repositório:

```bash
git clone git@github.com:mactavishkkk/systock-challenge-api.git
```

2. Navegue até o diretório dos arquivos de construção:

```bash
cd systock-challenge-api
```

3. Você precisará do arquivo `.env` em seu diretório raiz, basta renomear o `.env.example` para o mesmo ou criar um novo:

4. Você precisará também baixar os submodulos do projeto, no terminal entre:
```bash
git submodule update --init
```

5. Entre no diretório `laradock` e crie outro arquivo: `laradock/.env` a partir do arquivo `laradock/.env.example`

6. Agora construa as imagens para os ambientes com docker, no terminal use:

```bash
docker compose up -d nginx postgres
```

7. Com todos os containers de pé, vamos rechear nosso banco de dados, primeiro, procure pelo container com o nome de `workspace` (exemplo: laradock-workspace-1):

- Acesse o terminal dentro dele com:
```bash
docker exec -it laradock-workspace-1 /bin/sh
```

- Instale os pacotes necessários com:
```bash
composer install
```

- Crie as tabelas a partir das migrations:
```bash
php artisan migrate
```

- E por fim, semei as seeds por elas com:
```bash
php artisan db:seed
```

agora baixa sair usando `exit`

8. Pronto, agora você já poderá acessar a rota de boas vindas em seu navegador:

```bash
http://localhost:80/
```

## Documentação da API

A documentação da API pode ser encontrada em `https://documenter.getpostman.com/view/21973752/2sA3XY7J6G`, onde você pode encontrar informações sobre os endpoints disponíveis, parâmetros de solicitação, respostas e exemplos de uso.