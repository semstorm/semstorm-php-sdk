<?php
/**
 * Example: Monitoring retrieve campaign.
 * 
 * Returns information about given campaign.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

//Retrieve campaign.
printf("Campaign with id '" . __CAMPAIGN_1_ID__ . "':\n");
print_r($monitoringCampaign->retrieve( __CAMPAIGN_1_ID__ ));


/*
Example output


Campaign with id '__CAMPAIGN_1_ID__':
Array
(
    [params] => Array
        (
            [id] => __CAMPAIGN_1_ID__
        )

    [result] => Array
        (
            [id] => __CAMPAIGN_1_ID__
            [title] => example.com
            [domain] => example.com
            [status] => active
            [access_type] => owner
            [created_time] => 1402497161
            [changed_time] => 1478460758
            [tags] => Array
                (
                    [0] => 12
                    [1] => 13
                )

            [groups] => Array
                (
                    [0] => 1234
                    [1] => 1235
                    [2] => 1236
                    [3] => 1237
                    [4] => 1238
                    [5] => 1239
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */