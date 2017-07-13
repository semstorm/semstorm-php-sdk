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
   * @param array $data 
   * @param array $data['campaign_id'] int campaign id in which create group
   * @param array $data['title'] string group title
   * @param array $data['engines'] array (optional) engines
   * @param array $data['locations'] array (optional) locations
   * @param array $data['devices'] array (optional) devices
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
   * @param string $gid group id.
   */
  public function retrieve($gid) {
    $response = $this -> httpClient -> get("monitoring/monitoring-group/{$gid}.json", []);
    return json_decode($response -> getBody());
  }
    
  /**
   * Update group data
   * 
   * @param string $gid group id.

   * @param array $data group data to update.
   * @param array $data['title'] string group title
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
   * @param int $id group id.
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
   * @param int $id group id.
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
   * @param int $id group id.
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
   * @param int $id group id.
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
   * @param array $data group resources to add.
   * @param array $data['id'] string group id.
   * @param array $data['engines'] array of engines to add.
   * @param array $data['locations'] array of locations to add.
   * @param array $data['devices'] array of devices to add.
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
   * @param array $data group resources to remove.
   * @param array $data['id'] string group id.
   * @param array $data['engines'] array of engines to remove.
   * @param array $data['locations'] array of locations to remove.
   * @param array $data['devices'] array of devices to remove.
   */
  public function removeFields($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-group/remove-fields.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * 
   * 
   */
  public function all() {
    $response = $this -> httpClient -> post("monitoring/monitoring-group/all.json", []);
    return json_decode($response -> getBody());
  }
  
}