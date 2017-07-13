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


class MonitoringKeyword extends Semstorm{
  
    
  /**
   * Create new keywords in group
   * 
   * @param array $data 
   * @param array $data['group_id'] string group id
   * @param array $data['keywords'] array of strings - keywords
   * 
   * @return $ids[] - array of ids of new keywords
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
   * @param string $kid keyword id.
   */
  public function retrieve($kid) {
    $response = $this -> httpClient -> get("monitoring/monitoring-keyword/{$kid}.json", []);
    return json_decode($response -> getBody());
  }
    
  /**
   * Start stopped keyword.
   * 
   * @param int $id keyword id.
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
   * @param int $id keyword id.
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
   * @param int $id keyword id.
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
   * @param int $id keyword id.
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
   * @param array $data 
   * @param array $data['id'] string keyword id
   * @param array $data['tags'] array of tags ids
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
   * @param array $data 
   * @param array $data['id'] string keyword id
   * @param array $data['tags'] array of tags ids
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
   * @param array $data 
   * @param array $data['id'] string keyword id
   * @param array $data['domain'] string optional; competitor if not set it will take domain from campaign
   * @param array $data['params'] array optional  with additional params
   * 
   * @return array of data
   */
  public function getData($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-keyword/get-data.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
  
}