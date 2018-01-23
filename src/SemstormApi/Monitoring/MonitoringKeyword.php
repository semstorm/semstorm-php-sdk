<?php
/**
 * Copyright 2018, SEMSTORM International sp. z o.o. All Rights Reserved.
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


class MonitoringKeyword extends \SemstormApi\Semstorm{
  
    
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
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-keyword.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Retrieve one keyword data
   * 
   * @param string $kid keyword id.
   */
  public function retrieve($kid) {
    try{
      $response = $this -> httpClient -> get("monitoring/monitoring-keyword/{$kid}.json", []);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Start stopped keyword.
   * 
   * @param int/array $id keyword id or array of ids.
   */
  public function start($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-keyword/start.json", [
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
   * @param int/array $id keyword id or array of ids.
   */
  public function stop($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-keyword/stop.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Delete existing keyword.
   * 
   * @param int/array $id keyword id or array of ids.
   */
  public function delete($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-keyword/delete.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Restore deleted keyword.
   * 
   * @param int/array $id keyword id or array of ids.
   */
  public function restore($id) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-keyword/restore.json", [
              'json' => $id, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Move keywords to other group.
   * 
   * @param array $data @param array $data['group_id'] int group id to which switch selected keywords.
   * @param array $data['id'] array of keywords ids.
   */
  public function changeGroup($data) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-keyword/change-group.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Gets list of campaign keywords.
   * 
   * @param array $data campaign id and pager settings.
   * @param array $data['campaign_id'] campaign id.
   * @param array $data['pager']['items_per_page'] number of items per page.
   * @param array $data['pager']['page'] page number (starting from 0).
   */
  public function getList($data = []) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-keyword/get-list.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Get keyword details data.
   * 
   * @param array $data 
   * @param array $data['kid'] array/int keyword id or array of keyword ids
   * @param array $data['params']['datemin'] string start date in format Ymd
   * @param array $data['params']['datemax'] string end date in format Ymd
   * @param array $data['params']['gap'] string date gap, possible values are: "daily" / "weekly" / "monthly"
   * @param array $data['params']['type'] string details type, possible values are: "heatmap" / "competitors" / "top50"
   */
  public function getDetails($data) {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-keyword/get-details.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
  
}