<?php
/**
 * Example: Organic keywords new / ups / downs / lost.
 *
 * Organic keywords have one unique option. When requesting them
 * it is possible to add one extra parameter to parameters array.
 * It is "keyword_filter" which is default to "all" but can be set to
 * "new" / "up" / "down" / "lost". It allows to filter keywords by
 * their position compared to previous data.
 *
 * It works only for one domain, if working with multiple domains, this filter
 * will affect first domain.
 *
 * When option set to "new" it will show keywords on which previously
 * domain wasn't visible at all, but now is.
 *
 * When option set to "up" it will show keywords on which previously
 * domain was visible at lower position than now.
 *
 * When option set to "down" it will show keywords on which previously
 * domain was visible at higher position than now.
 *
 * When option set to "lost" it will show keywords on which previously
 * domain was visible, but now is not. Warning! This is special case
 * beacuse domain is no longer visible on thise keywords, so field
 * "position" will show previous position. See example below.
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

//API call.
$response = $explorerKeywords->getData($params);

printf( "Keyword '%s' have %s montly search volume!\nSite example.com was visible on this keyword on %s posistion, and now its gone.\n",
  $response['results'][0]['keyword'],
  $response['results'][0]['volume'],
  $response['results'][0]['position']['example.com']
);


