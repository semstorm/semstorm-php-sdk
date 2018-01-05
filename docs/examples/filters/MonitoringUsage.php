<?php
/**
 * Example: Using filters in Monitoring endpoints.
 * 
 * Below are examples with explanation, how to obtain various filtered results.
 */

use SemstormApi\Semstorm;
use SemstormApi\Monitoring\MonitoringCampaign;
Semstorm::init( __ACCESS_TOKEN__ );

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

/**
 * Retrieve campaign data only for keywords with word 'kredyt' in it.
 */
// Only keywords which contains word 'kredyt'.
$filters = [];
$filters[] = [
  'field' => 'keyword',
  'value' => 'kredyt',
  'operand' => 'contains',
];

// Parameters array.
$params = [];
$params['id'] = __CAMPAIGN_1_ID__;

// Put filter into parameters.
$params['filters'] = [];
$params['filters'] = $filters;

// Make API call with filters appended.
$response = $monitoringCampaign -> getData( $params );

//See whole response.
print_r( $response );

/**
 * Retrieve keywords on which domain example.com have rose up in SERP,
 * and only keywords which points to example.com sites with word 'forum' in its url.
 */

/*
// Domain filters.
$domain = 'example.com';
// Only keywords with posistion change 1 or more (equals to "up") for given domain.
$filters = [];
$filters[] = [
  'field' => 'position_change',
  'value' => 1,
  'operand' => 'more',
  'domain' => $domain,
];
//Only urls which contain 'forum'.
$filters[] = [
  'field' => 'url',
  'value' => 'forum',
  'operand' => 'contains',
  'domain' => $domain,
];

// Parameters array.
$params = [ ];
$params['domains'] = [
  'example.com',
  'another-example.com'
];
// Put set of filters into parameters.
$params['filters'] = $filters;

// Make API call with filters appended.
$response = $explorerKeywords -> getData( $params );

//See whole response.
print_r( $response );
*/

