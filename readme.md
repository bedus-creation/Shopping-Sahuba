# Install
composer install

# seed database

```
php artisan migrate:fresh --seed
```


# URL to get products API

```
http://localhost:8080/graphql?query={products{id,name,price,images{url}}}

```
# URL to get all products to a categories

```
http://localhost:8080/graphql?query={categories{name,products{id,name,price,images{url}}}}

```

# Get the price details

```
http://localhost:8080/graphql?query={products(id:1){id,name,price,details,images{url}}}

```
