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


class MonitoringGroup extends \SemstormApi\Semstorm{
  
    
  /**
   * Create new group
   * 
   * @param array $data 
   * @param array $data['campaign_id'] int campaign id in which create group
   * @param array $data['title'] string group title
   * @param array $data['engine'] string engine id, check monitoring-tables to see possible variants with country.
   * @param array $data['country'] country id, check monitoring-tables to see possible variants with engine.
   * @param array $data['location'] string (optional) location.
   * @param array $data['devices'] array devices
   */
  public function create($data) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-group.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Retrieve one group data
   * 
   * @param string $gid group id.
   */
  public function retrieve($gid) {
    try{
      $response = $this -> httpClient -> get("monitoring/monitoring-group/{$gid}.json", []);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Update group data
   * 
   * @param string $gid group id.

   * @param array $data group data to update.
   * @param array $data['title'] string group title
   * @param array $data['engine'] string with engine id, check monitoring-tables to see possible variants with country.
   * @param array $data['country'] as country id to set, check monitoring-tables to see possible variants with engine.
   * @param array $data['location'] string of location to set.
   * @param array $data['devices'] array of devices to set
   */
  public function update($gid, $data) {
    try{
      $response = $this -> httpClient -> put("monitoring/monitoring-group/{$gid}.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Start stopped group.
   * 
   * @param int/array $id group id or array of ids.
   */
  public function start($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-group/start.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Stop group.
   * 
   * @param int/array $id group id or array of ids.
   */
  public function stop($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-group/stop.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Delete existing group.
   * 
   * @param int/array $id group id or array of ids.
   */
  public function delete($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-group/delete.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Restore deleted group.
   * 
   * @param int/array $id group id or array of ids.
   */
  public function restore($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-group/restore.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Gets list of all campaign groups.
   * 
   * @param array $data campaign id and pager settings.
   * @param array $data['campaign_id'] campaign id.
   * @param array $data['items_per_page'] number of items per page.
   * @param array $data['page'] page number (starting from 0).
   */
  public function getList($data) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-group/get-list.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Create multiple groups.
   * 
   * @param array $data groups data to create.
   * @param array $data['campaign_id'] int campaign id in which create groups
   * @param array $data['groups'] array with groups data
   * @param array $data['groups'][]['title'] string group title
   * @param array $data['groups'][]['engine'] string engine id, check monitoring-tables to see possible variants with country.
   * @param array $data['groups'][]['country'] country id, check monitoring-tables to see possible variants with engine.
   * @param array $data['groups'][]['location'] string (optional) location.
   * @param array $data['groups'][]['devices'] array devices.
   */
  public function createMultiple($data) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-group/create-multiple.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Update multiple groups.
   * 
   * @param array $data groups data to update.
   * @param array $data['groups'] array of groups data to update keyed by group id
   * @param array $data['groups'][__ID__]['title'] string group title
   * @param array $data['groups'][__ID__]['engine'] string engine id, check monitoring-tables to see possible variants with country.
   * @param array $data['groups'][__ID__]['country'] country id, check monitoring-tables to see possible variants with engine.
   * @param array $data['groups'][__ID__]['location'] string (optional) location.
   * @param array $data['groups'][__ID__]['devices'] array devices.
   */
  public function updateMultiple($data) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-group/update-multiple.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
  
}