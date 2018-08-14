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
namespace SemstormApi\Explorer;


class ExplorerKeywords extends \SemstormApi\Semstorm{
  
    
  /**
   * Retrieve explorer keywords data.
   * 
   * @param array $params settings for api call, only 'domains' is required = [
   *   'domains' = [ strings ]
   *   'pager' = [
   *     'items_per_page' = 10 / 25 / 50 / 100 / 250 / 500
   *     'page' = int
   *   ]
   *   'sorting' = [
   *     'field' = 'field_keyword' / 'field_position:X' / 'field_position_c:X' / 'field_traffic:X' / 'field_traffic_c:X' / 'field_url:X' / 'field_keyword_searches' / 'field_keyword_cp_r' / 'field_keyword_cpc'
   *     'sort' = 'asc' / 'desc'
   *   ]
   *   'keyword_filter' = 'all' / 'new' / 'up' / 'down' / 'lost'
   *   'logic_conjunction' = 'and' / 'or'
   *   'filters' = []
   * ]
   */
  public function getData($params) {
    try{
      $response = $this -> httpClient -> post("explorer/explorer-keywords/get-data.json", [
              'json' => $params, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Retrieve explorer basic stats.
   * 
   * @param array $params 
   * @param array $data['domains'] array of campaign ids
   * @param array $data['logic_conjunction'] string possible values: "and", "or"
   * @param array $data['filters'] array with filters
   */
  public function basicStats($params) {
    try{
      $response = $this -> httpClient -> post("explorer/explorer-keywords/basic-stats.json", [
              'json' => $params, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Get data about position distribution.
   * 
   * @param array $data 
   * @param array $data['domains'] array of campaign ids
   * @param array $data['filters'] array with filters
   */
  public function positionDistribution($data) {
    try{
      $response = $this -> httpClient -> post("explorer/explorer-keywords/position-distribution.json", [
              'json' => $data, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
  
}