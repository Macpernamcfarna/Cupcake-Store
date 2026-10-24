# Cupcake Store

PHP and MySQL cupcake ordering app.

## Configuration

Copy `.env.example` to `.env` and set the database values for your local MySQL instance:

```ini
DB_HOST=localhost
DB_USER=root
DB_PASS=""
DB_NAME=cake-orders
```

The database named by `DB_NAME` must already exist. The `.env` file is local-only and is excluded from Git; commit changes to `.env.example` if the required configuration keys change.

## Run locally with XAMPP

Place the project under `htdocs`, start Apache and MySQL from the XAMPP Control Panel, create the configured database in phpMyAdmin, then open:

`http://localhost/cupcake-store/public/`