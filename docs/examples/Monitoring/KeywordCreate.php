<?php
/**
 * Example: Monitoring create keywords.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringKeyword;

//New monitoring keyword object to manage keywords.
$monitoringKeyword = new MonitoringKeyword();

//Create keywords.
$data = [];
$data['group_id'] = __GROUP_1_ID__;
$data['keywords'] = ["keyword 1", "keyword 2"];

printf("New keywords created:\n");
print_r($monitoringKeyword->create($data));


/*
Example output


New keywords created:
stdClass Object
(
    [params] => stdClass Object
        (
            [group_id] => __GROUP_1_ID__
            [keywords] => Array
                (
                    [0] => keyword 1
                    [1] => keyword 2
                )

        )

    [result] => stdClass Object
        (
            [id] => Array
                (
                    [0] => 123456
                    [1] => 123457
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

*/