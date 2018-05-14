<?php
/**
 * Example: Loop requests.
 *
 * Show simple way to retrieve all data from API.
 */

use SemstormApi\Semstorm;
use SemstormApi\Explorer\ExplorerKeywords;
Semstorm::init( __ACCESS_TOKEN__ );

$explorerKeywords = new ExplorerKeywords();

//Domains are required.
$params = [];
$params['domains'] = ['example.com'];
//Set keyword filter on 'lost'.
$params['keyword_filter'] = 'lost';
//At first get row count.
$params['get_row_count'] = true;

//API call.
$response = $explorerKeywords->getData($params);
$count = $response['results']['results_count'];
print_r($response);
//Now prepare variables to get through all results.
unset($params['get_row_count']);
$params['pager']['page'] = 0;
$params['pager']['items_per_page'] = 250;

while($params['pager']['page'] * $params['pager']['items_per_page'] < $count){
  sleep(2);
  $response = $explorerKeywords->getData($params);

  printf( "Keyword '%s' have %s montly search volume!\nSite example.com was visible on this keyword on %s posistion, and now its gone.\n",
      $response['results'][0]['keyword'],
      $response['results'][0]['volume'],
      $response['results'][0]['position']['example.com']
      );

  $params['pager']['page']++;
}
