<?php
/**
 * Example: Monitoring retrieve group data.
 *
 * Returns data about group.
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
$params['datemin'] = "20170914";
$params['datemax'] = "20171127";
$params['gap'] = "monthly";

//Use filters to set desired group id.
$filters = [];
$filters[] = [ 
  "field" => "group",
  "operand" => "equal",
  "value" => __GROUP_1_ID__
];
//Put filters into parameters.
$params['filters'] = $filters;


//Retrieve data.
printf("Group data:\n");
print_r($monitoringCampaign->getData( $params ));


/*
Example output


Array
(
    [params] => Array
        (
            [cid] => __CAMPAIGN_1_ID__
            [domains] => Array
                (
                    [0] => example.com
                )

            [type] => organic
            [datemin] => 20170914
            [datemax] => 20171127
            [gap] => monthly
            [filters] => Array
                (
                )

        )

    [result] => Array
        (
            [__GROUP_ID__] => Array
                (
                    [example.com] => Array
                        (
                            [__KEYWORD_ID__] => Array
                                (
                                    [keyword] => Array
                                        (
                                            [title] => kredyt
                                            [volume] => 8600
                                            [cpc] => 0
                                        )

                                    [data] => Array
                                        (
                                            [2017-09-01] => Array
                                                (
                                                    [google] => Array
                                                        (
                                                            [desktop] => Array
                                                                (
                                                                    [] => Array
                                                                        (
                                                                            [position] => 1.5
                                                                            [url] => example.com/pl
                                                                        )

                                                                )

                                                        )

                                                )

                                            [2017-10-01] => Array
                                                (
                                                    [google] => Array
                                                        (
                                                            [desktop] => Array
                                                                (
                                                                    [] => Array
                                                                        (
                                                                            [position] => 1.2
                                                                            [url] => example.com/pl
                                                                        )

                                                                )

                                                        )

                                                )

                                            [2017-11-01] => Array
                                                (
                                                    [google] => Array
                                                        (
                                                            [desktop] => Array
                                                                (
                                                                    [] => Array
                                                                        (
                                                                            [position] => 1.5
                                                                            [url] => example.com/pl
                                                                        )

                                                                )

                                                        )

                                                )

                                        )

                                )

                                (...)

                        )

                        (...)

                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */