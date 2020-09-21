# Nova TV
> API implementation of EPG(Electronic Programming Guides) for **Nova TV** based on Laravel 7. 
> No authentication layer for now.

#### API(s)
1. List of channels
   - ***Url***: GET /channels
2. Programme timetable for a selected channel, for a selected date and timezone.
    - ***Url***: GET  /channels/{channel-uuid}/{date}/timezone/{timezone}
3. Programme information for a selected programme.
    - ***Url***: GET /channels/{channel-uuid}/programmes/{programme-uuid}
### EER diagram
EER Diagram added to root folder as ```nova.png``` 

For more information about apis, run `php artisan route:list` command from your terminal or command prompt.

#### Project Setup
``` bash
# Clone this git respository either using SSH or HTTP
$ git clone https://github.com/sanaullahkhan81/nova.git

# Go to the project root directory
$ cd nova

# Create .env file
$ cp .env.example .env

Modify database connection details in /.env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nova
DB_USERNAME=root
DB_PASSWORD=

# install dependencies
$ composer install

# Generate app key to make it secure
$ php artisan key:generate


# Migrate & seed database
$ php artisan migrate
$ php artisan db:seed
or to completely rebuild your database
$ php artisan migrate:fresh --seed  

# Start project on local development server
$ php artisan serve
```

### Postman Interaction with API
Postman File is in the root folder as ```novatv.postman_collection```

Note: Always Migrate & Seed database while using postman, as uuid are not static they change on fresh migration

```
$ php artisan migrate
$ php artisan db:seed
or to completely rebuild your database
$ php artisan migrate:fresh --seed 
```

*Please provide value for keys in Path variable .


###Logic behind Timezone
Timezone has been converted to string by using ```base64_decode($timezone);```. This helps to use in our API.

[bae64encoder link](https://www.base64encode.org/)


Examples

| Tmezone          | base64encode             |
|------------------|--------------------------|
| Europe/London    | RXVyb3BlL0xvbmRvbg==     |
| Europe/Amsterdam | RXVyb3BlL0Ftc3RlcmRhbQ== |
| America/New_York | QW1lcmljYS9OZXdfWW9yaw== |

If you want to test this url  ```/channels/{channel-uuid}/{date}/timezone/{timezone}``` of ```Europe/London``` timezone

```/channels/af23f-c23d-23e32-232f/2020-09-24/timezone/RXVyb3BlL0xvbmRvbg==``` 


### Laravel TestCase

```php artisan test``` Or

```vendor/bin/phpunit```

*Note: every test request will refresh database.


 
