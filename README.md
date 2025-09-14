# CodeIgniter 4 Application Starter


### .env - setup:

#### Base URL
app.baseURL = 'http://localhost/my_ci4_service_center_queue/public'


#### Database 
database.default.hostname = localhost
database.default.database = my_ci4_service_center_queue
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306


 <br />

### app/Config/Filters.php - setup:

#### - pasted the route to the AuthFilter class within $aliases array -

public array $aliases = [
	.
	.
	.
        'auth'    => \App\Filters\AuthFilter::class,  
    ];

 <br />

 ### create tables to migrate into database

 ##### 1. Command Line - php spark make:migration CreateTokens
 ##### 2. Paste CreateTokens class into the database/migrations/.. file
 ##### 3. Command Line - php spark migrate


 <br />


#### Login is hardcoded

##### User
username - user
password - user123

##### Admin
username - admin
password - admin123
