<?php
/**
 * Example: Monitoring retrieve keyword.
 * 
 * Returns information about given keyword.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringKeyword;

//New monitoring keyword object to manage keywords.
$monitoringKeyword = new MonitoringKeyword();

//Retrieve keyword.
printf("Keyword with id '" . __KEYWORD_1_ID__ . "':\n");
print_r($monitoringKeyword->retrieve(__KEYWORD_1_ID__));


/*
Example output


Keyword with id '__KEYWORD_1_ID__':
Array
(
    [params] => Array
        (
            [id] => __KEYWORD_1_ID__
        )

    [result] => Array
        (
            [id] => __KEYWORD_1_ID__
            [title] => Keyword name
            [status] => active
            [group_id] => 12345
            [tags] => Array
                (
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

*/