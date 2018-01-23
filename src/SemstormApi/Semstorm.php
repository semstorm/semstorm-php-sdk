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
namespace SemstormApi;

class Semstorm{
  const _API_ENDPOINT_ = 'http://api.semstorm.com/api-v3/';
  protected $httpClient;
  protected static $token;
  protected static $baseUri;
  protected static $debug;

  /**
   * Constructor.
   *
   * @param string access token, API access token, if ommited used token from init() function.
   *
   * @param string endpoint url, not to override.
   * 
   * @param bool debug mode, set to true to enable guzzle debug info, if ommited used token from init() function.
   */
  public function __construct($token = null, $baseUri = null, $debug = null) {
    if($token == null){
      if(empty(self::$token)){
        throw new \SemstormApi\SemstormException('No access token provided.', 401 );
      }
      $token = self::$token;
    }

    if ($httpClient === null) {
      if($baseUri == null){
        if(empty(self::$baseUri)){
          self::init($token);
        }
        $baseUri = self::$baseUri;
      }
      if($debug === null){
        $debug = empty(self::$debug) ? false : true;
      }
      $options = [
        'base_uri' => $baseUri,
        'query' => ['services_token' => $token],
        'headers' => ['Content-Type' => 'application/json','Accept'=>'application/json'],
        'debug' => $debug
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
   * Initialize API for future use by settings access token, optional url and guzzle debug mode.
   *
   * @param string access token, API access token.
   *
   * @param string endpoint url, not to override.
   * 
   * @param bool debug mode, set to true to enable guzzle debug info.
   */
  static function init($token, $baseUri = null, $debug = false){
    self::$token = $token;
    self::$debug = $debug;
    if($baseUri){
      self::$baseUri = $baseUri;
    }
    else{
      self::$baseUri = self::_API_ENDPOINT_;
    }
  }
  /**
   * Returns guzzle client.
   * 
   * @return \GuzzleHttp\Client guzzle http client used by this instance.
   */
  function getHttpClient(){
    return $this->httpClient;
  }

  /**
   * Sets guzzle client.
   *
   * @param \GuzzleHttp\Client guzzle http client to be used by this instance.
   */
  function setHttpClient( \GuzzleHttp\Client $httpClient){
    $this->httpClient = $httpClient;
  }
  
  /**
   * Handle request exceptions.
   * 
   * Those can be native, guzzlehttp or other libraries exceptions.
   */
  protected function handleRequestException($e){
    $errorString = $e->getResponse()->getBody()->getContents();
    if(!$error = json_decode($errorString, true)){
      if(!$error = $e->getResponse()->getReasonPhrase()){
        $error = [ 'error' => [ 'message' => 'Undefined message from server.'] ];
      }
      else{
        $error = [ 'error' => [ 'message' => $error ] ];
      }
    }
    $error['error']['code'] = $e->getCode();
    return $error;
  }

}