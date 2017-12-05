<?php
/**
 * Example: Monitoring retrieve campaign data.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

//Set proper params (only ID is required).
$params = [];
$params['id'] = __CAMPAIGN_1_ID__;
$params['params'] = [];
$params['params']['datemin'] = "20170914";
$params['params']['datemax'] = "20171127";
$params['params']['gap'] = "monthly";
//$params['domains'] = ["example.com", "example2.com"];

//Retrieve data.
printf("Campaign data:\n");
print_r($monitoringCampaign->getData( $params ));


/*
Example output

Campaign data:
stdClass Object
(
    [result] => stdClass Object
        (
            [_GROUP_ID_] => stdClass Object
                (
                    [example.com] => stdClass Object
                        (
                            [_KEYWORD_ID_] => stdClass Object
                                (
                                    [keyword] => stdClass Object
                                        (
                                            [title] => keyword
                                            [volume] => 9999
                                            [cpc] => 9
                                        )

                                    [data] => stdClass Object
                                        (
                                            [2017-09-01] => stdClass Object
                                                (
                                                    [google] => stdClass Object
                                                        (
                                                            [desktop] => stdClass Object
                                                                (
                                                                    [warszawa] => stdClass Object
                                                                        (
                                                                            [pos] => 9
                                                                            [url] => example.com/keyword-this
                                                                        )

                                                                    [łódź] => stdClass Object
                                                                        (
                                                                            [pos] => 9
                                                                            [url] => example.com/keyword-that
                                                                        )

                                                                )

                                                        )

                                                    [bing] => Array
                                                        (
                                                        )

                                                )

                                            [2017-10-01] => stdClass Object
                                                (
                                                    (...)
                                                )

                                            [2017-11-01] => stdClass Object
                                                (
                                                    (...)
                                                )

                                        )

                                )

                            [_KEYWORD_ID_] => stdClass Object
                                (
                                                    (...)
                                )
                        )

                )

        )

    [params] => stdClass Object
        (
            [cid] => _ID_
            [domains] => Array
                (
                    [0] => example.com
                    [1] => example2.com
                )

            [datemin] => 20170914
            [datemax] => 20171127
            [gap] => monthly
        )

    [_credits] => 0
    [_credits_left] => 1500
)


 */