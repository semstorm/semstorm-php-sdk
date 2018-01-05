<?php
/**
 * Example: Monitoring list campaigns.
 * 
 * Returns list of campaigns ids.
 */

//If you are not using MonitoringExamples.php script uncomment two lines below and put your services access token.
//use SemstormApi\Semstorm;
//Semstorm::init( __ACCESS_TOKEN__ );

use SemstormApi\Monitoring\MonitoringCampaign;

//New monitoring campaign object to manage campaigns.
$monitoringCampaign = new MonitoringCampaign();

//Set params.
$data = [];
$data['type'] = "seo";
$data['pager']['items_per_page'] = 25;
$data['pager']['page'] = 1;
$data['filters']['engine'] = 2;

//List campaigns.
printf("List seo campaigns with Google engine from 26 to 50:\n");
print_r($monitoringCampaign->getList( $data ));


/*
Example output


List seo campaigns with Google engine from 26 to 50:
Array
(
    [params] => Array
        (
            [type] => seo
            [pager] => Array
                (
                    [items_per_page] => 25
                    [page] => 1
                )

            [filters] => Array
                (
                    [engine] => 2
                )

        )

    [result] => Array
        (
            [count] => 76
            [campaigns] => Array
                (
                    [0] => Array
                        (
                            [id] => 1234
                            [access] => owner
                            [status] => active
                            [domain] => example.com
                            [type] => seo
                        )

                    [1] => Array
                        (
                            [id] => 1235
                            [access] => manager
                            [status] => active
                            [domain] => example.pl
                            [type] => seo
                        )
                        
                    (...)
                )

        )

    [_credits] => 0
    [_credits_left] => 80
)

 */