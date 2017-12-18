<?php
/**
 * Example: Monitoring create campaign.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

//Create campaign.
$data = [];
$data['domain'] = 'example.com';
print_r($monitoringCampaign->create($data));


/*
Example output


Array
(
    [params] => Array
        (
            [domain] => example.com
        )

    [result] => Array
        (
            [id] => 123456
        )

    [_credits] => 0
    [_credits_left] => 80
)

*/