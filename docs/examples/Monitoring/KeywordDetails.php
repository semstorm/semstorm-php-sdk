<?php
/**
 * Example: Monitoring retrieve keyword data.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringKeyword;

//New monitoring keyword object to manage campaigns.
$monitoringKeyword = new MonitoringKeyword();

//Set proper params (only ID is required).
$params = [];
//This can be array of keywords ids.
$params['kid'] = __KEYWORD_1_ID__;
$params['params'] = [];
$params['params']['datemin'] = "20170914";
$params['params']['datemax'] = "20171127";
$params['params']['gap'] = "monthly";
$params['params']['type'] = "competitors";

//Retrieve data.
printf("Keyword details:\n");
print_r($monitoringKeyword->getDetails( $params ));


/*
Example output



Array
(
    [params] => Array
        (
            [kid] => Array
                (
                    [0] => __KEYWORD_1_ID__
                )

            [params] => Array
                (
                    [datemin] => 20170914
                    [datemax] => 20171127
                    [gap] => monthly
                    [type] => competitors
                )

            [keywords] => Array
                (
                    [__KEYWORD_1_ID__] => Array
                        (
                            [title] => keyword title
                            [status] => active
                        )

                )

        )

    [results] => Array
        (
            [__KEYWORD_1_ID__] => Array
                (
                    [desktop] => Array
                        (
                            [example.com] => Array
                                (
                                    [2017-09-01] => 9.76
                                    [2017-10-01] => 12.52
                                    [2017-11-01] => 13.07
                                )

                                (...)

                        )

                        (...)

                )

                (...)

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */