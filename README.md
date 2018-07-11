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
//Add function to Category model
public function users(){
    return $this->belongsToMany(Category::class, 'user_category', 'category_id', 'user_id')->withPivot(['discount']);
}


//Add function to User model
public function categories(){
    return $this->belongsToMany(Category::class, 'user_category', 'user_id', 'category_id')->withPivot(['discount']);
}
```

**5.**
```php
//To work with slides, start the migration

php artisan migrate

```


**6.**
```php

//for show page user discount, in code add next row

{{ route('admin.user_discount.show', ['id_user'] ) }}

```


# For delete module

```php
//delete next row

1.
//in app.php
Softce\UserDiscount\Providers\UserDiscountServiceProvider::class,

2.
//in composer.json
"Softce\\UserDiscount\\": "vendor/softce/user_discount/src"

3.
//in console
composer remove softce/user_discount

4.
// delete -> bootstrap/config/cache.php

5.
//in console
php artisan config:cache

6.
//delete table -> user_category

7.
//delete migration -> 2018_06_11_163706_create_user_category_table

```

