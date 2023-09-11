**1. Install cakephp:**

```
# composer create-project --prefer-dist cakephp/app:~4.0 teszt.loc
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

**4. Install CakeDC / Users:**
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
Removed:
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

**9. Copy config and src dir to app root (from /vendor/zsfoto/jeffadmin/templates/toCopyToRoot/ to /):**
```
# cp /vendor/zsfoto/jeffadmin/templates/toCopyToRoot/config /(app root)
# cp /vendor/zsfoto/jeffadmin/templates/toCopyToRoot/src /(app root)
```

**10. Modify MySQL users table in SQL editor (phpmyadmin or MySQL Workbench):**
```
ALTER TABLE `users` CHANGE `username` `username` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL; 
```

**11. Try to bake and "Enjoy it":**
```
# cake bake model blogs
# cake bake controller blogs --prefix admin
# cake bake template blogs --prefix admin
```

**12. If you wanna modify the CakeDC/Users emails, move and edit: (I still have to think about it ;-))**
```
# mv /vendor/zsfoto/jeffadmin/templates/plugin/CakeDC/Users/email root)/templates/plugin/CakeDC/Users/email
```

