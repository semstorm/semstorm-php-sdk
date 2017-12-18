<?php
/**
 * Example: Monitoring set campaigns access.
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


stdClass Object
(
    [params] => stdClass Object
        (
            [__CAMPAIGN_1_ID__] => stdClass Object
                (
                    [set] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [mail] => __USER_1_MAIL__
                                    [permission] => readonly
                                )

                        )

                    [remove] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [mail] => __USER_2_MAIL__
                                )

                        )

                )

        )

    [result] => stdClass Object
        (
            [__CAMPAIGN_1_ID__] => stdClass Object
                (
                    [set] => stdClass Object
                        (
                            [__USER_1_MAIL__] => 1
                        )

                    [remove] => stdClass Object
                        (
                            [__USER_1_MAIL__] => 1
                        )

                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */