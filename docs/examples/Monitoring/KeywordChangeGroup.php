<?php
/**
 * Example: Monitoring change keywords group.
 * 
 * Take keywords (from any places) and put them to given group.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringKeyword;

//New monitoring keyword object to manage campaigns.
$monitoringKeyword = new MonitoringKeyword();

//Set proper params.
$params = [];
$params['group_id'] = __GROUP_1_ID__;
$params['id'] = [];
$params['id'][] = __KEYWORD_1_ID__;
$params['id'][] = __KEYWORD_2_ID__;

//Change groups.
print_r($monitoringKeyword->changeGroup( $params ));


/*
Example output


Keyword data:
Array
(
    [params] => Array
        (
            [group_id] => __GROUP_1_ID__
            [id] => Array
                (
                    [0] => __KEYWORD_1_ID__
                    [0] => __KEYWORD_2_ID__
                )
        )

    [results] => Array
        (
            [__KEYWORD_1_ID__] => 1
            [__KEYWORD_2_ID__] => 1
        )
        
    [_credits] => 0
    [_credits_left] => 80
)


 */