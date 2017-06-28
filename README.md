# Semstorm PHP SDK

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