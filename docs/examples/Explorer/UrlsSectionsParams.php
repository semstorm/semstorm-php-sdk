<?php 
/**
 * Example: Keywords parameters.
 * 
 * Parameters are passed while calling API request function.
 * All parameters that are not set will be taken by it's default value.
 * 
 * Parameters are passed as associative array with structure (values in brackets are default):
 * [
 *   'domains' = [ strings ]
 *   'section' = 0 / 1 / 2 nesting level
 *   'sections' = [ strings ] array with parent elements
 *   'gap' = ('monthly') / 'weekly' / 'daily'
 *   'filters' = []
 * ]
 * 
 * The "domains" array is only required parameter, it should contain 1 to 5 domains.
 * 
 * The "section" is int indicating nesting level of section, defaults to 0 which is domain itself.
 *   For higher levels it is required to add proper elements to "sections" array.
 *   
 * TODO: The "sections" ...
 * 
 * The "filters" array is set of filters to apply, those are explained in separated examples FiltersUsage.php and FiltersExplain.php.
 * 
 */
use SemstormApi\Semstorm;
Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Explorer\ExplorerUrls;
$explorerUrls = new ExplorerUrls();

$params = [];
$params['domains'] = ['semstorm.com'];
//Default root section (0) without sections above.
print_r($explorerUrls->sections($params));

//Second level section from /pl/blog
$params['section'] = 2;
$params['sections'] = ['pl','blog'];
print_r($explorerUrls->sections($params));
