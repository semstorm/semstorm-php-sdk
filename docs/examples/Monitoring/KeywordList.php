<?php
/**
 * Example: Monitoring keywords list.
 * 
 * Returns list of campaign keywords ids.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringKeyword;

//New monitoring group object to manage keywords.
$monitoringKeyword = new MonitoringKeyword();

//Set pager params.
$params = [];
$params['campaign_id'] = __CAMPAIGN_1_ID__;
$params['pager']['items_per_page'] = 25;
$params['pager']['page'] = 0;

//Start group.
print_r($monitoringKeyword->getList( $params ));


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

    [results] => Array
        (
            [count] => 56
            [keywords] => Array
                (
                    [0] => Array
                        (
                            [id] => 123456
                            [title] => keyword 1
                            [status] => active
                            [group_id] => 54647
                            [group_status] => active
                        )

                    [1] => Array
                        (
                            [id] => 123457
                            [title] => keyword 2
                            [status] => active
                            [group_id] => 54648
                            [group_status] => stop
                        )
                    
                    (...)
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */