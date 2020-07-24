# My portfolio

## Description

Created for the checkpoint 4 of my Web Developer Full Stack training. This is the theme two which consisted in making a portfolio.

Largely inspired by [Jacek Jeznach](https://jacekjeznach.com/)

## Author

 - Guillaume Erpeldinger

## Install

1. Clone the repo from Github.

2. Run
    - `composer install`
    - `yarn install`
    - `yarn encore dev`
    
3. Create *.env.local* from *.env* file and add your DB parameters. Don't delete the *.env* file, it must be kept.

```dotenv
DATABASE_URL=mysql://username:password@127.0.0.1:3306/db_name
```

4. Create Database with
    - `php bin/console doctrine:database:create`
    - `php bin/console doctrine:migrations:migrate`
    - `php bin/console doctrine:fixtures:load`
    
5. Run the internal PHP web server with
 - `php -S localhost:8000 -t public/`
 - or `symfony server:start`

## Links

[Wild Code School](https://www.wildcodeschool.com)
