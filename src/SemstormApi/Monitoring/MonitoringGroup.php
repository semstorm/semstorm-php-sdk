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


class MonitoringGroup extends Semstorm{
  
    
  /**
   * Create new group
   * 
   * @param array $data The data object
   */
  public function create($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-group.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Retrieve one group data
   * 
   * @param string $gid Group id.
   */
  public function retrieve($gid) {
    $response = $this -> httpClient -> get("monitoring/monitoring-group/{$gid}.json", []);
    return json_decode($response -> getBody());
  }
    
  /**
   * Update group data
   * 
   * @param string $gid Group id.
   * @param array $data Group data to update.
   */
  public function update($gid, $data) {
    $response = $this -> httpClient -> put("monitoring/monitoring-group/{$gid}.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Start stopped group.
   * 
   * @param int $id Group id.
   */
  public function start($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-group/start.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Stop group.
   * 
   * @param int $id Group id.
   */
  public function stop($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-group/stop.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Delete existing group.
   * 
   * @param int $id Group id.
   */
  public function delete($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-group/delete.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Restore deleted group.
   * 
   * @param int $id Group id.
   */
  public function restore($id) {
    $response = $this -> httpClient -> post("monitoring/monitoring-group/restore.json", [
              'json' => $id, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Add fields to group.
   * 
   * @param array $data Group resources to add.
   */
  public function addFields($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-group/add-fields.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Remove fields from group.
   * 
   * @param array $data Group resources to remove.
   */
  public function removeFields($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-group/remove-fields.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Gets list of all groups.
   * 
   * @param array $data Campaign id and pager settings.
   */
  public function all($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-group/all.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
  
}