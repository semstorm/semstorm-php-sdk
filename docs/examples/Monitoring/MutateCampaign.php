<?php
/**
 * Example: Monitoring mutate campaign.
 * 
 * Simple example how to mutate Campaign.
 */

use SemstormApi\Semstorm;
use SemstormApi\Monitoring\MonitoringCampaign;
Semstorm::init( __ACCESS_TOKEN__ );

$monitoringCampaign = new MonitoringCampaign();

printf("Campaign with id 7189:\n");
print_r($monitoringCampaign->retrieve(7189));
print_r($monitoringCampaign->stop(7189));
print_r($monitoringCampaign->retrieve(7189));
print_r($monitoringCampaign->start(7189));
print_r($monitoringCampaign->retrieve(7189));

$params = [];
$params['id'] = 7189;
$params['domain'] = 'abc.pl';
print_r($monitoringCampaign->retrieve(7189));
print_r($monitoringCampaign->update($params));
print_r($monitoringCampaign->retrieve(7189));
$params['domain'] = 'answear.com';
print_r($monitoringCampaign->update($params));
print_r($monitoringCampaign->retrieve(7189));







