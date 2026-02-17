# Plataforma Educação Laravel

## Requisitos
- PHP 7.3 ou 7.4
- Composer
- MySQL 5.7+
- Node.js e NPM (opcional para assets)

## Instalação
```bash
composer install
cp .env.example .env
php artisan key:generate
```

## Configuração do Banco
Edite o `.env` com as credenciais do banco:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=plataforma_ensino
DB_USERNAME=root
DB_PASSWORD=root
```

## Rodar Migrations
```bash
php artisan migrate
```

## Rodar Testes
```bash
phpunit
```

## Credenciais Padrão
Não há usuários pré-cadastrados. Crie registros via interface admin ou seeds.

- Login admin: `/admin/login`
- Login aluno: `/aluno/login`
