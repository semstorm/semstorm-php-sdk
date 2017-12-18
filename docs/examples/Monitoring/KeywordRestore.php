<?php
/**
 * Example: Monitoring restore keywords.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringKeyword;

//New monitoring keyword object to manage keywords.
$monitoringKeyword = new MonitoringKeyword();

//Start keywords.
print_r($monitoringKeyword->restore([__KEYWORD_1_ID__, __KEYWORD_2_ID__]));


/*
Example output


stdClass Object
(
    [params] => Array
        (
            [0] => __GROUP_1_ID__
            [1] => __GROUP_2_ID__
        )

    [result] => stdClass Object
        (
            [__GROUP_1_ID__] => 1
            [__GROUP_2_ID__] => 1
        )

    [_credits] => 0
    [_credits_left] => 80
)
*/