<?php
/**
 * Example: Error while retrieve non existing campaign.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringGroup;

//Ids array where two are proper group ids and two are invalid.
$ids = [
  __GROUP_1_ID__,
  54320,
  __GROUP_2_ID__,
  54321
];

//New monitoring group object to manage groups.
$monitoringGroup = new MonitoringGroup();

//Stop group.
print_r($monitoringGroup->stop( $ids ));


/*
Example output


Array
(
    [error] => Array
        (
            [statuses] => Array
                (
                    [__GROUP_1_ID__] => 1
                    [54320] => 
                    [__GROUP_2_ID__] => 1
                    [54321] => 
                )

            [message] => (404) No entry for given id.
        )

)

 */