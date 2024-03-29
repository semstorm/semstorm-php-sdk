# SEMSTORM PHP SDK v3

## Installing using composer:

### Via composer require command
```sh
composer require semstorm/semstorm-php-sdk
```

### Via composer.json file

```json
{
    "require": {
        "semstorm/semstorm-php-sdk": ">=3.0"
    }
}
```

and then run update

```sh
composer update
```

## Usage

### Basic example

```php
include_once 'vendor/autoload.php';

use SemstormApi\Semstorm;
use SemstormApi\Monitoring\MonitoringCampaign;
Semstorm::init( __ACCESS_TOKEN__ );
$monitoringCampaign = new MonitoringCampaign();

print_r($monitoringCampaign->retrieve(12345));
```

### Monitoring examples

In `docs/examples/Monitoring` directory you can find examples with description and possible output.

Furthermore you can use MonitoringExamples.php file which will run multiple scripts and return its results. Just open `docs/examples/MonitoringExamples.php` file, fill config data and run script to see how API works.


### More examples

For more examples see docs/examples directory, where are many samples with exhaustive comment.

### Documentation

Documentation can be found in [SEMSTORM API documentation pages](https://api.semstorm.com/).

# SEMSTORM API

## Access
### Access token

In order to use SEMSTORM API, it is required to have valid access token. Access tokens are granted only to registered users in [SEMSTORM](https://app.semstorm.com/).
If you are registered user, log in to SEMSTORM panel, and go to [access token page](https://app.semstorm.com/user/api/token) in profile. There you can generate or refresh your access token.
When you have your access token you are ready to use SEMSTORM API.

## API
### API endpoint

Official API endpoint is `https://api.semstorm.com/api-v3/`. All requests goes through this endpoint, and all of them must be authenticated by including 'services_token' parameter.

### Throttling

API have request limits. It is 1 request per second. If you make too many requests at once you will get error stating '503 Service Temporarily Unavailable. You are requesting too fast,(...)', this means you have to optimize your script to prevent further blocking.
