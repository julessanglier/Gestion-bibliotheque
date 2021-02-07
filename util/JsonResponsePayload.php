<?php
/* Copyright (C) Medelice, All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Jules Sanglier <jsgr@protonmail.ch>, January 2018
 */

class JsonResponsePayload{

  public $_key;
  public $_value;

  public function __construct($key, $value){
    $this->_key = $key;
    $this->_value = $value;
  }
}
