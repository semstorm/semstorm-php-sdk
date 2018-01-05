<?php
/**
 * Example: Monitoring update campaign.
 * 
 * Change campaign domain.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

//Set new data.
$data = [];
$data['domain'] = 'example2.com';

//Update campaign.
print_r($monitoringCampaign->update( __CAMPAIGN_1_ID__, $data ));


/*
Example output


Array
(
    [params] => Array
        (
            [domain] => example2.com
            [id] => __CAMPAIGN_1_ID__
        )

    [result] => 1
    [_credits] => 0
    [_credits_left] => 80
)


 */