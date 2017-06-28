<?php 
/**
 * Example: Explaining filters.
 * 
 * In this example there is no API calls, just
 * collections of filters with short description of their meaning.
 * 
 * For example with filters usage see FiltersUsage.php.
 *
 * To make possible intuitive usage of filters exist helper class SemstormApi\Explorer\ExplorerFilters
 * which translates human readable condition into proper filter paramters.
 * 
 * Below are listed some of possible filters which can be created using ExplorerFilters.
 */

use SemstormApi\Explorer\ExplorerFilters;
Semstorm::init( __ACCESS_TOKEN__ );

$filters = new ExplorerFilters();

//Keywords filters.
//Only one keyword: 'kredyt'.
$filters->addFilter('keyword','kredyt','equal');
//Only keywords which contains word 'kredyt'.
$filters->addFilter('keyword','kredyt','contains');
//Only keywords with at least 4 words.
$filters->addFilter('keyword','.* .* .* .*','regexp');
//Only keywords that contains word "łazienka".
$filters->addFilter('keyword','łazienka','contains');
//Only keywords with synonyms of word "bank" in it.
$filters->addFilter('keyword','bank','synonym');
//Only keywords with competitors of level 6 and higher.
$filters->addFilter('cp',6,'more');
//Only keywords with competitors between 2 and 7.
$filters->addFilter('cp',[2,7],'between');
//Only keywords with search volume less than 6000.
$filters->addFilter('volume',6000,'less');
//Only keywords with CPC between 1 and 5.
$filters->addFilter('cpc',[1,5],'between');

//Domain filters.
$domain = 'mbank.pl';
//Only keywords with posistion change 1 or more (equals to "up") for given domain.
$filters->addFilter('position_change', 1, 'more', $domain);
//Only keywords with posistion change between -2 and 2 for given domain - keywords with small change.
$filters->addFilter('position_change', [-2,2], 'between', $domain);
//Only urls which subdomain contains word "forum".
$filters->addFilter('subdomain', 'forum', 'contains', $domain);
//Only keywords which have traffic for domain between 5 and 90.
$filters->addFilter('traffic',[5,90],'between',$domain);
//Only keywords on which domain are in top 3.
$filters->addFilter('position', [1,3], 'between', $domain);
//Only keywords on which domain are in top 3.
$filters->addFilter('position', [1,3], 'between', $domain);
//Only keywords on which domain are in 21+ position.
$filters->addFilter('position', [21,50], 'between', $domain);
//Only urls which contain 'forum'.
$filters->addFilter('url','forum','contains', $domain);
//Only urls which starts on domain (no subdomains included).
$filters->addFilter('url',$domain . '*','contains', $domain);


