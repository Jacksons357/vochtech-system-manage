# Instrução para Instação

1. Clone o repositório

```bash
git clone https://github.com/Jacksons357/vochtech-system-manage.git

cd vochtech-system-manage
```

2. Instale as dependencias

```bash
composer install
```

3. Copie o arquivo .env.example para .env e gere a key

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

4. Suba os containers

```bash
./vendor/bin/sail up -d
```

Ou configure o alias:

```bash
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

E execute:

```bash
sail up -d
```

5. Rode as migrations

```bash
sail artisan migrate
```

6. Rode os seeders

```bash
sail artisan db:seed
```

7. Instale as dependencias dentro do container

```bash
sail npm install
```

8. Rode a aplicação

```bash
sail npm run dev
```

## Pronto! Aplicação rodando em:
- Laravel -> http://localhost