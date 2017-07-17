<?php 
/**
 * Example: Keywords parameters.
 * 
 * Parameters are passed while calling API request function.
 * All parameters that are not set will be taken by it's default value.
 * 
 * Parameters are passed as associative array with structure (values in brackets are default):
 * [
 *   "domains" = [ string, ... ]
 *   "gap" = ("monthly") / " weekly" / "daily"
 *   "date" = [
 *     "min": string, date in format Ymd
 *     "max": string, date in format Ymd
 *   ]
 *   "filters" = [ ]
 * ]
 * 
 * The "domains" array is only required parameter, it should contain 1 to 5 domains.
 * 
 * The "gap" is string that defines how data will be aggregated.
 *   Default is "monthly" which means data will be aggregated by months, and including any month that is in date range.
 * 
 * The "date" array defines date range.
 *   It requires string in Ymd format, in example below there is daterange set from 25th May 2017 to 14th June 2017.
 * 
 * The "filters" array is set of filters to apply, those are explained in separated examples FiltersUsage.php and FiltersExplain.php.
 *   Warning! Filters does not take effect when gap is set to "monthly".
 * 
 */

use SemstormApi\Semstorm;
use SemstormApi\Explorer\ExplorerDomains;

Semstorm::init( __ACCESS_TOKEN__ );

$explorerDomains = new ExplorerDomains();

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
print_r($explorerDomains->visibility($params));
//Try weekly gap.
$params['gap'] = 'weekly';
print_r($explorerDomains->visibility($params));
//Try daily gap.
$params['gap'] = 'daily';
print_r($explorerDomains->visibility($params));