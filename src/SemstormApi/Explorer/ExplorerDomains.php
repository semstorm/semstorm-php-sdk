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


class ExplorerDomains extends Semstorm{
  
    
  /**
   * Retrieve domains historical traffic and keywords count.
   * 
   * @param array $params settings for api call, only 'domains' is required = [
   *   'domains' = [ strings ]
   *   'gap' = ('monthly') / 'weekly' / 'daily'
   *   'date' = [
   *     'min' = string
   *     'max' = string
   *   ]
   *   'filters' = [] - filters dont work for 'monthly' gap
   * ]
   */
  public function visibility($params) {
    $response = $this -> httpClient -> post("explorer/explorer-domains/visibility.json", [
              'json' => $params, 
    ]);
    return json_decode($response -> getBody());
  }
  
}