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

###future updates

* **add doctrine orm mapping to yaml config file in config/doctrine**  
Doctrine supports a wide variety of different field types, each with their own options. To see a full list of types and options, see Doctrine's Mapping Types documentation. If you want to use XML instead of annotations, add type: xml and dir: '%kernel.project_dir%/config/doctrine' to the entity mappings in your config/packages/doctrine.yaml file.