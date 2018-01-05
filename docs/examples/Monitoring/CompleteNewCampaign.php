<?php
/**
 * Example: Complete example about how to create and cofigure new campaign with keywords ready to be scanned.
 * 
 * First create empty campaign. Then add groups with proper configuration to this campaign.
 * In the end add keywords to groups.
 * 
 * IMPORTANT:
 *   - Creating new items (creation of empty group excluded) make use of limits from account. If any of those
 *     limits would be excced API would return error. In example below execution of script is terminated,
 *     in your script it should be properly handled.
 */

// Put this script to folder where you installed SEMSTORM PHP SDK API, or change directory to this place.
require __DIR__ . '/vendor/autoload.php';

use SemstormApi\Semstorm;
use SemstormApi\Monitoring\MonitoringCampaign;
use SemstormApi\Monitoring\MonitoringGroup;
use SemstormApi\Monitoring\MonitoringKeyword;

// ####
// Fill your access token.
// ####
$accessToken = "123456789abdefghi987654321qwertyABCDEFGH";


// ####
// Script start.
// ####
$completeNewCampaign = new CompleteNewCampaign();
$completeNewCampaign -> work( $accessToken );


class CompleteNewCampaign {

  function work($token) {
    try {
      // Step 0 - initialize.
      // Initialize api.
      Semstorm::init( $token );
      // New monitoring campaign object to handle all campaign requests.
      $monitoringCampaign = new MonitoringCampaign();
      // New monitoring group object to handle all group requests.
      $monitoringGroup = new MonitoringGroup();
      // New monitoring keyword object to handle all keyword requests.
      $monitoringKeyword = new MonitoringKeyword();
      
      // Setp 1 - create empty campaign.
      // Create campaign with domain from configuration.
      $data = [ ];
      $data['domain'] = "wp.pl";
      $result = $this -> getApiResults( $monitoringCampaign -> create( $data ) );
      // Save campaign id.
      $campaignId = $result['id'];
      
      // Step 2 - add groups to campaign.
      // We create two groups, one with location on warsaw with
      // both devices, and one without location with desktop only.
      $data = [ ];
      $data["campaign_id"] = $campaignId;
      $data["groups"] = [ ];
      $data["groups"]["group_1"] = [ 
        "title" => "Warsaw - mobile and desktop",
        "engine" => 2,
        "country" => 168,
        "location" => "warszawa",
        "devices" => [ 
          "desktop",
          "mobile" 
        ] 
      ];
      $data["groups"]["group_2"] = [ 
        "title" => "Global - desktop",
        "engine" => 2,
        "country" => 168,
        "devices" => [ 
          "desktop" 
        ] 
      ];
      // Create groups.
      $result = $this -> getApiResults( $monitoringGroup -> createMultiple( $data ) );
      // Save groups ids.
      $groupIdWarsaw = $result['id']["group_1"];
      $groupIdGlobal = $result['id']["group_2"];
      
      // Step 3 - add keywords to groups.
      $keywordsIds = [ ];
      // Create keywords for Warsaw group.
      $data = [ ];
      $data['group_id'] = $groupIdWarsaw;
      $data['keywords'] = [ 
        "examples warsaw",
        "nice examples warsaw",
        "how to example",
        "example",
        "examples" 
      ];
      $result = $this -> getApiResults( $monitoringKeyword -> create( $data ) );
      // Save keywords ids.
      $keywordsIds = $result['id'];
      // Create keywords for Global group.
      $data = [ ];
      $data['group_id'] = $groupIdGlobal;
      $data['keywords'] = [ 
        "nice examples",
        "how to example",
        "example",
        "examples" 
      ];
      $result = $this -> getApiResults( $monitoringKeyword -> create( $data ) );
      // Save keywords ids.
      $keywordsIds = array_merge( $keywordsIds, $result['id'] );
      
      // Step 4 - check if everything is running.
      $result = $this -> getApiResults( $monitoringCampaign -> retrieve( $campaignId ) );
      if ($result['status'] != 'active') {
        throw new Exception( "Campaign not active." );
      }
      $result = $this -> getApiResults( $monitoringGroup -> retrieve( $groupIdWarsaw ) );
      if ($result['status'] != 'active') {
        throw new Exception( "Group Warsaw not active." );
      }
      $result = $this -> getApiResults( $monitoringGroup -> retrieve( $groupIdGlobal ) );
      if ($result['status'] != 'active') {
        throw new Exception( "Group Global not active." );
      }
      foreach ( $keywordsIds as $kId ) {
        $result = $this -> getApiResults( $monitoringKeyword -> retrieve( $kId ) );
        if ($result['status'] != 'active') {
          throw new Exception( "Keyword with id {$kId} not active." );
        }
      }
      
      // End of script.
      $keywordsIdsImplode = implode( ', ', $keywordsIds );
      echo "Viola! You have new campaign with two groups and set of keyword which are about to be scaned.\n";
      echo "Your campaign id is: {$campaignId}\nWarsaw group id: {$groupIdWarsaw}\nGlobal group id: {$groupIdGlobal}\nKeywords ids: {$keywordsIdsImplode}\n";
      echo "Return later to retrieve data.";
    } catch ( Exception $e ) {
      die( "Error: " . $e -> getMessage() );
    }
  }

  /**
   * Simple helper function to throw exception when request generated any error.
   *
   * In your script you should handle errors more precisely and make proper actions depend on error type (repeat call, undo some changes etc.).
   */
  function getApiResults($callReturn) {
    if (isset( $callReturn['error'] )) {
      throw new Exception( $callReturn['error']['message'] );
    }
    if (isset( $callReturn['result'] )) {
      return $callReturn['result'];
    }
    return false;
  }
}



