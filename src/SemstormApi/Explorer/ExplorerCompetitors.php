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


class ExplorerCompetitors extends \SemstormApi\Semstorm{
  
    
  /**
   * Retrieve explorer competitors data.
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
  public function getData($params) {
    try{
      $response = $this -> httpClient -> post("explorer/explorer-competitors/get-data.json", [
              'json' => $params, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
  
}