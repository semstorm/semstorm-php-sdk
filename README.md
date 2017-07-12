# SEMSTORM PHP SDK

## Installing using composer:

### Via composer require command
```sh
composer require semstorm/semstorm-php-sdk
```

### Via composer.json file


```json
{
    "require": {
        "semstorm/semstorm-php-sdk": ">=0.1"
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

### More examples

For more examples see docs/examples directory, where are many samples with exhaustive comment.

# SEMSTORM API

## Access
### Access token

In order to use SEMSTORM API, it is required to have valid access token. Access tokens are granted only to registered users in [SEMSTORM](https://app.semstorm.com/).
If you are registered user, log in to SEMSTORM panel, and go to [access token page](https://app.semstorm.com/user/api/token) in profile. There you can generate or refresh your access token.
When you have your access token you are ready to use SEMSTORM API.

## API
### API endpoint

Official API endpoint is `http://api.semstorm.com/api-v3/`. All requests goes through this endpoint, and all of them must be authenticated by including 'services_token' parameter.

### Throttling

API have request limits. They are refreshed in short time frames (up to one minute). If you make too many requests in short time you might get error stating '503 Service Temporarily Unavailable. You are requesting too fast,(...)', this means you have to optimize your script to prevent further blocking.
