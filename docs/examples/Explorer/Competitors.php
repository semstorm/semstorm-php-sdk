<?php 
/**
 * Example: Explorer competitors.
 * 
 * Parameters are passed while calling API request function.
 * All parameters that are not set will be taken by it's default value.
 * 
 * The "domains" array is only required parameter, it should contain 1 to 5 domains.
 * 
 * The "result_type" is string that defines whether retrieve organic or paid data. Possible values: "organic", "paid".
 * 
 */

use SemstormApi\Semstorm;
use SemstormApi\Explorer\ExplorerCompetitors;

Semstorm::init( __ACCESS_TOKEN__ );

$explorerCompetitors = new ExplorerCompetitors();

$params = [];
//Take some desired domain(s).
$params['domains'] = ['example.com','another-example.com'];
print_r($explorerCompetitors->getData($params));