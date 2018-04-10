<?php
/**
 * Example: Monitoring stop keywords.
 * 
 * Change statuses of given keywords to stopped.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringKeyword;

//New monitoring keyword object to manage keywords.
$monitoringKeyword = new MonitoringKeyword();

$data = [];
$data['id'] = [__KEYWORD_1_ID__, __KEYWORD_2_ID__];

//Stop keywords.
print_r($monitoringKeyword->stop( $data ));


/*
Example output


Array
(
    [params] => Array
        (
            [0] => __GROUP_1_ID__
            [1] => __GROUP_2_ID__
        )

    [results] => Array
        (
            [__GROUP_1_ID__] => 1
            [__GROUP_2_ID__] => 1
        )

    [_credits] => 0
    [_credits_left] => 80
)
*/