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


class MonitoringTag extends \SemstormApi\Semstorm{
  
    
  /**
   * 
   * 
   */
  public function create() {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-tag.json", []);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      $errorString = $e->getResponse()->getBody()->getContents();
      if($error = json_decode($errorString)){
        return $error;
      }
      return [ 'error' => [ 'message' => 'Undefined message from server.'] ];
    }
  }
    
  /**
   * 
   * 
   */
  public function retrieve() {
    try{
      $response = $this -> httpClient -> get("monitoring/monitoring-tag.json", []);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      $errorString = $e->getResponse()->getBody()->getContents();
      if($error = json_decode($errorString)){
        return $error;
      }
      return [ 'error' => [ 'message' => 'Undefined message from server.'] ];
    }
  }
    
  /**
   * 
   * 
   */
  public function update() {
    try{
      $response = $this -> httpClient -> put("monitoring/monitoring-tag.json", []);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      $errorString = $e->getResponse()->getBody()->getContents();
      if($error = json_decode($errorString)){
        return $error;
      }
      return [ 'error' => [ 'message' => 'Undefined message from server.'] ];
    }
  }
    
  /**
   * 
   * 
   */
  public function delete() {
    try{
      $response = $this -> httpClient -> delete("monitoring/monitoring-tag.json", []);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      $errorString = $e->getResponse()->getBody()->getContents();
      if($error = json_decode($errorString)){
        return $error;
      }
      return [ 'error' => [ 'message' => 'Undefined message from server.'] ];
    }
  }
    
  /**
   * 
   * 
   */
  public function addKeywords() {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-tag/add-keywords.json", []);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      $errorString = $e->getResponse()->getBody()->getContents();
      if($error = json_decode($errorString)){
        return $error;
      }
      return [ 'error' => [ 'message' => 'Undefined message from server.'] ];
    }
  }
    
  /**
   * 
   * 
   */
  public function removeKeywords() {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-tag/remove-keywords.json", []);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      $errorString = $e->getResponse()->getBody()->getContents();
      if($error = json_decode($errorString)){
        return $error;
      }
      return [ 'error' => [ 'message' => 'Undefined message from server.'] ];
    }
  }
    
  /**
   * 
   * 
   */
  public function getList() {
    try{
      $response = $this -> httpClient -> post("monitoring/monitoring-tag/get-list.json", []);
      return json_decode($response -> getBody());
    }catch( \Exception $e){
      $errorString = $e->getResponse()->getBody()->getContents();
      if($error = json_decode($errorString)){
        return $error;
      }
      return [ 'error' => [ 'message' => 'Undefined message from server.'] ];
    }
  }
  
}