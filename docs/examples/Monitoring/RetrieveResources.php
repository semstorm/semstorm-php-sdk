<?php
/**
 * Example: Monitoring retrieve resources.
 *
 */

use SemstormApi\Semstorm;
use SemstormApi\Monitoring\MonitoringCampaign;
use SemstormApi\Monitoring\MonitoringGroup;
use SemstormApi\Monitoring\MonitoringKeyword;
use SemstormApi\Monitoring\MonitoringTag;
//Semstorm::init( __ACCESS_TOKEN__ );

$monitoringCampaign = new MonitoringCampaign();
$pager = [];
$pager['items_per_page'] = 50;
$pager['page'] = 0;
printf("First 50 campaigns ids:\n");
print_r($monitoringCampaign->getList($pager));

printf("Campaign with id 7189:\n");
print_r($monitoringCampaign->retrieve(7189));

$monitoringGroup = new MonitoringGroup();
$params = [];
$params['items_per_page'] = 50;
$params['page'] = 0;
$params['campaign_id'] = 7189;
printf("First 50 groups ids for campaign with id 7189:\n");
print_r($monitoringGroup->getList($params));

printf("Group with id 7190:\n");
print_r($monitoringGroup->retrieve(7190));

$monitoringKeyword = new MonitoringKeyword();
printf("Keyword with id 461545:\n");
print_r($monitoringKeyword->retrieve(461545));

$monitoringTag = new MonitoringTag();
$params = [];
$params['items_per_page'] = 50;
$params['page'] = 0;
$params['campaign_id'] = 7189;
printf("First 50 tags ids for campaign with id 7189:\n");
print_r($monitoringTag->getList($params));


















