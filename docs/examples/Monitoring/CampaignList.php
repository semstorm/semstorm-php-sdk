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

//Set params.
$data = [];
$data['type'] = "seo";
$data['pager']['items_per_page'] = 25;
$data['pager']['page'] = 1;
$data['filters']['engine'] = 2;

//List campaigns.
printf("List seo campaigns with Google engine from 26 to 50:\n");
print_r($monitoringCampaign->getList( $data ));


/*
Example output


List seo campaigns with Google engine from 26 to 50:
stdClass Object
(
    [params] => stdClass Object
        (
            [type] => seo
            [pager] => stdClass Object
                (
                    [items_per_page] => 25
                    [page] => 1
                    
                )
                
            [filters] => stdClass Object
                (
                    [engine] => 2
                    
                )
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
                    (...)
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */