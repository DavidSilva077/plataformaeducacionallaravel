# Plataforma Educação Laravel

Projeto em Laravel 5.8 para gestão de alunos, cursos e matrículas.

## Requisitos
- Docker Desktop
- Docker Compose (`docker compose`)

## Subir ambiente com Docker
```bash
docker compose up -d --build
cp .env.docker .env
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

Aplicação disponível em: `http://localhost:8000`

## Rodar testes
```bash
docker compose exec app ./vendor/bin/phpunit
```

Teste específico:
```bash
docker compose exec app ./vendor/bin/phpunit tests/Feature/RelatorioMediaIdadeTest.php
```

## Comandos úteis
Parar ambiente:
```bash
docker compose down
```

Parar e remover volume do banco:
```bash
docker compose down -v
```
