BuyVM Stallion API (PHP)
========================

[![Build Status](https://travis-ci.org/splitice/buyvm-stallion-api.svg?branch=master)](https://travis-ci.org/splitice/buyvm-stallion-api)

This is a PHP5 wrapper to easily integrate  with BuyVM's Stallion control panel API.

Developed for use at [www.x4b.net](http://www.x4b.net). Pull requests, features and patches welcome.

## Requirements
You need PHP 5.3.2+ compiled with the cURL extension.

## Install BuyVM Stallion API (PHP)
### Installing via Composer

The recommended way to install the Stallion SDK is through [Composer](http://getcomposer.org).

1. Add ``splitice/buyvm-stallion-api`` as a dependency in your project's ``composer.json`` file:

        {
            "require": {
                "splitice/buyvm-stallion-api": "dev-master"
            }
        }

2. Download and install Composer:

        curl -s http://getcomposer.org/installer | php

3. Install your dependencies:

        php composer.phar install

4. Require Composer's autoloader

    Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process:

        require 'vendor/autoload.php';

You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at [getcomposer.org](http://getcomposer.org).

## Examples

Here are some examples on how to do basic operations.

### Setting Reverse DNS
```
$client = new ApiClient('KEY', 'HASH');
$api = new BuyVMApi($client);
$api->rdns('1.1.1.1', 'rdns-ptr');
```

### Get VPS information
```
$client = new ApiClient('KEY', 'HASH');
$api = new BuyVMApi($client);
$memory = $api->get('mem');
```
