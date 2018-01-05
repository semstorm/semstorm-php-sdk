<?php
/**
 * Example: Monitoring tables engines.
 * 
 * Return information about all possible engines and countries variations.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringTables;

//New monitoring tables object to retrieve tables.
$monitoringTables = new MonitoringTables();

//Start keywords.
printf("Engines:\n");
print_r($monitoringTables->retrieve("engines"));


/*
Example output


Engines:
Array
(
    [params] => Array
        (
            [table] => engines
        )

    [result] => Array
        (
            [engines] => Array
                (
                    [0] => Array
                        (
                            [name] => Bing
                            [id] => 272
                            [countries] => Array
                                (
                                    [0] => Array
                                        (
                                            [name] => Arabia Saudyjska
                                            [id] => 302
                                        )
        
                                    [1] => Array
                                        (
                                            [name] => Argentyna
                                            [id] => 274
                                        )
                                        
                                        (...)
                                        
                                    [34] => Array
                                        (
                                            [name] => Włochy
                                            [id] => 291
                                        )
        
                                )
        
                        )
        
                    [1] => Array
                        (
                            [name] => Google
                            [id] => 2
                            [countries] => Array
                                (
                                    [0] => Array
                                        (
                                            [name] => Afghanistan
                                            [id] => 3
                                        )
        
                                    [1] => Array
                                        (
                                            [name] => Albania
                                            [id] => 4
                                        )
                                        
                                        (...)
                                        
                                    [186] => Array
                                        (
                                            [name] => Zimbabwe
                                            [id] => 235
                                        )
        
                                )
        
                        )
                        
                        (...)
                        
                        
                )
        )
    [_credits] => 0
    [_credits_left] => 80
)

*/