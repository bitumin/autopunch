#### Prepare local environment

```
$ composer install
```

Create a `credentials.php` file at the project root with your Zoho login credentials:

```
<?php

return [
    'zoho_user' => 'my@email.com',
    'zoho_password' => 'myPassword',
];
```

#### Run selenium server

```
bin/selenium-server-standalone  
```

#### Run features

Check in

```
$ bin/behat features/check_in.feature
```

Check out

```
$ bin/behat features/check_out.feature
```
