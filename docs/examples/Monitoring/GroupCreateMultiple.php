<?php
/**
 * Example: Monitoring create multiple group.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringGroup;

//New monitoring group object to manage groups.
$monitoringGroup = new MonitoringGroup();

$data = [];
$data["campaign_id"] = __CAMPAIGN_1_ID__;
$data["groups"] = [];
$data["groups"]["group 1"] = [
  "title" => "new group 1",
  "engine" => 2,
  "country" => 162,
  "devices" => ["desktop", "mobile"]
];
$data["groups"]["group 2"] = [
  "title" => "new group 2",
  "engine" => 2,
  "country" => 168,
  "devices" => ["desktop"]
];

//Create groups.
print_r($monitoringGroup->createMultiple( $data ));


/*
Example output


stdClass Object
(
    [params] => stdClass Object
        (
            [campaign_id] => __CAMPAIGN_1_ID__
            [groups] => stdClass Object
                (
                    [group 1] => stdClass Object
                        (
                            [title] => new group 1
                            [engine] => 2
                            [country] => 162
                            [devices] => Array
                                (
                                    [0] => desktop
                                    [1] => mobile
                                )

                        )

                    [group 2] => stdClass Object
                        (
                            [title] => new group 2
                            [engine] => 2
                            [country] => 168
                            [devices] => Array
                                (
                                    [0] => desktop
                                )

                        )

                )

        )

    [result] => stdClass Object
        (
            [id] => stdClass Object
                (
                    [group 1] => 123456
                    [group 2] => 123457
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */