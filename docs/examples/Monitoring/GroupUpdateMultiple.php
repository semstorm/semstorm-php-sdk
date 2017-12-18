<?php
/**
 * Example: Monitoring update multiple group.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringGroup;

//New monitoring group object to manage groups.
$monitoringGroup = new MonitoringGroup();

$data = [];
$data["groups"] = [];
$data["groups"][__GROUP_1_ID__] = [
  "engine" => 2,
  "country" => 162,
  "devices" => ["desktop", "mobile"]
];
$data["groups"][__GROUP_2_ID__] = [
  "title" => "new group 2",
  "engine" => 2,
  "country" => 168,
];

//Create groups.
print_r($monitoringGroup->updateMultiple( $data ));


/*
Example output


stdClass Object
(
    [params] => stdClass Object
        (
            [groups] => stdClass Object
                (
                    [__GROUP_1_ID__] => stdClass Object
                        (
                            [engine] => 2
                            [country] => 162
                            [devices] => Array
                                (
                                    [0] => desktop
                                    [1] => mobile
                                )

                        )

                    [__GROUP_2_ID__] => stdClass Object
                        (
                            [title] => new group 2
                            [engine] => 2
                            [country] => 168
                        )

                )

        )

    [result] => stdClass Object
        (
            [id] => stdClass Object
                (
                    [__GROUP_1_ID__] => 1
                    [__GROUP_2_ID__] => 1
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */