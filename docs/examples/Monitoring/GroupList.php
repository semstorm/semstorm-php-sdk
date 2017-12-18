<?php
/**
 * Example: Monitoring groups list.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringGroup;

//New monitoring group object to manage groups.
$monitoringGroup = new MonitoringGroup();

//Set pager params.
$params = [];
$params['campaign_id'] = __CAMPAIGN_1_ID__;
$params['pager']['items_per_page'] = 10;
$params['pager']['page'] = 0;

//Start group.
print_r($monitoringGroup->getList( $params ));


/*
Example output


stdClass Object
(
    [params] => stdClass Object
        (
            [campaign_id] => __CAMPAIGN_1_ID__
            [pager] => stdClass Object
                (
                    [items_per_page] => 25
                    [page] => 0
                )
        )

    [result] => stdClass Object
        (
            [count] => 72
            [groups] => Array
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