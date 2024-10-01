### Structure

- modules
-- Product

---- src
----------   Models
----------   Actions
----------   Providers
---- database
----------  Migrations

---- tests
----------  Features

---- config

### Procedure

1. Register modules in composer.json
    -  "psr-4": { 
          ...,
          "Modules\\": "modules/"
    }

2. Create module encapsulated (for ex : Product)

3. Create Models, Provider folder in Product Module Folder 
    (copy from command created file to the appropriate folder in product folder)
    - php artisan make:provider ProductServiceProvider
    - php artisan make:model Product
    - php artisan make:migration create_products_table

4. Create Data Migration
    - In Product Service provider , add to "boots function"
    $this->loadMigrationsFrom(__DIR__. '/../Database/Migrations');  
    after that you can run "php artisan migrate:refresh"

5. Merge config file in the boots function of service provider : 
    - $this->mergeConfigFrom(__DIR__.'/../config.php', 'product');

6. Create Route
    - add to the boots function : $this->loadRoutesFrom(__DIR__. '/../routes.php');  
    - in routes.php , add route basically 

7. Create Unit Test
    - php artisan make:test ...
    - add content it below the phpunit.xml
        <testsuite name="Modules">
            <directory>./modules/*/Tests/Feature</directory>
        </testsuite>
    - php artisan test

8. Create Factories
    - 1. Create Factory :  php artisan make:factory ProductFactory
    - 2. In ProductFactory add :  protected $model = Product::class;
    - 3. In Product Model add :
            protected static function newFactory() : ProductFactory
                {
                    return new ProductFactory();
                }
    - 4. Using Factory below in anywhere :
        $products = Product::factory()->create();

9. Install the IDE Helper
    - php artisan ide-helper:models --dir="modules"
    - Choose "no"

10. Add Events :
    - Create Event Service Provider in Product Module Folder, 
        then EventServiceProvider extends from Illuminate\Foundation\Support\Providers\EventServiceProvider;
    - Add EventServiceProvider in ProductServiceProvider at boots function :
        -- $this->app->register(EventServiceProvider::class);
    - Register Event normally in EventServiceProvider

11. Adding View blade
    - Create Views folder, then add view blade file in here
    - in ProductServiceProvider at boots funtion add :
        -- $this->loadViewsFrom(__DIR__. '/../Views', 'product'); //'product' is naming when call view package
    - after that just call view('product::products.index')
        or in blade file : <x-product::product-line product="test-product">

12. Create file composer.json, after that add to autoload > psr-4 to update appropriate folder to original composer understand

13. Integrating Filament
    - Install Filament Package
    - Move the resource to the Product folder
    - Update namespace following the product folder
    - In Panel Service Provider -> add :
            ->resources([
                UserResource::class
            ])

14.  


