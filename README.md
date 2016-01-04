# Config
[![Build Status](https://travis-ci.org/azeemhassni/Config.svg)](https://travis-ci.org/azeemhassni/Config) [![Latest Stable Version](https://poser.pugx.org/azi/config/v/stable)](https://packagist.org/packages/azi/config) [![Total Downloads](https://poser.pugx.org/azi/config/downloads)](https://packagist.org/packages/azi/config) [![Latest Unstable Version](https://poser.pugx.org/azi/config/v/unstable)](https://packagist.org/packages/azi/config) [![License](https://poser.pugx.org/azi/config/license)](https://packagist.org/packages/azi/config)

---
Easy Configuration Management Library

if your are writing a WordPress theme or a php application obviously you will have some configuration values.
you will create a file with bunch of variable and constants and include every file in your script which is not an
intuitive way as I feel. I like the way laravel handles configuration values. but we can't use laravel in our
WordPress themes that's why I wrote **Config**

---

# Installation
to install config in your project you just need to run this command
```bash
$ composer require azi/config
```

# Up & Running
after installing config you will need to create a directory named `config` in root of your project 
where your `composer.json` lives
in this directory you can store your configuration files. i.e `database.php` or `site.php`
lets say you want to store your database configuration values here. you will have to follow the following steps.
 - create a file called `database.php`
 - return your configuration values form that file like
 
 ```php
   return [
      'mysql' => [
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => 'secrete'
      ]
    ];
  ```
  - access the values from anywhere in your application like
  ```php
     // will return 127.0.0.1
  $host = Azi\Config::get('database.mysql.host');
  
  // OR
  $db = Azi\Config::get('database.mysql');
  $host = $db->get('host');
  $username = $db->get('username');
  $password = $db->get('password');
  
  ```

  with this package you will also get a little helper function to access values you can also write the above code
  like this

  ```php
    // will return 127.0.0.1
    $host = config('database.mysql.host');
  ```
  
  
  # Contributers
*  [@azeemhassni](https://github.com/azeemhassni)
* [@Golpha](https://github.com/Golpha)
