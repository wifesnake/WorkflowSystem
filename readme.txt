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

// install datatables in laravel
composer require yajra/laravel-datatables
provider : \Yajra\DataTables\DataTablesServiceProvider::class,
aliases : 'DataTables' => \Yajra\DataTables\Facades\DataTables::class
php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"
php artisan make:controller EmployeeController
php artisan make:model Employee -m
php artisan migrate
php artisan make:factory EmployeeFactory --model="Employee"
php artisan tinker
Employee::factory()->count(20)->create()
exit
php artisan datatables:make Employee

// Git *create file .env
git clone -b master https://github.com/wifesnake/WorkflowSystem.git PJWC_v2
git clocn -b <name_branch> https://github.com/wifesnake/WorkflowSystem.git <name_directory>
git init
git branch <name_branch> // create branch
git switch <name_branch> change branch *don't use master branch
npm install
composer install
npm run dev
php artisan key:generate