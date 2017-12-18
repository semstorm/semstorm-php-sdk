<?php
/**
 * Copyright 2017, SEMSTORM International sp. z o.o. All Rights Reserved.
 *
 * Licensed under the Apache License Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace SemstormApi\Monitoring;


class MonitoringCampaign extends \SemstormApi\Semstorm{
  
    
  /**
   * Create new campaign
   * 
   * @param array $data campaign data to create.
   * @param array $data['domain'] string campaign domain.
   */
  public function create($data) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-campaign.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Retrieve one campaign data
   * 
   * @param string $cid campaign id.
   */
  public function retrieve($cid) {
    try{
      $response = $this -> httpClient -> get("monitoring/monitoring-campaign/{$cid}.json", []);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Update campaign data
   * 
   * @param string $cid campaign id.

   * @param array $data campaign data to update.
   * @param array $data['domain'] string campaign domain.
   */
  public function update($cid, $data) {
    try{
      $response = $this -> httpClient -> put("monitoring/monitoring-campaign/{$cid}.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Start stopped campaign.
   * 
   * @param int/array $id campaign id or array of ids.
   */
  public function start($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-campaign/start.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Stop campaign.
   * 
   * @param int/array $id campaign id or array of ids.
   */
  public function stop($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-campaign/stop.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Delete existing campaign.
   * 
   * @param int/array $id campaign id or array of ids.
   */
  public function delete($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-campaign/delete.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Restore deleted campaign.
   * 
   * @param int/array $id campaign id or array of ids.
   */
  public function restore($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-campaign/restore.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Gets list of all campaigns.
   * 
   * @param array $settings pager settings.
   * @param array $settings['items_per_page'] number of items per page
   * @param array $settings['page'] page number (starting from 0)
   */
  public function getList($settings) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-campaign/get-list.json", [
              'json' => $settings, 
    ]);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Get details about campaign.
   * 
   * @param array $data 
   * @param array $data['id'] string campaign id
   * @param array $data['domains'] mixed array of domains or string with one domain or nothing then domain from campaign will be taken
   * @param array $data['params'] assocc array with additional params
   * @param array $data['params']['filters'] array with filters
   */
  public function getData($data) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-campaign/get-data.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Get information about campaigns your have access to and your access level.
   * 
   */
  public function getAccess() {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-campaign/get-access.json", []);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Set access to campaigns, you need to have proper access level to modify permissions in campaigns.
   * 
   * @param array $data 
   * @param array $data[__ID__] array keyed by campaign id which access are to be altered
   * @param array $data[__ID__]['set'] array of accounts to be added/modified for certain campaign with
   * @param array $data[__ID__]['set'][]['mail'] string user mail
   * @param array $data[__ID__]['set'][]['permission'] string permission level to set
   * @param array $data[__ID__]['remove'] array of accounts to be removed from certain campaign
   * @param array $data[__ID__]['remove'][]['mail'] string user mail
   */
  public function setAccess($data) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-campaign/set-access.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
  
}