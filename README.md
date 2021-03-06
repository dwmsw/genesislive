# dwmsw/genesislive

[![Build Status](https://travis-ci.org/dwmsw/genesislive.svg)](https://travis-ci.org/dwmsw/genesislive)
[![Code Climate](https://codeclimate.com/github/dwmsw/genesislive/badges/gpa.svg)](https://codeclimate.com/github/dwmsw/genesislive)
[![Test Coverage](https://codeclimate.com/github/dwmsw/genesislive/badges/coverage.svg)](https://codeclimate.com/github/dwmsw/genesislive)

## Description

dwmsw/genesislive is a library for interacting with the [Radical Solutions](http://www.radsol.co.uk/) Genesis API.

It aims to make interacting with the API as easy as possible.

## To Do
- Add more tests!
- Get an API key to use with tests so we don't have to check for 400 errors form the API

## Usage

Usage is pretty easy, create a new instance of the class you require and then pass in the parameters required.

**Search**

```PHP
require('vendor/autoload.php');

$api = new dwmsw\genesislive\Search('YOUR API KEY HERE');

// Set parameters
$params['division'] = 'Sales';
$params['priceto']  = 500000;
$params['type']     = 'House';
$params['BedroomsFrom'] = 3;
$params['BedroomsTo'] = 4;

// Make request
$api->setQueryString($params);
$api->doSearch();
$api->sendRequest();

// Get properties
$properties = $api->getProperties();
```

**Single Property**

```PHP
require('vendor/autoload.php');

$api = new dwmsw\genesislive\Single('YOUR API KEY HERE');

// Set parameters
$params['PropertyID'] = $_GET['PropertyID'];

// Make request
$api->setQueryString($params);
$api->doSearch();
$api->sendRequest();

// Get property data
$property = $api->getProperty();
```

**Images**

```php
    // Grab the URL
    $src = dwmsw\genesislive\Image::getImageURL('MediaKey', 'Width', 'Height');

    // Print the Image
    printf('<img src="%s" alt="">', $src);
```

## Getting Involved

- Open an issue with a feature you'd like
- Make a PR
- Write any tests that may be missing!
