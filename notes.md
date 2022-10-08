# NOTES

## Setup
- laravel new fitness-app
- cd fitness-app  
- valet link  
- inizizlize repository
- initial commit
- git push

## Connect Database
- edit .env file and insert DB conection data:
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=8889
    DB_DATABASE=fitness-app
    DB_USERNAME=root
    DB_PASSWORD=root
- Add DB_SOCKET options to connect DB used with MAMP
    DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock 

## Add Models and edit fields
- php artisan make:model categories --all
- edit migration file:
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name')->nullable();
        $table->string('color');
        $table->string('icon')->nullable();
        $table->string('type')->nullable();
        $table->timestamps();
    });

- php artisan make:model exercises --all
- edit migration file:
    Schema::create('exercises', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('category_id')->unsigned()->nullable();
        $table->string('name');
        $table->text('description')->nullable();
        $table->text('notes')->nullable();
        $table->timestamps();
    });
    Schema::table('exercises', function(Blueprint $table)
    {
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
    });

- php artisan make:model cards --all
- edit migration file:
    Schema::create('cards', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('user_id')->unsigned()->nullable();
        $table->bigInteger('category_id')->unsigned()->nullable();
        $table->string('name')->nullable();
        $table->date('date_from')->nullable();
        $table->date('date_to')->nullable();
        $table->boolean('disabled')->default(0);
        $table->timestamps();
        
    });
    Schema::table('cards', function(Blueprint $table)
    {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
    });

- php artisan make:model card_details --all
- edit migration file:
    Schema::create('card_details', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('card_id')->unsigned()->nullable();
        $table->bigInteger('exercize_id')->unsigned()->nullable();
        $table->integer('quantity')->unsigned()->nullable();
        $table->integer('weight')->unsigned()->nullable();
        $table->integer('duration')->unsigned()->nullable();
        $table->integer('recovery_time')->unsigned()->nullable();
        $table->timestamps();

    });
    Schema::table('card_details', function(Blueprint $table)
    {
        $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
        $table->foreign('exercize_id')->references('id')->on('exercises')->onDelete('set null');
    });
### Update users table
- php artisan make:migration update_users_table
- edit migration file:
    Schema::table('users', function(Blueprint $table) {
        $table->id();
        $table->bigInteger('category_id')->unsigned()->nullable();
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->integer('role')->unsigned()->default(0);
        $table->string('name');
        $table->string('second_name')->nullable();
        $table->date('birthday')->nullable();
        $table->string('sex')->nullable();
        $table->integer('weight')->unsigned()->nullable();
        $table->integer('height')->unsigned()->nullable();
        $table->string('job')->nullable();
        $table->string('country')->nullable();
        $table->string('city')->nullable();;
        $table->string('postal_code')->nullable();
        $table->string('address')->nullable();
        $table->string('phone')->nullable();
        $table->rememberToken();
        $table->timestamps();
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
    });

## Run Migration 
- php artisan migrate

## Check Rolloback (optional)
- php artisan migrate:rollback --step=1 (run the command as many time as the number of migrations)
- php artisan migrate <!-- to restore migrations -->


## Add User Auth Controller
php artisan make:controller Api/V1/UserController --api
php artisan make:controller Api/V1/AuthController --api 

## Add Filters, request and resources 
- Add file Api Filter
- Add user filter
- Add User Resource and collection
- Add AuthServiceProvider Gate auth
- Add UserLoginRequest
- Add UserRegister Request
- Add UserResource
- Add UserCollection

## Add Routes
- Add ApiResource user


                
                




