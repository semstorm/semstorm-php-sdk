<?php
/**
 * Example: Using filters.
 * 
 * To make possible intuitive usage of filters exist helper class SemstormApi\Explorer\ExplorerFilters
 * which translates human readable condition into proper filter paramters.
 * 
 * Below are examples with explanation, what kind of results are retrieved.
 */

use SemstormApi\Semstorm;
use SemstormApi\Explorer\ExplorerOrganic;
use SemstormApi\Explorer\ExplorerFilters;
Semstorm::init( __ACCESS_TOKEN__ );

$explorerOrganic = new ExplorerOrganic();
$filters = new ExplorerFilters();

/**
 * Retrieve keywords on which domains mbank.pl and bzwbk.pl are visible,
 * and only keywords with word 'kredyt' in it.
 */
// Only keywords which contains word 'kredyt'.
$filters -> addFilter( 'keyword', 'kredyt', 'contains' );

// Parameters array.
$params = [ ];
$params['domains'] = [
  'mbank.pl',
  'bzwbk.pl'
];
// Put set of filters into parameters.
$params['filters'] = $filters -> getFilters();

// Make API call with filters appended.
$response = $explorerOrganic -> keywords( $params );

//See whole response.
print_r( $response );

/**
 * Retrieve keywords on which domain mbank.pl have rose up in SERP,
 * and only keywords which points to mbank.pl sites with word 'forum' in its url.
 */
//Reset filters.
$filters -> removeFilters();

// Domain filters.
$domain = 'mbank.pl';
// Only keywords with posistion change 1 or more (equals to "up") for given domain.
$filters -> addFilter( 'position_change', 1, 'more', $domain );
//Only urls which contain 'forum'.
$filters->addFilter('url','forum','contains', $domain);

// Parameters array.
$params = [ ];
$params['domains'] = [
  'mbank.pl',
  'bzwbk.pl'
];
// Put set of filters into parameters.
$params['filters'] = $filters -> getFilters();

// Make API call with filters appended.
$response = $explorerOrganic -> keywords( $params );

//See whole response.
print_r( $response );





