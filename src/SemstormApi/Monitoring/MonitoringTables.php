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


class MonitoringTables extends \SemstormApi\Semstorm{
  
    
  /**
   * Retrieve table with possible values.
   * 
   * @param string $arr_name name of array to return, possible values are "engines" and "devices".
   */
  public function retrieve($arr_name) {
    $response = $this -> httpClient -> get("monitoring/monitoring-tables/{$arr_name}.json", []);
    return json_decode($response -> getBody());
  }
  
}