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
namespace SemstormApi\Keywords;


class KeywordsTables extends \SemstormApi\Semstorm{
  
    
  /**
   * Retrieve table with configuration values.
   * 
   * @param string $name name of resource to return, possible values are "types", "countries", "languages", "currencies" and "engines".
   */
  public function retrieve($name) {
    try{
      $response = $this -> httpClient -> get("keywords/keywords-tables/{$name}.json", []);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
  
}