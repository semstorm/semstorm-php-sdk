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
namespace SemstormApi\Technology;


class Technology extends \SemstormApi\Semstorm{
  
    
  /**
   * Retrieve technology list.
   * 
   * @param array $params settings for api call
   */
  public function list($params) {
    try{
      $response = $this -> httpClient -> post("technology/technology/list.json", [
              'json' => $params, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
    
  /**
   * Retrieve technology information for specific domains.
   * 
   * @param array $params settings for api call
   */
  public function domains($params) {
    try{
      $response = $this -> httpClient -> post("technology/technology/domains.json", [
              'json' => $params, 
    ]);
      return json_decode($response -> getBody(), true);
    }catch( \Exception $e){
      return $this->handleRequestException($e);
    }
  }
  
}