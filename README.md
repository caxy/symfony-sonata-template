# Symfony Sonata Template

## Setup

```bash

git clone git@github.com:caxy/symfony-sonata-template.git PROJECT_NAME
cd PROJECT_NAME
cp .env .env.local
vim .env.local #Set your DB Credentials
composer install
yarn install
bin/console assets:install
bin/console doctrine:database:create
bin/console doctrine:migrations:migrate
bin/console fos:user:create superadmin superadmin@localhost.com 1234 --superadmin

```

## Running

```bash

bin/console server:run
yarn encore dev --watch

```

## Building

```bash

bin/console assets:install
yarn encore production
bin/console cache:clear --env=prod

```
