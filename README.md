# CodeIgniter 4 Application Starter


# .env setup:

# ENVIRONMENT
CI_ENVIRONMENT = development


# APP
app.baseURL = 'http://localhost/my_ci4_service_center_queue/public'


# DATABASE
database.default.hostname = localhost
database.default.database = my_ci4_service_center_queue
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306




# app/Config/Filters.php setup:

## - pasted the route to the AuthFilter class within $aliases array -

public array $aliases = [
	.
	.
	.
        'auth'    => \App\Filters\AuthFilter::class,  
    ];