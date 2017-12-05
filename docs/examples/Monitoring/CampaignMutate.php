<?php
/**
 * Example: Monitoring mutate campaign.
 * 
 * Simple example how to mutate Campaign.
 */

use SemstormApi\Semstorm;
use SemstormApi\Monitoring\MonitoringCampaign;

//If you are not using MonitoringExamples.php script uncomment line below and put there your services access token.
//Semstorm::init( __ACCESS_TOKEN__);

$monitoringCampaign = new MonitoringCampaign();
//Change campaign status.
printf("Campaign with id '" . __ID__ . "':\n");
print_r($monitoringCampaign->retrieve(__ID__));
print_r($monitoringCampaign->stop(__ID__));
print_r($monitoringCampaign->retrieve(__ID__));
print_r($monitoringCampaign->start(__ID__));
print_r($monitoringCampaign->retrieve(__ID__));

//Modify campaign domain.
$params = [];
$params['domain'] = 'example.com';
print_r($monitoringCampaign->retrieve(__ID__));
print_r($monitoringCampaign->update(__ID__, $params));
print_r($monitoringCampaign->retrieve(__ID__));
$params['domain'] = 'abc.pl';
print_r($monitoringCampaign->update(__ID__, $params));
print_r($monitoringCampaign->retrieve(__ID__));

//Create campaign.
$data = [];
$data['domain'] = 'example.com';
print_r($monitoringCampaign->create($data));





