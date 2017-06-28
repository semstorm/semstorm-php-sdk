<?php
/**
 * Example: Loop requests.
 *
 * Show simple way to retrieve all data from API.
 */

use SemstormApi\Semstorm;
use SemstormApi\Explorer\ExplorerOrganic;
Semstorm::init( __ACCESS_TOKEN__ );

$explorerOrganic = new ExplorerOrganic();

//Domains are required.
$params = [];
$params['domains'] = ['bokaro.pl'];
//Set keyword filter on 'lost'.
$params['keyword_filter'] = 'lost';
//At first get row count.
$params['get_row_count'] = true;

//API call.
$response = $explorerOrganic->keywords($params);
$count = $response->results_count;

//Now prepare variables to get through all results.
unset($params['get_row_count']);
$params['pager']['page'] = 0;
$params['pager']['items_per_page'] = 250;

while($params['pager']['page'] * $params['pager']['items_per_page'] < $count){
  sleep(2);
  $response = $explorerOrganic->keywords($params);
  
  printf( "Keyword '%s' have %s montly search volume!\nSite bokaro.pl was visible on this keyword on %s posistion, and now its gone.\n",
    $response->results[0]->keyword,
    $response->results[0]->volume,
    $response->results[0]->position->{'bokaro.pl'}
  );
  
  $params['pager']['page']++;
}


















