<?php
/**
 * Copyright 2017, SEMSTORM International sp. z o.o. All Rights Reserved.
 *
 * Licensed under the GNU General Public License v3.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://choosealicense.com/licenses/gpl-3.0/
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
   * @param array $data The data object
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
   * @param string $cid Campaign id.
   */
  public function retrieve($cid) {
    $response = $this -> httpClient -> get("monitoring/monitoring-campaign/{$cid}.json", []);
    return json_decode($response -> getBody());
  }
    
  /**
   * Update campaign data
   * 
   * @param string $cid Campaign id.
   * @param array $data Campaign data to update.
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
   * @param int $id Campaign id.
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
   * @param int $id Campaign id.
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
   * @param int $id Campaign id.
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
   * @param int $id Campaign id.
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
   * @param array $settings Pager settings.
   */
  public function all($settings) {
    $response = $this -> httpClient -> post("monitoring/monitoring-campaign/all.json", [
              'json' => $settings, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Get data using monitoring_page_keywords_pivot_get_data().
   * 
   * @param array $data Data.
   */
  public function getData($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-campaign/get-data.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
  
}