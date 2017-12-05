<?php
/**
 * Example: Monitoring retrieve group.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringGroup;

//New monitoring group object to manage groups.
$monitoringGroup = new MonitoringGroup();

//Retrieve group.
printf("Group with id '" . __GROUP_1_ID__ . "':\n");
print_r($monitoringGroup->retrieve(__GROUP_1_ID__));


/*
Example output


Group with id '__GROUP_1_ID__':
stdClass Object
(
    [params] => stdClass Object
        (
            [id] => __GROUP_1_ID__
        )

    [result] => stdClass Object
        (
            [id] => __GROUP_1_ID__
            [title] => Group title
            [status] => active
            [created_time] => 1402497478
            [changed_time] => 1402497478
            [keywords] => Array
                (
                    [0] => 123456
                    [1] => 123457
                    [2] => 123458
                    [3] => 123459
                    [4] => 123460
                    [5] => 123461
                    [6] => 123462
                    [7] => 123463
                    [8] => 123464
                    [9] => 123465
                    [10] => 123466
                    [11] => 123467
                )
        
            [engines] => Array
                (
                    [0] => stdClass Object
                        (
                            [engine] => 2
                            [country] => 168
                        )
        
                )
        
            [locations] => Array
                (
                    [0] => empty
                )
        
            [devices] => Array
                (
                    [0] => desktop
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)
*/