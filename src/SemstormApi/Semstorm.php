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
namespace SemstormApi;

class Semstorm{

  protected $httpClient;
  protected static $token;
  protected static $base_uri;
  protected static $debug;

  /**
   * Constructor.
   *
   * @param string access token
   *
   * @param string endpoint url
   */
  public function __construct($_token = null, \GuzzleHttp\Client $httpClient = null) {
    if($_token == null){
      if(empty(self::$token)){
        throw new \SemstormApi\SemstormException('No access token provided.', 401 );
      }
      $_token = self::$token;
    }

    if ($httpClient === null) {
      $options = [
        'base_uri' => self::$base_uri,
        'query' => ['services_token' => $_token],
        'headers' => ['Content-Type' => 'application/json','Accept'=>'application/json'],
        'debug' => self::$debug
      ];
      if(isset($this->requestOptions)){
        $options = array_merge($options, $this->requestOptions);
      }
      $this -> httpClient = new \GuzzleHttp\Client($options);
    }
    else {
      $this -> httpClient = $httpClient;
    }
  }

  /**
   * Initialize API for future use by settings access token.
   *
   * @param string $token
   */
  static function init($token, $base_uri = null, $debug = false){
    self::$token = $token;
    self::$debug = $debug;
    if($base_uri){
      self::$base_uri = $base_uri;
    }
    else{
      self::$base_uri = 'http://api.semstorm.com/api-v3/';
    }
  }

}