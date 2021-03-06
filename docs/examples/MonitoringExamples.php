<?php 
/**
 * Try out examples for Monitoring API.
 * 
 * Fill all constants definitions in config block, and run script.
 */

#######
## Config:
#######

//Put here your access token.
define('__ACCESS_TOKEN__', 'abcdef654321ABCfedcba1234');

//Put two of your campaigns ids.
define('__CAMPAIGN_1_ID__', '123');
define('__CAMPAIGN_2_ID__', '124');

//Put two of your groups ids.
define('__GROUP_1_ID__', '1234');
define('__GROUP_2_ID__', '1235');

//Put two of your keywords ids.
define('__KEYWORD_1_ID__', '789123');
define('__KEYWORD_2_ID__', '789124');

//Put two user emails.
define('__USER_1_MAIL__', 'user@mail.com');
define('__USER_2_MAIL__', 'user@mail.com');

#######
## Script:
#######

require __DIR__ . '/../../../../autoload.php';

use SemstormApi\Semstorm;
Semstorm::init( __ACCESS_TOKEN__ );

//Some of scripts are commented out. Those are script which ingerates into
//Monitoring limits and existing entities.
//You can uncomment those but remember to undo changes made by them eventually.
$scripts = [
  //"CampaignCreate.php",
  "CampaignRetrieve.php",
  //"CampaignUpdate.php",
  "CampaignStart.php",
  //"CampaignStop.php",
  //"CampaignDelete.php",
  "CampaignRestore.php",
  "CampaignList.php",
  "CampaignGetAccess.php",
  //"CampaignSetAccess.php",
  "CampaignData.php",
  //"GroupCreate.php",
  "GroupRetrieve.php",
  //"GroupUpdate.php",
  "GroupStart.php",
  //"GroupStop.php",
  //"GroupDelete.php",
  "GroupRestore.php",
  "GroupList.php",
  //"GroupCreateMultiple.php",
  //"GroupUpdateMultiple.php",
  //"KeywordCreate.php",
  "KeywordRetrieve.php",
  "KeywordStart.php",
  //"KeywordStop.php",
  //"KeywordDelete.php",
  "KeywordRestore.php",
  "KeywordList.php",
  "KeywordData.php",
  "KeywordDetails.php",
  "TablesDevices.php",
  "TablesEngines.php",
  "ErrorAuthorization.php",
  "ErrorBulk.php",
  "ErrorSimple.php",
];

foreach ($scripts as $scriptName){
  printf("Running script %s:\n", $scriptName);
  include_once __DIR__ . '/Monitoring/' . $scriptName;
  printf("\n\n");
}




