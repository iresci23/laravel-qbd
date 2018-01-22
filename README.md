# Laravel QBD
I've been searching how to integrate QB Web connector with Laravel 5.x but coudn't find any. So I made this example package for you if ever you are in the same situation as I was. Feel free to clone/copy and modify it however you like.

## Getting Started
These instructions will get you a copy of the package up and running on your local machine for development and testing purposes.

If you are not yet familiar with QB Web Connector, visit [this](https://github.com/consolibyte/quickbooks-php) for quick start guides

### Installation
Require the QuickBooks PHP DevKit (QuickBooks integration support for PHP 5.x+)
```
composer require consolibyte/quickbooks 
```

Then manually require this package:
1. Download/clone the files and save it under your app's `packages/iresci23/laravel-qbd/` folder. Just create this folder if it is not yet existing.

2. Add this to your `composer.json` psr-4 autoload. It would look like this:
```
"psr-4": {
    "App\\": "app/",
    "Iresci23\\LaravelQbd\\": "packages/iresci23/laravel-qbd/src"
}
```

3. Add this line to your config/app.php provider
```
Iresci23\LaravelQbd\LaravelQbdServiceProvider::class
```

4. On the command line publish the config file for the package
```
php artisan vendor:publish --tag=config
```

5. These are the variables you need to set in your `.env` file
```
QB_DSN= #if this is empty, it will auto use your app db config
# web connector username & password has nothing to do with the real QB user login
QB_USERNAME=quickbooks
QB_PASSWORD=password
QB_TIMEZONE=America/New_York
QB_LOGLEVEL=QUICKBOOKS_LOG_DEVELOP
QB_MEMLIMIT=512M
QB_SOAPSERVER=QUICKBOOKS_SOAPSERVER_BUILTIN
```

6. Visit `http://yourappurl/qbd-connector/qbwc` to see if [it works](http://prntscr.com/i1jrsu)

7. Generate your `.qwc` file by visiting `http://yourappurl/qbd-connector/generate-qwc`
Upload this qwc file into the QB Web Connector application.

That's it.

You can check the code, there is a sample for syncing Customer info.
