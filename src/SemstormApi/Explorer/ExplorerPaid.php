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
namespace SemstormApi\Explorer;

use SemstormApi\Semstorm;


class ExplorerPaid extends Semstorm{
  
    
  /**
   * Retrieve explorer paid keywords data.
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
  public function keywords($params) {
    $response = $this -> httpClient -> post("explorer/explorer-paid/keywords.json", [
              'json' => $params, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Global stats.
   * 
   * @param array $params settings for api call, only 'domains' is required = [
   *   'domains' = [ strings ]
   *   'device' = string optional ('desktop') / 'mobile'
   * ]
   */
  public function domainsGlobal($params) {
    $response = $this -> httpClient -> post("explorer/explorer-paid/domains-global.json", [
              'json' => $params, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Retrieve explorer paid urls data.
   * 
   * @param array $params settings for api call, only 'domains' is required = [
   *   'domains' = [ strings ]
   *   'pager' = [
   *     'items_per_page' = 10 / 25 / 50 / 100 / 250 / 500
   *     'page' = int
   *   ]
   *   'sorting' = [
   *     'field' = 'facet_count' / 'field_traffic'
   *     'sort' = 'asc' / 'desc'
   *   ]
   *   'logic_conjunction' = 'and' / 'or'
   *   'filters' = []
   * ]
   */
  public function urls($params) {
    $response = $this -> httpClient -> post("explorer/explorer-paid/urls.json", [
              'json' => $params, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Retrieve explorer paid competitors data.
   * 
   * @param array $params settings for api call, only 'domains' is required = [
   *   'domains' = [ strings ]
   *   'pager' = [
   *     'items_per_page' = 10 / 25 / 50 / 100 / 250 / 500
   *     'page' = int
   *   ]
   *   'sorting' = [
   *     'field' = 'facet_count' / 'field_keyword_searches'
   *     'sort' = 'asc' / 'desc'
   *   ]
   *   'logic_conjunction' = 'and' / 'or'
   *   'filters' = []
   * ]
   */
  public function competitors($params) {
    $response = $this -> httpClient -> post("explorer/explorer-paid/competitors.json", [
              'json' => $params, 
    ]);
    return json_decode($response -> getBody());
  }
  
}