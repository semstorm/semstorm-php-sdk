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
namespace SemstormApi\Tools;

use SemstormApi\Semstorm;


class ContentTools extends Semstorm{
  
    
  /**
   * Retrieve info about tools.
   * 
   * @param string $variable Unused.
   */
  public function retrieve($variable) {
    $response = $this -> httpClient -> get("tools/content-tools/{$variable}.json", []);
    return json_decode($response -> getBody());
  }
    
  /**
   * Use Text statistics tool via API.
   * 
   * @param array $data Data for tool.
   * 
   * @param array of parameters for tool
   * @param array['language'] string language.
   * @param array['text'] string text to analyse.
   */
  public function textStatistics($data) {
    $response = $this -> httpClient -> post("tools/content-tools/text-statistics.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
    
  /**
   * Use Text analysis tool via API.
   * 
   * @param array $data Data for tool.
   * 
   * @param array of parameters for tool
   * @param array['language'] string language.
   * @param array['text'] string text to analyse.
   */
  public function textAnalysis($data) {
    $response = $this -> httpClient -> post("tools/content-tools/text-analysis.json", [
              'json' => $data, 
    ]);
    return json_decode($response -> getBody());
  }
  
}