```
php -d="memory_limit=-1" artisan package:installrequire mnoskov/evocms-module-example "*"
php artisan vendor:publish --provider=EvolutionCMS\Example\ExampleServiceProvider
php artisan migrate
php artisan db:seed --class=ExampleItemsSeeder
```
