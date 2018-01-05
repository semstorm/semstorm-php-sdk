<?php
/**
 * Example: Monitoring get campaigns access.
 * 
 * Return list of all accessible campaigns with access type and their owners.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

//Delete campaign.
print_r($monitoringCampaign->getAccess());


/*
Example output


Array
(
    [params] => []
    [result] => Array
        (
            [1234] => Array
                (
                    [access] => owner
                    [owner] => person@domain.com
                )

            [1235] => Array
                (
                    [access] => owner
                    [owner] => person@domain.com
                )
                
                (...)

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */