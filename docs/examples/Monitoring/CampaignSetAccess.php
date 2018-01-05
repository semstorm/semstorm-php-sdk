<?php
/**
 * Example: Monitoring set campaigns access.
 * 
 * Allow to manipulate campaigns accesses which you own or manage.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

$data = [];
$data[__CAMPAIGN_1_ID__] = [];
$data[__CAMPAIGN_1_ID__]["set"] = [];
$data[__CAMPAIGN_1_ID__]["set"][] = ["mail" => __USER_1_MAIL__, "permission" => "readonly"];
$data[__CAMPAIGN_1_ID__]["remove"] = [];
$data[__CAMPAIGN_1_ID__]["remove"][] = ["mail" => __USER_2_MAIL__];

//Delete campaign.
print_r($monitoringCampaign->setAccess( $data ));


/*
Example output


Array
(
    [params] => Array
        (
            [__CAMPAIGN_1_ID__] => Array
                (
                    [set] => Array
                        (
                            [0] => Array
                                (
                                    [mail] => __USER_1_MAIL__
                                    [permission] => readonly
                                )

                        )

                    [remove] => Array
                        (
                            [0] => Array
                                (
                                    [mail] => __USER_2_MAIL__
                                )

                        )

                )

        )

    [result] => Array
        (
            [__CAMPAIGN_1_ID__] => Array
                (
                    [set] => Array
                        (
                            [__USER_1_MAIL__] => 1
                        )

                    [remove] => Array
                        (
                            [__USER_1_MAIL__] => 1
                        )

                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */