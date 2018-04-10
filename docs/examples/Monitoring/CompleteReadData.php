<?php
/**
 * Example: Complete example about how to retrieve scanned data.
*
* Retrieve campaign data for two different date ranges and gaps, also
* use fitlers to get data only about keywords with high volume.
* Keyword datails retrieve heatmap and top50 data.
*
* IMPORTANT:
*   - Retrieving big sets of data, and/or setting date range long into past
*     highly increase chance to get "Prevent throttling" error. In that case
*     you can try again after some time, or try to divide request to few less
*     and retrieve it piece by piece.
*   - Sending many requests at once can result in "Requesting too fast" error.
*     In that case you should decrase request amount, or put some sleep between them.
*   - Freshly created campaigns/keywords will not have any results. Data is gathered
*     on daily basics, and is not delivered instantly.
*/

// Put this script to folder where you installed SEMSTORM PHP SDK API, or change directory to this place.
require __DIR__ . '/vendor/autoload.php';

use SemstormApi\Semstorm;
use SemstormApi\Monitoring\MonitoringCampaign;
use SemstormApi\Monitoring\MonitoringKeyword;

// ####
// Fill your access token.
// ####
$accessToken = "123456789abdefghi987654321qwertyABCDEFGH";
$campaignId = "123";
$keywordId = "45678";

$dateMin = date('Ymd', strtotime(' -14 day'));
$dateMax = date('Ymd', strtotime(' -1 day'));

// ####
// Script start.
// ####
echo "start: " . date("Y-m-d H:i:s");
try {
  $completeReadData = new CompleteReadData( $accessToken, $campaignId, $keywordId, $dateMin, $dateMax );
  
   echo "\n\nGet list of keywords from campaign {$campaignId}:\n";
   print_r($completeReadData->getCampaignKeywords());
  
   echo "\n\nData for campaign {$campaignId}:\n";
   print_r($completeReadData->getCampaignDailyData());
   
   echo "\n\nData for campaign {$campaignId} from last half of year, granulated monthly:\n";
   print_r($completeReadData->getCampaignMontlyDataFromFirstHalfOfYear());
  
   echo "\n\nData for campaign {$campaignId}, including only high volume keywords:\n";
   print_r($completeReadData->getCampaignHighVolumeData());
  
  echo "\n\nData for keyword {$keywordId}, format competitors:\n";
  print_r($completeReadData->getKeywordDetails("competitors"));

  echo "\n\nData for keyword {$keywordId}, format top50:\n";
  print_r($completeReadData->getKeywordDetails("top50"));
}
catch ( Exception $e ) {
  echo "\n\nError: " . $e -> getMessage();
}
echo "\n\nend: " . date("Y-m-d H:i:s");

class CompleteReadData {
  
  private $campaignId, $keywordId, $dateMin, $dateMax;
  private $monitoringCampaign;
  private $monitoringKeyword;
  private $filters;

  function __construct($token, $campaignId, $keywordId, $dateMin, $dateMax) {
    try {
      // Step 0 - initialize.
      $this->campaignId = $campaignId;
      $this->keywordId = $keywordId;
      $this->dateMin = $dateMin;
      $this->dateMax = $dateMax;
      // Initialize api.
      Semstorm::init( $token );
      // New monitoring campaign object to handle all campaign requests.
      $this -> monitoringCampaign = new MonitoringCampaign();
      // New monitoring keyword object to handle all keyword requests.
      $this -> monitoringKeyword = new MonitoringKeyword();
    } catch ( Exception $e ) {
      echo "Error: " . $e -> getMessage();
    }
  }

  function getCampaignKeywords(){
    try {
      $params = [ ];
      $params['campaign_id'] = $this->campaignId;
      $params['pager'] = [];
      $params['pager']['items_per_page'] = 100;
      $params['pager']['page'] = 0;

      $keywords = [];
      $results = $this -> monitoringKeyword -> getList( $params );
      while(!empty($results['result']['keywords'])){
        $keywords = array_merge($keywords, $results['result']['keywords']);
        $params['pager']['page']++;
        $results = $this -> monitoringKeyword -> getList( $params );
      }

      return $keywords;
    } catch ( Exception $e ) {
      echo "Error: " . $e -> getMessage();
    }
  }

  function getKeywordDetails($type) {
    try {
      $params = [ ];
      $params['id'] = $this->keywordId;
      // Set date range and gap to "daily".
      $params['datemin'] = $this->dateMin;
      $params['datemax'] = $this->dateMax;
      $params['gap'] = "daily";
      // Set data type.
      $params['type'] = $type;
      return $this -> monitoringKeyword -> getDetails( $params );
    } catch ( Exception $e ) {
      echo "Error: " . $e -> getMessage();
    }
  }

  function getCampaignDailyData() {
    try {
      $params = [ ];
      $params['id'] = $this->campaignId;
      // Set date range and date gap to "daily".
      $params['datemin'] = $this->dateMin;
      $params['datemax'] = $this->dateMax;
      $params['gap'] = "daily";
      return $this -> getApiResults( $this -> monitoringCampaign -> getData( $params ) );
    } catch ( Exception $e ) {
      echo "Error: " . $e -> getMessage();
    }
  }

  function getCampaignMontlyDataFromFirstHalfOfYear() {
    try {
      $params = [ ];
      $params['id'] = $this->campaignId;
      // Set date range to half a year and date gap to "monthly".
      $params['datemin'] = date('Ymd', strtotime(' -6 month'));
      $params['datemax'] = date('Ymd', strtotime(' -1 day'));
      $params['gap'] = "monthly";
      // Request call and return results.
      return $this -> getApiResults( $this -> monitoringCampaign -> getData( $params ) );
    } catch ( Exception $e ) {
      echo "Error: " . $e -> getMessage();
    }
  }

  function getCampaignHighVolumeData() {
    try {
      $params = [ ];
      $params['id'] = $this->campaignId;
      $params['params'] = [ ];
      // Set date range and date gap.
      $params['datemin'] = $this->dateMin;
      $params['datemax'] = $this->dateMax;
      $params['gap'] = "daily";
      // Add filter "Only keywords with search volume more than 6000".
      $params["filters"] = [];
      $params["filters"][] = [
        'field' => 'volume',
        'value' => 6000,
        'operand' => 'more'
      ];
      // Request call and return results.
      return $this -> getApiResults( $this -> monitoringCampaign -> getData( $params ) );
    } catch ( Exception $e ) {
      echo "Error: " . $e -> getMessage();
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



