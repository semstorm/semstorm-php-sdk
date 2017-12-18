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
$params['id'] = __KEYWORD_1_ID__;
$params['params'] = [];
$params['params']['datemin'] = "20170914";
$params['params']['datemax'] = "20171127";
$params['params']['gap'] = "monthly";

//Retrieve data.
printf("Keyword data:\n");
print_r($monitoringKeyword->getData( $params ));


/*
Example output


Keyword data:
Array
(
    [params] => Array
        (
            [id] => __KEYWORD_1_ID__
            [domains] => Array
                (
                    [0] => example.com
                )

            [datemin] => 20170914
            [datemax] => 20171127
            [gap] => monthly
        )

    [result] => Array
        (
            [example.com] => Array
                (
                    [__KEYWORD_1_ID__] => Array
                        (
                            [keyword] => Array
                                (
                                    [title] => keyword title
                                    [volume] => 1234500
                                    [cpc] => 1
                                )

                            [data] => Array
                                (
                                    [2017-09-01] => Array
                                        (
                                            [google] => Array
                                                (
                                                    [desktop] => Array
                                                        (
                                                            [warsaw] => Array
                                                                (
                                                                    [pos] => 3.8823529411765
                                                                    [url] => example.com/site
                                                                )

                                                        )

                                                )

                                        )
                                        
                                        (...)
                        )

                )

        )
        
    [_credits] => 0
    [_credits_left] => 80
)


 */