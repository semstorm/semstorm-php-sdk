<?php
/**
 * Example: Monitoring tables engines.
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
stdClass Object
(
    [params] => stdClass Object
        (
            [table] => engines
        )

    [result] => stdClass Object
        (
            [engines] => Array
                (
                    [0] => stdClass Object
                        (
                            [name] => Bing
                            [id] => 272
                            [countries] => Array
                                (
                                    [0] => stdClass Object
                                        (
                                            [name] => Arabia Saudyjska
                                            [id] => 302
                                        )
        
                                    [1] => stdClass Object
                                        (
                                            [name] => Argentyna
                                            [id] => 274
                                        )
                                        
                                        (...)
                                        
                                    [34] => stdClass Object
                                        (
                                            [name] => Włochy
                                            [id] => 291
                                        )
        
                                )
        
                        )
        
                    [1] => stdClass Object
                        (
                            [name] => Google
                            [id] => 2
                            [countries] => Array
                                (
                                    [0] => stdClass Object
                                        (
                                            [name] => Afghanistan
                                            [id] => 3
                                        )
        
                                    [1] => stdClass Object
                                        (
                                            [name] => Albania
                                            [id] => 4
                                        )
                                        
                                        (...)
                                        
                                    [186] => stdClass Object
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