<?php
/**
 * Example: Monitoring mutate campaign.
 * 
 * Simple example how to mutate Campaign.
 */

use SemstormApi\Semstorm;
use SemstormApi\Monitoring\MonitoringCampaign;
Semstorm::init( __ACCESS_TOKEN__);

$monitoringCampaign = new MonitoringCampaign();
//Change campaign status.
printf("Campaign with id 44803:\n");
print_r($monitoringCampaign->retrieve(44803));
print_r($monitoringCampaign->stop(44803));
print_r($monitoringCampaign->retrieve(44803));
print_r($monitoringCampaign->start(44803));
print_r($monitoringCampaign->retrieve(44803));

//Modify campaign domain.
$params = [];
$params['domain'] = 'example.com';
print_r($monitoringCampaign->retrieve(44803));
print_r($monitoringCampaign->update(44803, $params));
print_r($monitoringCampaign->retrieve(44803));
$params['domain'] = 'abc.pl';
print_r($monitoringCampaign->update(44803, $params));
print_r($monitoringCampaign->retrieve(44803));

//Create campaign.
$data = [];
$data['domain'] = 'example.com';
print_r($monitoringCampaign->create($data));





