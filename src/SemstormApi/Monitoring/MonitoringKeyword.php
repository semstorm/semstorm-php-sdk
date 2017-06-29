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


class MonitoringKeyword extends Semstorm{
  
    
  /**
   * Create new keywords in group
   * 
   * @param array $data The data object
   */
  public function create($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-keyword.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Retrieve one keyword data
   * 
   * @param string $tid Keyword id.
   */
  public function retrieve($tid) {
    $response = $this -> httpClient -> get("monitoring/monitoring-keyword/{$tid}.json", []);
    return json_decode($response -> getBody());
  }
    
  /**
   * Start stopped keyword.
   * 
   * @param int $id Keyword id.
   */
  public function start($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-keyword/start.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Stop group.
   * 
   * @param int $id Keyword id.
   */
  public function stop($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-keyword/stop.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Delete existing keyword.
   * 
   * @param int $id Keyword id.
   */
  public function delete($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-keyword/delete.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Restore deleted keyword.
   * 
   * @param int $id Keyword id.
   */
  public function restore($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-keyword/restore.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Add tags to keyword.
   * 
   * @param array $data Data.
   */
  public function addTags($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-keyword/add-tags.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Remove tags from keyword.
   * 
   * @param array $data Data.
   */
  public function removeTags($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-keyword/remove-tags.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Get keyword data using monitoring_page_keywords_pivot_get_data().
   * 
   * @param array $data Data.
   */
  public function getData($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-keyword/get-data.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
  
}