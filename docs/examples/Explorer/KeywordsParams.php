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
 *   "pager" = [
 *     "items_per_page": 10 / (25) / 50 / 100 / 250 / 500
 *     "page": any int (0)
 *   ],
 *   "sorting" = [
 *     "sort": ("asc") / "desc"
 *     "field": 'field_keyword' / 'field_position:X' / 'field_position_c:X' / 'field_traffic:X' / 'field_url:X' / 'field_keyword_searches' / 'field_keyword_cp_r' / 'field_keyword_cpc' / 'facet_count' / 'field_traffic'
 *   ]
 *   "logic_conjunction" = ("and") / " or"
 *   "keyword_filter" = ("all") / "new" / "up" / "down" / "lost"
 *   "get_row_count" = (null) / true
 *   "filters" = [ ]
 * ]
 * 
 * The "domains" array is only required parameter, it should contain from 1 to 5 domains.
 * 
 * The "pager" is associative array which allows to iterate through all set of results.
 *   Defines offset and limit of results (eg 3rd page with 50 rows per page equals results from 101 to 150).
 *   "items_per_page" defines how big should be pages we iterate through with possible values listed above.
 *   "page" indicates page number starting from 0. When too high page will be requested (over existing results count)
 *     empty results will be returned.
 * 
 * The "sorting" is associative array defining sorting options, which is field to sort by and sorting direction.
 *   "sort" defines sorting direction - ascending or descending.
 *     "asc" will sort results from lowest to highest (strings are taken into account).
 *     "desc" will sort results from highest to lowest (strings are taken into account).
 *   Some fields need to points to specific domains (those with :X in the end).
 * 
 * The "logic_conjunction" string indicates if results should be logical conjunction (and) or logical disjunction (or).
 *   Is used only when defining multiple domains to examine, so when working on one domain this parameter will ignored.
 *   "and" will require that results must be present in every domain set.
 *   "or" will take results from all domains.
 * 
 * The "keywords_filter" string is used only when retrieving organic keywords, those are equals to data of in-system tabs with corresponding names.
 * 
 * The "get_row_count" string is used when there is need to retrieve only number of results for given request, as it request require less computing,
 *   and response is smaller it is very quick. Might be useful when looping through all results.
 *   THere is example in LoopRequest.php example.
 *   
 * The "filters" array is set of filters to apply, those are explained in separated examples FiltersUsage.php and FiltersExplain.php.
 * 
 */

use SemstormApi\Semstorm;
use SemstormApi\Explorer\ExplorerKeywords;
Semstorm::init( __ACCESS_TOKEN__ );

$explorerKeywords = new ExplorerKeywords();

//Domains are required.
$params = [];
$params['domains'] = ['example.com', 'another-example.com'];

//API call.
$response = $explorerKeywords->getData($params);
$responseParams = $response->params;
$keywordsCount = $response->results_count;

//Print call params.
printf("Call API with default parameters:\n");
print_r($responseParams);

//Print results count.
printf("Sum of common ('and' conjuntion) keywords for both domains:\n");
print_r($keywordsCount);

//Print part of data.
foreach ($params['domains'] as $domain){
  printf( "\n\nMostly searched keyword on which domain %s is visible is '%s'.\nIt points to url: %s,\nand gives traffic to this site equals to %s.",
    $domain,
    $response->results[0]->keyword,
    $response->results[0]->url->$domain,
    $response->results[0]->traffic->$domain
  );
}

