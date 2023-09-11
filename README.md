This plugin adds the AdminLTE framework to CakePHP (for versions above 4.4) with a special look that I like. However, use CakeDC/Users for user management. Its installation and commissioning can be read below:

**1. Install cakephp:**

```
# composer create-project --prefer-dist cakephp/app:~4.0 teszt.loc
# cd teszt.loc
```

**- Setup database in: /config/app_local.php:**
```
	...
    'Datasources' => [
        'default' => [
            'host' => 'localhost',
            'username' => 'username',
            'password' => 'secret',
            'database' => 'test',
    ...
```

**- Add locale to /config/app_local.php if you want:**
```
    ...
    'App' => [
        'defaultLocale' => env('APP_DEFAULT_LOCALE', 'hu_HU'),
    ],
    
    'Migrations' => [
        'unsigned_primary_keys' => true,
        'column_null_default' => true,
    ],
    ...
```


**2. Install CakeDc / Users:**

```
# composer require cakedc/users
```


**3. Add to (and edit) in /src/Application.php file:**
```
        if (Configure::read('debug')) {
            Configure::write('DebugKit.forceEnable', true);
            $this->addPlugin('DebugKit');
        }

        // Load more plugins here
        // $this->addPlugin('JeffAdmin');
        $this->addPlugin(\CakeDC\Users\Plugin::class);
        // Configure::write('Users.config', ['users']);
```

**4. Create CakeDC/Users tables:**
```
# cake migrations migrate -p CakeDC/Users
```

**5. Install JeffAdmin:**
```
# composer require zsfoto/jeffadmin
```

**6.a. Change route in /config/routes.php file.**
Change this:
```
$builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
```
to:
```
$builder->connect('/', ['controller' => 'Blogs', 'action' => 'index']);
```

**6.b. Add prefixes to /config/routes.php file:**
```
    $routes->prefix('Admin', function (RouteBuilder $builder) {
        $builder->scope('/', function (RouteBuilder $builder) {
            //$builder->setExtensions(['json', 'xml', 'xlsx']);
            $builder->connect('/', ['controller' => 'Blogs', 'action' => 'index']);
            $builder->fallbacks(DashedRoute::class);
        });
    });

    $routes->prefix('Api', function (RouteBuilder $builder) {
        $builder->scope('/', function (RouteBuilder $builder) {
            $builder->setExtensions(['json', 'xml', 'xlsx']);
            $builder->connect('/', ['controller' => 'Blogs', 'action' => 'index']);            
            $builder->fallbacks(DashedRoute::class);
        });
    });
```


**7. Add lines to end of the /config/bootstrap.php file:**
```
try {
    Configure::load('jeffadmin', 'default');
} catch (\Exception $e) {
    exit($e->getMessage() . "\n");
}
Configure::write('Bake.theme', 'JeffAdmin');
```

**8. Remove chars "//" from lines start in /src/Application.php file:**
```
        if (Configure::read('debug')) {
            Configure::write('DebugKit.forceEnable', true);
            $this->addPlugin('DebugKit');
        }

        // Load more plugins here
        //$this->addPlugin('JeffAdmin');
        $this->addPlugin(\CakeDC\Users\Plugin::class);
        //Configure::write('Users.config', ['users']);
```
After when removed "//":
```
        if (Configure::read('debug')) {
            Configure::write('DebugKit.forceEnable', true);
            $this->addPlugin('DebugKit');
        }

        // Load more plugins here
        $this->addPlugin('JeffAdmin');
        $this->addPlugin(\CakeDC\Users\Plugin::class);
        Configure::write('Users.config', ['users']);
```

**9. Copy config and src dir to app root (from /vendor/zsfoto/jeffadmin/templates/toCopyToRoot/ to /) Overwrite! :**
```
# cp /vendor/zsfoto/jeffadmin/templates/toCopyToRoot/config /(app root)
# cp /vendor/zsfoto/jeffadmin/templates/toCopyToRoot/src /(app root)
```

**10. Modify MySQL users table in SQL editor (phpmyadmin or MySQL Workbench):**
```
ALTER TABLE `users` CHANGE `username` `username` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL; 
```

**11. Try to bake and "Enjoy it":**
Create **blogs table** and create model, admin controller and template
```
# cake migrations migrate -p JeffAdmin	// Create

# cake bake model blogs
# cake bake controller blogs
# cake bake template blogs
```

Create the admin:
```
# cake bake controller blogs --prefix admin
# cake bake template blogs --prefix admin

# cake server
```

If you see the [login](http://localhost:8765/login) page, please [register](http://localhost:8765/register) a new user. Dont forget to activate in email link or directly in users table ;-) in active field (values: 0 or 1).

[http://localhost:8765/admin](http://localhost:8765/admin)

See more in [CakeDC](https://github.com/CakeDC/users/blob/11.next-cake4/Docs/Documentation/Installation.md) page on github.



**12. If you wanna modify the CakeDC/Users emails, move and edit: (I still have to think about it ;-))**
```
# mv /vendor/zsfoto/jeffadmin/templates/plugin/CakeDC/Users/email root)/templates/plugin/CakeDC/Users/email
```

**13. Config Sidebar menu:**
Edit the /config/jeffadmin.php

... To be continued ...

