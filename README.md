# JeffAdmin plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require zsfoto/jeffadmin
```

	src/Application.php
```
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();	
		...
		
		// Add this line:
		$this->addPlugin('JeffAdmin');
		...
	}
```

	Check the composer.json
```
    "autoload": {
        "psr-4": {
            "JeffAdmin\\": "src/",
			"JeffAdmin\\": "plugins/JeffAdmin/src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "JeffAdmin\\Test\\": "tests/",
            "Cake\\Test\\": "vendor/cakephp/cakephp/tests/",
			"JeffAdmin\\": "plugins/JeffAdmin/src/"
        }
    }

```

	
	Copy and edit /config/jeffadmin.php file
```
	cp vendor/zsfoto/jeffadmin/config/jeffadmin.php /config/jeffadmin.php
```


	Install cakedc/users
```
	
```

	Add the following lines to the end of the /config/bootstrap.php file
```
	try {
		Configure::load('jeffadmin', 'default');
	} catch (\Exception $e) {
		exit($e->getMessage() . "\n");
	}

	Configure::write('Bake.theme', 'JeffAdmin');

```

	In /src/Controller/Admin/AppController.php
```
    public function initialize(): void
    {
        parent::initialize();
		...
		$this->viewBuilder()->setTheme('JeffAdmin');
		...
	}
```
	or
	cp ToCopy/src to /src



	Add to route Admin (and Api, if you want)
```
    $routes->prefix('Admin', function (RouteBuilder $builder) {
        $builder->scope('/', function (RouteBuilder $builder) {
            $builder->setExtensions(['json', 'xml', 'xlsx']);

            $builder->connect('/', ['controller' => 'Notes', 'action' => 'index']);

            $builder->fallbacks(DashedRoute::class);
        });
	});


    $routes->prefix('Api', function (RouteBuilder $builder) {
        $builder->scope('/', function (RouteBuilder $builder) {
            $builder->setExtensions(['json', 'xml', 'xlsx']);

            $builder->connect('/', ['controller' => 'Notes', 'action' => 'index']);
            
            $builder->fallbacks(DashedRoute::class);
        });
	});
```


