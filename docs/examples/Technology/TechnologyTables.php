<?php 
/**
 * Example: Technology tables.
 * 
 * Retrieve table of technologies.
 */

use SemstormApi\Semstorm;
use SemstormApi\Technology\TechnologyTables;

Semstorm::init( __ACCESS_TOKEN__ );

$technologyTables = new TechnologyTables();

print_r( $technologyTables->retrieve("technologies") );


/*
 Example output


Array
(
    [params] => Array
    (
        [table] => technologies
        )

    [results] => Array
    (
        [technologies] => Array
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
                        )

                    )

                )
            
            (...)
*/

