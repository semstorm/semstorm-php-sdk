<?php
/**
 * Example: Error while retrieve non existing campaign.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

//Retrieve campaign with wrong id.
printf("Campaign with id '12453':\n");
print_r($monitoringCampaign->retrieve( 12453 ));


/*
Example output


Campaign with id '12453':
stdClass Object
(
    [error] => stdClass Object
        (
            [message] => (404) No entry for given id.
        )

)
 */