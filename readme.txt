// create project
composer create-project laravel/laravel <name_project>

// install laravel ui package
composer require laravel/ui

// generage page login and register
php artisan ui bootstrap --auth

// Crate Seeder Users
php artisan make:seeder <name_file>

// Make Users Seeder
php artisan db:seed --class=<name_file>

//
npm install
npm run dev // updateproject
npm install --global cross-env //error run dev
npm install --no-bin-links // error run dev