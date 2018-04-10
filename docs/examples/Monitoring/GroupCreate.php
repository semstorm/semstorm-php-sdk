<?php
/**
 * Example: Monitoring create group.
 * 
 * Create new empty group.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringGroup;

//New monitoring group object to manage groups.
$monitoringGroup = new MonitoringGroup();

//Group data (only campaign_id is required.
$data = [];
$data['campaign_id'] = __CAMPAIGN_1_ID__;
$data['title'] = "New group";
$data['engine'] = 2;
$data['country'] = 168;
$data['location'] = "warszawa";
$data['devices'] = ["mobile", "desktop"];

//Create group.
printf("Create new group:\n");
print_r($monitoringGroup->create($data));


/*
Example output


Create new group:
Array
(
    [params] => Array
        (
            [campaign_id] => __CAMPAIGN_1_ID__
            [title] => New group
            [engine] => 2
            [country] => 168
            [location] => warszawa
            [devices] => Array
                (
                    [0] => mobile
                    [1] => desktop
                )

        )

    [results] => Array
        (
            [id] => 12345
        )

    [_credits] => 0
    [_credits_left] => 80
)
*/