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

**7.**
```php
//for calculate price product in module "Product.php" in method "getDiscountAttribute"
//replace code on 

//in header file add
//use Auth;

public function getDiscountAttribute(){
    $time_discount_product = $this->checkTimeDiscount($this->discount_from, $this->discount_to);

    $discount = 0;

    $category = $this->categories->first();
    $time_discount_category = false;
    if($category) {
        $time_discount_category = $this->checkTimeDiscount($category->discount_from, $category->discount_to);
    }


    //when user autorize and category have discount
    if(Auth::check()){
        $user = Auth::user()->categories()->where('category_id', $category->id)->first();
        if($user->pivot->discount) {
            $discount = $user->pivot->discount;
        }
    }
    //discount on product
    elseif($time_discount_product && !is_null($this->attributes['discount']) && intval($this->attributes['discount']) > 0){
        $discount = $this->attributes['discount'];
    }
    //discount on category
    elseif($time_discount_category && !is_null($category->discount) && intval($category->discount) > 0 &&  !strpos(URL::current(), 'admin')  ){
        $discount = $category->discount;
        $this->attributes['discount_from'] = $category->discount_from;
        $this->attributes['discount_to'] = $category->discount_to;
    }
    return $discount;
}

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

