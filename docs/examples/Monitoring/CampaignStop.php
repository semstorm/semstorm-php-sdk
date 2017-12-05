<?php
/**
 * Example: Monitoring stop campaign.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

//Stop campaign.
print_r($monitoringCampaign->stop( [__CAMPAIGN_1_ID__, __CAMPAIGN_2_ID__] ));


/*
Example output


stdClass Object
(
    [params] => stdClass Object
        (
            [id] => Array
                (
                    [0] => __CAMPAIGN_1_ID__
                    [1] => __CAMPAIGN_2_ID__
                )

        )

    [result] => 1
    [_credits] => 0
    [_credits_left] => 80
)

 */