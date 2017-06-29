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


class MonitoringTag extends Semstorm{
  
    
  /**
   * Create new tag
   * 
   * @param array $data The data object
   */
  public function create($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-tag.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Retrieve one tag data
   * 
   * @param string $tid Tag id.
   */
  public function retrieve($tid) {
    $response = $this -> httpClient -> get("monitoring/monitoring-tag/{$tid}.json", []);
    return json_decode($response -> getBody());
  }
    
  /**
   * Update tag data
   * 
   * @param string $tid Group id.
   * @param array $data Tag data to update.
   */
  public function update($tid, $data) {
    $response = $this -> httpClient -> put("monitoring/monitoring-tag/{$tid}.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Delete tag
   * 
   * @param string $tid Tag id.
   */
  public function delete($tid) {
    $response = $this -> httpClient -> delete("monitoring/monitoring-tag/{$tid}.json", []);
    return json_decode($response -> getBody());
  }
    
  /**
   * Add keywords to tag.
   * 
   * @param array $data Data.
   */
  public function addKeywords($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-tag/add-keywords.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Stop group.
   * 
   * @param array $data Data.
   */
  public function removeKeywords($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-tag/remove-keywords.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Gets list of all tags.
   * 
   * @param array $data Campaign id and pager settings.
   */
  public function all($data) {
    $response = $this -> httpClient -> post("monitoring/monitoring-tag/all.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
  
}