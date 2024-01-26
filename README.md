# Config
[![Build Status](https://travis-ci.org/azeemhassni/Config.svg)](https://travis-ci.org/azeemhassni/Config) [![Latest Stable Version](https://poser.pugx.org/azi/config/v/stable)](https://packagist.org/packages/azi/config) [![Total Downloads](https://poser.pugx.org/azi/config/downloads)](https://packagist.org/packages/azi/config) [![Latest Unstable Version](https://poser.pugx.org/azi/config/v/unstable)](https://packagist.org/packages/azi/config) [![License](https://poser.pugx.org/azi/config/license)](https://packagist.org/packages/azi/config)

---
Easy Configuration Management Library

If you are writing a WordPress theme or a PHP application, most likely you will have some configuration values. The conventional approach involves creating a file with a bunch of variables and constants, then including every file in your script, which may not be the most intuitive way. Inspired by Laravel's elegant configuration handling, I developed Config to provide a similar experience for PHP projects, especially in the context of WordPress themes.

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
