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

class ExplorerFilters {
  private $filtersArray = [];

  /**
   * Get params which are set
   * to be deafult in explorer calls.
   *
   * @return array of filters
   */
  public function getFilters(){
    return $this->filtersArray;
  }
  /**
   * Add mapped filter.
   *
   * @param string field to filter by
   *
   * @param mixed value to filter can be one value or array of values (for between)
   *
   * @param type of filtering
   */
  public function addFilter($field, $value, $type = NULL, $domain = NULL){
    $filterArr = [];
    $filterArr['type'] = 'include';
    $filterArr['op'] = 'equal';
    if($type!=NULL){
      $filterArr['op'] = $type;
    }
    //Make array if single value.
    if(!is_array($value)){
      $value = [ $value ];
    }

    switch ($field) {
      //Non domain filters.
      case 'keyword':
        //equal, contains, synonym, regexp
        if(!in_array($filterArr['op'], ['equal', 'synonym', 'regexp', 'contains'])){
          throw new SemstormException( "Wrong type set for filters for keyword.", 2);
        }
        $filterArr['field'] = 'keyword';
        $filterArr['value'] = $value;
        break;
      case 'cp':
        //equal, between, less, more
        if(!in_array($filterArr['op'], ['equal', 'between', 'less', 'more'])){
          throw new SemstormException( "Wrong type set for filters for cp.", 2);
        }
        $filterArr['field'] = 'keyword_cp_r';
        $filterArr['value'] = $value;
        break;
      case 'volume':
        //equal, between, less, more
        if(!in_array($filterArr['op'], ['equal', 'between', 'less', 'more'])){
          throw new SemstormException( "Wrong type set for filters for volume.", 2);
        }
        $filterArr['field'] = 'keyword_searches';
        $filterArr['value'] = $value;
        break;
      case 'trends':
        //equal
        if(!in_array($filterArr['op'], ['equal'])){
          throw new SemstormException( "Wrong type set for filters for trends.", 2);
        }
        $filterArr['field'] = 'keyword_trends_t_mv';
        $filterArr['op'] = 'taxonomy';
        $filterArr['value'] = $value;
        break;
      case 'cpc':
        //between, less, more
        if(!in_array($filterArr['op'], ['between', 'less', 'more'])){
          throw new SemstormException( "Wrong type set for filters for cpc.", 2);
        }
        $filterArr['field'] = 'keyword_cpc';
        $filterArr['value'] = $value;
        break;

        //Domain filters.
      case 'position_change':
        //equal, between, less, more
        if(!in_array($filterArr['op'], ['equal', 'between', 'less', 'more'])){
          throw new SemstormException( "Wrong type set for filters for position_change.", 2);
        }
        if(empty($domain)){
          throw new SemstormException( "No domain set for domain filter for position_change.", 2);
        }
        $filterArr['field'] = 'position_c';
        $filterArr['domain'] = $domain;
        $filterArr['value'] = $value;
        break;
      case 'subdomain':
        //equal, contains
        if(!in_array($filterArr['op'], ['equal', 'contains'])){
          throw new SemstormException( "Wrong type set for filters for subdomain.", 2);
        }
        if(empty($domain)){
          throw new SemstormException( "No domain set for domain filter for subdomain.", 2);
        }
        $filterArr['field'] = 'subdomain';
        $filterArr['domain'] = $domain;
        $filterArr['value'] = $value;
        break;
      case 'traffic':
        //equal, between, less, more
        if(!in_array($filterArr['op'], ['equal', 'between', 'less', 'more'])){
          throw new SemstormException( "Wrong type set for filters for traffic.", 2);
        }
        if(empty($domain)){
          throw new SemstormException( "No domain set for domain filter for traffic.", 2);
        }
        $filterArr['field'] = 'traffic';
        $filterArr['domain'] = $domain;
        $filterArr['value'] = $value;
        break;
      case 'position':
        //equal, between, less, more
        if(!in_array($filterArr['op'], ['equal', 'between', 'less', 'more'])){
          throw new SemstormException( "Wrong type set for filters for position.", 2);
        }
        if(empty($domain)){
          throw new SemstormException( "No domain set for domain filter for position.", 2);
        }
        $filterArr['field'] = 'position';
        $filterArr['domain'] = $domain;
        $filterArr['value'] = $value;
        break;
      case 'url':
        //equal, contains
        if(!in_array($filterArr['op'], ['equal', 'contains'])){
          throw new SemstormException( "Wrong type set for filters for url.", 2);
        }
        if(empty($domain)){
          throw new SemstormException( "No domain set for domain filter for url.", 2);
        }
        $filterArr['field'] = 'url';
        $filterArr['domain'] = $domain;
        $filterArr['value'] = $value;
        break;

      default:
        $filterArr['type'] = 'include';
        $filterArr['field'] = $field;
        $filterArr['op'] = 'equal';
        $filterArr['value'] = $value;
        break;
    }
    array_push($this->filtersArray, $filterArr);
  }
  /**
   * Add mapped filters.
   *
   * @param array of mapped filters
   */
  public function addFilters($filters){
    foreach ($filters as $value) {
      $type = isset($value[2]) ? $value[2] : NULL;
      $this->addFilter($value[0], $value[1], $type);
    }
  }
  /**
   * Set filters explicity.
   *
   * If filters are not proper array then results are unexpected.
   *
   * @param array of filters
   */
  public function setRawFilters($filters){
    $this->filters = $filters;
  }
  /**
   * Add new filter explicity.
   *
   * If filter are not proper array then results are unexpected.
   *
   * @param array with filter options
   */
  public function addRawFilter($filter){
    array_push($this->filtersArray, $filter);
  }
  /**
   * Add simple filter - by keyword.
   *
   * @param string keyword
   *
   * @param string enum 'contains' / 'natural' / 'synonyms'
   */
  public function addBasicFilterKeyword($keyword, $searchType='contains'){
    $filter = [];
    $filter['field'] = 'keyword';
    $filter['type'] = 'include';
    $filter['value'][0] = $keyword;
    switch ($searchType) {
      case 'natural':
        $filter['op'] = 'dict';
        break;
      case 'synonyms':
        $filter['op'] = 'synonym';
        break;
      default:
        $filter['op'] = 'contains_f';
        break;
    }
    array_push($this->filtersArray, $filter);
  }
  /**
   * Add simple filter - by volume.
   *
   * @param bool if include low volume
   *
   * @param bool if include medium volume
   *
   * @param bool if include high volume
   */
  public function addBasicFilterVolume($low = FALSE, $medium = FALSE, $high = FALSE){
    $filter = [];
    $filter['field'] = 'keyword_searches';
    $filter['type'] = 'include';
    $filter['op'] = 'equal';
    $filter['value'][0] = [];
    if($low){
      $filter['value'][0][] = '[0 TO 100]';
    }
    if($medium){
      $filter['value'][0][] = '[101 TO 1000]';
    }
    if($high){
      $filter['value'][0][] = '[1001 TO *]';
    }
    $filter['value'][0] = implode(' OR ', $filter['value'][0]);
    array_push($this->filtersArray, $filter);
  }
  /**
   * Add simple filter - by cp.
   *
   * @param bool if include low volume
   *
   * @param bool if include medium volume
   *
   * @param bool if include high volume
   */
  public function addBasicFilterCp($low = FALSE, $medium = FALSE, $high = FALSE){
    $filter = [];
    $filter['field'] = 'keyword_cp_r';
    $filter['type'] = 'include';
    $filter['op'] = 'equal';
    $filter['value'][0] = [];
    if($low){
      $filter['value'][0][] = '[0 TO 2]';
    }
    if($medium){
      $filter['value'][0][] = '[3 TO 6]';
    }
    if($high){
      $filter['value'][0][] = '[7 TO *]';
    }
    $filter['value'][0] = implode(' OR ', $filter['value'][0]);
    array_push($this->filtersArray, $filter);
  }
  /**
   * Add simple filter - by position.
   *
   * @param string domain
   *
   * @param bool if get 1st pos
   *
   * @param bool if get 2nd and 3rd pos
   *
   * @param bool if get 4th to 10th pos
   *
   * @param bool if get 11th to 20th pos
   *
   * @param bool if get 21th to 50th pos
   */
  public function addBasicFilterPosition($domain, $_1 = FALSE, $_2_3 = FALSE, $_4_10 = FALSE, $_11_20 = FALSE, $_21_50 = FALSE){
    $filter = [];
    $filter['domain'] = $domain;
    $filter['field'] = 'position';
    $filter['type'] = 'include';
    $filter['op'] = 'equal';
    $filter['value'][0] = [];
    if($_1){
      $filter['value'][0][] = '1';
    }
    if($_2_3){
      $filter['value'][0][] = '[2 TO 3]';
    }
    if($_4_10){
      $filter['value'][0][] = '[4 TO 10]';
    }
    if($_11_20){
      $filter['value'][0][] = '[11 TO 20]';
    }
    if($_21_50){
      $filter['value'][0][] = '[21 TO ]';
    }
    $filter['value'][0] = implode(' OR ', $filter['value'][0]);
    array_push($this->filtersArray, $filter);
  }
  /**
   * Reset filters to empty array.
   */
  public function removeFilters(){
    $this->filtersArray = [];
  }
}