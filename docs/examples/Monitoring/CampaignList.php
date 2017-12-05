<?php
/**
 * Example: Monitoring list campaigns.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

//Set pager params.
$params = [];
$params['items_per_page'] = 10;
$params['page'] = 1;

//List campaigns.
printf("List campaigns ids from 11 to 20:\n");
print_r($monitoringCampaign->getList( $params ));


/*
Example output


List campaigns ids from 11 to 20:
stdClass Object
(
    [params] => stdClass Object
        (
            [items_per_page] => 10
            [page] => 1
        )

    [result] => stdClass Object
        (
            [count] => 76
            [campaigns] => Array
                (
                    [0] => 1234
                    [1] => 1235
                    [2] => 1236
                    [3] => 1237
                    [4] => 1238
                    [5] => 1239
                    [6] => 1240
                    [7] => 1241
                    [8] => 1242
                    [9] => 1243
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */