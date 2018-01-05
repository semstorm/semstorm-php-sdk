<?php
/**
 * Example: Monitoring groups list.
 * 
 * Returns list of campaign groups ids.
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


Array
(
    [params] => Array
        (
            [campaign_id] => __CAMPAIGN_1_ID__
            [pager] => Array
                (
                    [items_per_page] => 25
                    [page] => 0
                )
        )

    [result] => Array
        (
            [count] => 12
            [groups] => Array
                (
                    [0] => Array
                        (
                            [id] => 123456
                            [title] => Group title
                            [keywords_count] => 21
                            [status] => active
                            [engine] => 2
                            [country] => 168
                            [location] => empty
                            [devices] => Array
                                (
                                    [0] => desktop
                                )

                        )
                    [1] => Array
                        (
                            [id] => 123457
                            [title] => Another group title
                            [keywords_count] => 6
                            [status] => active
                            [engine] => 2
                            [country] => 168
                            [location] => empty
                            [devices] => Array
                                (
                                    [0] => desktop
                                    [1] => mobile
                                )

                        )
                        
                        (...)

                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */