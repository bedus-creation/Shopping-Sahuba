[![IMAGE ALT TEXT HERE](https://img.youtube.com/vi/YOUTUBE_VIDEO_ID_HERE/0.jpg)](https://www.youtube.com/watch?v=BKUUyKLsW5U)

# &copy All rights reserved.

Any redistribution or reproduction of part or all of the contents in any form is prohibited other than the following:

you may download to a local hard disk extracts for your personal and non-commercial use only.

# Installation and setUp

```
composer install
```


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
