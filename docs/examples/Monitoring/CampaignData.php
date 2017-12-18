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
//You can set $params['params']['filters'] array to filter campaign keywords. Especially useful for customization reports in big campaigns.
//For details about filters see examples/Explorer/FiltersExplain.php and examples/Explorer/FiltersUsage.php files.

//Retrieve data.
printf("Campaign data:\n");
print_r($monitoringCampaign->getData( $params ));


/*
Example output

Campaign data:
Array
(
    [params] => Array
        (
            [cid] => _ID_
            [domains] => Array
                (
                    [0] => example.com
                    [1] => example2.com
                )

            [type] => organic
            [datemin] => 20170914
            [datemax] => 20171127
            [gap] => monthly
        )

    [result] => Array
        (
            [_GROUP_ID_] => Array
                (
                    [example.com] => Array
                        (
                            [_KEYWORD_ID_] => Array
                                (
                                    [keyword] => Array
                                        (
                                            [title] => keyword
                                            [volume] => 9999
                                            [cpc] => 9
                                        )

                                    [data] => Array
                                        (
                                            [2017-09-01] => Array
                                                (
                                                    [google] => Array
                                                        (
                                                            [desktop] => Array
                                                                (
                                                                    [warszawa] => Array
                                                                        (
                                                                            [pos] => 9
                                                                            [url] => example.com/keyword-this
                                                                        )

                                                                    [łódź] => Array
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

                                            [2017-10-01] => Array
                                                (
                                                    (...)
                                                )

                                            [2017-11-01] => Array
                                                (
                                                    (...)
                                                )

                                        )

                                )

                            [_KEYWORD_ID_] => Array
                                (
                                                    (...)
                                )
                        )

                )

        )
        
    [_credits] => 0
    [_credits_left] => 1500
)


 */