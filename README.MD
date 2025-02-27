# Laravel Mhs

A project for test pratice

## Installation

Install my-project with npm

```bash
  composer Install
  npm install
```

migrating database and seeding some data

```bash
  php artisan migrate --seed
```

and finally

```bash
  php artisan serve
  npm run dev
```

## Deployment

To deploy this project please modify .env and docker-compose port if you have another container running

```bash
  docker compose up -d --build
```
