<?php
/**
 * Copyright 2017, SEMSTORM International sp. z o.o. All Rights Reserved.
 *
 * Licensed under the GNU General Public License v3.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://choosealicense.com/licenses/gpl-3.0/
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace SemstormApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\RequestOptions;
use SemstormApi\SemstormException;

class Semstorm{
  
  protected $httpClient;
  protected static $token;
  
  /**
   * Constructor.
   *
   * @param string access token
   *
   * @param string endpoint url
   */
  public function __construct($_token = null, Client $httpClient = null) {
    if($_token == null){
      if(empty(self::$token)){
        throw new SemstormException('No access token provided.', 401 );
      }
      $_token = self::$token;
    }
    if ($httpClient === null) {
      $this -> httpClient = new Client([
        'base_uri' => 'http://api.semstorm.com/',
        'query' => ['services_token' => $_token],
        'headers' => ['Content-Type' => 'application/json','Accept'=>'application/json'],
        'debug' => false]);
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
  static function init($token){
    self::$token = $token;
  }
  
}