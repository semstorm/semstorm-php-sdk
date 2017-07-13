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

use SemstormApi\Semstorm;


class MonitoringCampaign extends Semstorm{
  
    
  /**
   * Create new campaign
   * 
   * @param array $data campaign data to create.
   * @param array $data['domain'] string campaign domain.
   */
  public function create($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-campaign.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Retrieve one campaign data
   * 
   * @param string $cid campaign id.
   */
  public function retrieve($cid) {
    $response = $this -> httpClient -> get("monitoring/monitoring-campaign/{$cid}.json", []);
    return json_decode($response -> getBody());
  }
    
  /**
   * Update campaign data
   * 
   * @param string $cid campaign id.

   * @param array $data campaign data to update.
   * @param array $data['domain'] string campaign domain.
   */
  public function update($cid, $data) {
    $response = $this -> httpClient -> put("monitoring/monitoring-campaign/{$cid}.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Start stopped campaign.
   * 
   * @param int $id campaign id.
   */
  public function start($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-campaign/start.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Stop campaign.
   * 
   * @param int $id campaign id.
   */
  public function stop($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-campaign/stop.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Delete existing campaign.
   * 
   * @param int $id campaign id.
   */
  public function delete($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-campaign/delete.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Restore deleted campaign.
   * 
   * @param int $id campaign id.
   */
  public function restore($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-campaign/restore.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Gets list of all campaigns.
   * 
   * @param array $settings pager settings.
   * @param array $settings['items_per_page'] number of items per page
   * @param array $settings['page'] page number (starting from 0)
   */
  public function list($settings) {
    $response = $this -> httpClient -> post("monitoring/monitoring-campaign/list.json", [
              'json' => $settings, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Get detals about campaign.
   * 
   * @param array $data 
   * @param array $data['id'] string campaign id
   * @param array $data['domains'] mixed array of domains or string with one domain or nothing then domain from campaign will be taken
   * @param array $data['params'] assocc array with additional params
   * @param array $data['params']['filters'] array with filters
   */
  public function getData($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-campaign/get-data.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
  
}