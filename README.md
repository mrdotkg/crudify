# crudify
Crudify backend

##deploy

* Clone the project and update the vendor requirements 
```
git clone https://github.com/measdot/crudify.git
composer update
```
##steps

* Create a micro symfony `skeleton` project and add `doctorine`, `maker`, `annotation`  
```
composer create-project symfony/skeleton crudify
composer require doctrine maker annotation
```

* update `.env`
```
DATABASE_URL='mysql://db_user:db_pass@127.0.0.1:3306/db_name'
```
* create database
```
php bin/console doctorine:database:create

```