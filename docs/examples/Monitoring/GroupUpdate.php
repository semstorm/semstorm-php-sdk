<?php
/**
 * Example: Monitoring update group.
 * 
 * Change group data.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringGroup;

//New monitoring group object to manage groups.
$monitoringGroup = new MonitoringGroup();

//Set new data.
$data = [];
$data['title'] = 'New name';
$data['location'] = 'warsaw';
$data['engine'] = 2;
$data['country'] = 169;
$data['devices'] = ['mobile', 'desktop'];

//Update group.
print_r($monitoringGroup->update(__GROUP_1_ID__, $data));


/*
Example output


Array
(
    [params] => Array
        (
            [title] => New name
            [location] => warsaw
            [engine] => 2
            [country] => 169
            [devices] => Array
                (
                    [0] => mobile
                    [1] => desktop
                )

            [id] => __GROUP_1_ID__
        )

    [result] => 1
    [_credits] => 0
    [_credits_left] => 80
)
*/