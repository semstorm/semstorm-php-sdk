<?php 
/**
 * Example: Explorer visibility.
 * 
 * Parameters are passed while calling API request function.
 * All parameters that are not set will be taken by it's default value.
 * 
 * The "domains" array is only required parameter, it should contain 1 to 5 domains.
 * 
 * The "gap" is string that defines how data will be aggregated.
 *   Default is "monthly" which means data will be aggregated by months, and including any month that is in date range.
 * 
 * The "date" array defines date range.
 *   It requires string in YYYYMMDD format, in example below there is date range set from 25th May 2017 to 14th June 2017.
 * 
 */

use SemstormApi\Semstorm;
use SemstormApi\Explorer\ExplorerVisibility;

Semstorm::init( __ACCESS_TOKEN__ );

$explorerVisibility = new ExplorerVisibility();

$params = [];
//Take some desired domain(s).
$params['domains'] = ['example.com','another-example.com'];
//Set date range in format Ymd.
$params['date'] = [
  'min' => '20170525',
  'max' => '20170614'
];
//Try monthly gap.
$params['gap'] = 'monthly';
print_r($explorerVisibility->getData($params));
//Try weekly gap.
$params['gap'] = 'weekly';
print_r($explorerVisibility->getData($params));
//Try daily gap.
$params['gap'] = 'daily';
print_r($explorerVisibility->getData($params));