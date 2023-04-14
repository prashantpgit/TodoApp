To use the application following are the steps :

1. Install dependencies using : 
```
composer install
```

2. Create the .env file from the example file 
```
cp .env.example .env
```

3. Open the .env file and change the database configuration to the following 

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=your-project-name
DB_USERNAME=username
DB_PASSWORD=password

```

4. Open a new terminal tab to generate application key 

```
php artisan key:generate
```

5. Migrate database tables

```
php artisan migrate
```