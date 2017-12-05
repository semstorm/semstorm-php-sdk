<?php
/**
 * Example: Authorization error, when access token is invalid.
 */

//If you are not using MonitoringExamples.php script line below.
//use SemstormApi\Semstorm;

//Put INVALID access token.
Semstorm::init( 'non-valid-access-token' );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

//Retrieve any campaign - it will fail anyway.
printf("Campaign with id '12453':\n");
print_r($monitoringCampaign->retrieve( 12453 ));


/*
Example output


Campaign with id '12453':
Array
(
    [0] => Unauthorised access.
)

 */