<?php 
/**
 * Example: Technology list.
 * 
 * Retrieve table of technologies.
 */

use SemstormApi\Semstorm;
use SemstormApi\Technology\Technology;

Semstorm::init( __ACCESS_TOKEN__ );

$technology = new Technology();

$params = array();
$params['filters'] = array();

//Include technology "WordPress" and "WWW servers".
$params['filters']['technology'] = array(1208, 333);

print_r( $technology->list($params) );


/*
 Example output


Array
(
    [params] => Array
    (
        [filters] => Array
        (
            [technology] => Array
            (
                [0] => 1208
                [1] => 333
            )

        )

        [pager] => Array
        (
            [items_per_page] => 25
            [page] => 0
        )

    )

    [results] => Array
    (
        [domains] => Array
        (
            [0] => Array
            (
                [technologies] => Array
                (
                    [0] => 1516
                    [1] => 334
                    )

                [domain] => wikipedia.org
                [subdomain] =>
                [domain_size] => 4
                [keywords] => 11653191
                [traffic] => 172564223
            )
            
            
            (...)
            
            
        [technologies_count] => Array
            (
                [1983] => Array
                (
                    [id] => 1983
                    [name] => Accounting
                    [children] => Array
                    (
                        [2283] => Array
                        (
                            [id] => 2283
                            [name] => Akaunting
                            [count] => 0
                        )
            
                    )
            
                    [count] => 0
                )
            
            (...)
        
*/

