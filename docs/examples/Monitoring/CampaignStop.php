<?php
/**
 * Example: Monitoring stop campaign.
 * 
 * Change statuses of given campaigns to stopped.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

$data = [];
$data['id'] = [__CAMPAIGN_1_ID__, __CAMPAIGN_2_ID__];

//Stop campaign.
print_r($monitoringCampaign->stop( $data ));


/*
Example output


Array
(
    [params] => Array
        (
            [0] => __CAMPAIGN_1_ID__
            [1] => __CAMPAIGN_2_ID__
        )

    [result] => Array
        (
            [__CAMPAIGN_1_ID__] => 1
            [__CAMPAIGN_2_ID__] => 1
        )

    [_credits] => 0
    [_credits_left] => 80
)

 */