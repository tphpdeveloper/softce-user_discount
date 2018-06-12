# Work with module user discount

**1.**
```php
//write to composer.json
"require": {
    ...
    "softce/user_discount" : "dev-master"
}

"autoload": {
    ... ,

    "psr-4": {
        ... ,

        "Softce\\UserDiscount\\" : "vendor/softce/user_discount/src"
    }
}
```


**2.**
```php
//in console write

composer update softce/user_discount
```


**3.**
```php
//in service provider config/app

'providers' => [
    ... ,
    Softce\UserDiscount\Providers\UserDiscountServiceProvider::class,
]


// in console 
php artisan config:cache
```

**4.**
```php
//To work with slides, start the migration

php artisan migrate

```


**5.**
```php

//for show page slider, in code add next row

{{ route('admin.user_discount.edit', ['id_user'] ) }}

```


# For delete module

```php
//delete next row

1.
//in app.php
Softce\UserDiscount\Providers\UserDiscountServiceProvider::class,

2.
//in composer.json
"Softce\\UserDiscount\\": "vendor/softce/type-of-product/src"

3.
//in console
composer remove softce/type-of-product

4.
// delete -> bootstrap/config/cache.php

5.
//in console
php artisan config:cache

6.
//delete table -> types and product_types

7.
//delete migration -> 2018_05_02_144153_create_types_table 
//and 2018_05_02_150806_create_product_type_table

8.
//delete row in admin_menus table -> where name 'Типы товаров'
```

