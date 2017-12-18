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
stdClass Object
(
    [params] => stdClass Object
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

    [result] => stdClass Object
        (
            [example.com] => stdClass Object
                (
                    [__KEYWORD_1_ID__] => stdClass Object
                        (
                            [keyword] => stdClass Object
                                (
                                    [title] => keyword title
                                    [volume] => 1234500
                                    [cpc] => 1
                                )

                            [data] => stdClass Object
                                (
                                    [2017-09-01] => stdClass Object
                                        (
                                            [google] => stdClass Object
                                                (
                                                    [desktop] => stdClass Object
                                                        (
                                                            [warsaw] => stdClass Object
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