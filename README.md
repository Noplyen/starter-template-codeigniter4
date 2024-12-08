## REVIEW

### Whats in inside
1. id generator
2. user authentication & authorization with schema database
3. filter
4. ui admin
5. grid js for table data
6. axios cdn
7. tippy js for tooltip
8. sweetalert cdn
9. bootstrap 5
10. simple file service
11. monolog
12. jwt cookie
13. simple mapper array to object
14. custom exception


### Simple Doc
1. how to used privileges access
   ```
        $routes->group("/admin",["filter"=>"authorization:ADMIN_CREATE"],function ($routes) {
   ```
   sample above will add privileges access for user with `ADMIN_CREATE` privilege, you can pass
   more with add separate commas like this `authorization:ADMIN_CREATE,ADMIN_UPDATE`
2. logging default will appear to console, for production set true at `Helpers\AppLogger.php`
to use logging
```
    private Logger $appLogger;
    $this->appLogger = AppLogger::getMonologConfig();
```
3. generate id string with `Helpers/UuidGenerator`
4. sample grid js at `public/resources/js/data-display`
5. mappify is my own lib for mapping data array to object, sample used at `app\Entities\UserMapper`
```
$mappify  = RawToObjectFactory::getInstance();

        $user = $mappify->getObject(
            $raw,
            Users::class,
            [
                "id"=>"user_id"
            ]);

// parameter 3 is when field name at database and field name at entities are different
// you must declare it, ["key"=>"value"] key means name field at entities and values field name at database
```
6. exception usage example for `FailedInsertDataException`

```
 } catch (\ReflectionException $e) {
            throw new  FailedInsertDataException(
            // helper for generate message
              ExceptionMessageHelper::failedInsertException(Client::class),
            // passing error stack trace
              $e,
            // optional more data
              ["email"=>$client->getEmail()]
            );
        }
```

### First Running for test

1. initialize schema at your database
2. setting config database at `.env` such as database name, username and password
3. `php spark serve` for running server
4. path `/login` and `/admin` login credential admin@gmail.com password haslam