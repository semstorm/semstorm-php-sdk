<?php
/**
 * Example: Monitoring tables engines.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringTables;

//New monitoring tables object to retrieve tables.
$monitoringTables = new MonitoringTables();

//Start keywords.
printf("Devices:\n");
print_r($monitoringTables->retrieve("devices"));


/*
Example output


Devices:
stdClass Object
(
    [params] => stdClass Object
        (
            [table] => devices
        )

    [result] => stdClass Object
        (
            [devices] => Array
                (
                    [0] => mobile
                    [1] => desktop
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)
*/