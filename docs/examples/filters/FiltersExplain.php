<?php 
/**
 * Example: Explaining filters.
 * 
 * In this example there is no API calls, just
 * collections of filters with short description of their meaning.
 * 
 * For example with filters usage see FiltersUsage.php.
 *
 * To know more about filters see documentation. 
 * 
 * Below are listed some of possible filters, which should be enough to prepare most of requests.
 */

use SemstormApi\Semstorm;
Semstorm::init( __ACCESS_TOKEN__ );


//Keywords filters.
//Only one keyword: 'kredyt' - operand 'equal' is default so it works same way without it.
$filter = [
  'field' => 'keyword',
  'value' => 'kredyt',
  'operand' => 'equal',
];
//Only keywords which contains word 'kredyt'.
$filter = [
  'field' => 'keyword',
  'value' => 'kredyt',
  'operand' => 'contains',
];
//Only keywords with at least 4 words.
$filter = [
  'field' => 'keyword',
  'value' => '.* .* .* .*',
  'operand' => 'regexp',
];
//Only keywords that contains word "łazienka".
$filter = [
  'field' => 'keyword',
  'value' => 'łazienka',
  'operand' => 'contains',
];
//Only keywords with synonyms of word "bank" in it.
$filter = [
  'field' => 'keyword',
  'value' => 'bank',
  'operand' => 'synonym',
];
//Only keywords with competitors of level 6 and higher.
$filter = [
  'field' => 'cp',
  'value' => 6,
  'operand' => 'more',
];
//Only keywords with competitors between 2 and 7.
$filter = [
  'field' => 'cp',
  'value' => [2,7],
  'operand' => 'between',
];
//Only keywords with search volume less than 6000.
$filter = [
  'field' => 'volume',
  'value' => 6000,
  'operand' => 'less',
];
//Only keywords with CPC between 1 and 5.
$filter = [
  'field' => 'cpc',
  'value' => [1,5],
  'operand' => 'between',
];

//Domain filters.
$domain = 'mbank.pl';
//Only keywords with posistion change 1 or more (equals to "up") for given domain.
$filter = [
  'field' => 'position_change',
  'value' => 1,
  'operand' => 'more',
  'domain' => $domain,
];
//Only keywords with posistion change between -2 and 2 for given domain - keywords with small change.
$filter = [
  'field' => 'position_change',
  'value' => [-2,2],
  'operand' => 'between',
  'domain' => $domain,
];
//Only urls which subdomain contains word "forum".
$filter = [
  'field' => 'subdomain',
  'value' => 'forum',
  'operand' => 'contains',
  'domain' => $domain,
];
//Only keywords which have traffic for domain between 5 and 90.
$filter = [
  'field' => 'traffic',
  'value' => [5,90],
  'operand' => 'between',
  'domain' => $domain,
];
//Only keywords on which domain are in top 3.
$filter = [
  'field' => 'position',
  'value' => [1,3],
  'operand' => 'between',
  'domain' => $domain,
];
//Only keywords on which domain are in 21+ position.
$filter = [
  'field' => 'position',
  'value' => [21,50],
  'operand' => 'between',
  'domain' => $domain,
];
//Only urls which contain 'forum'.
$filter = [
  'field' => 'url',
  'value' => 'forum',
  'operand' => 'contains',
  'domain' => $domain,
];
//Only urls which starts on domain (no subdomains included).
$filter = [
  'field' => 'url',
  'value' => $domain . '*',
  'operand' => 'contains',
  'domain' => $domain,
];


