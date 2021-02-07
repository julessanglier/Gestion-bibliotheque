<?php
/* Copyright (C) Medelice, All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Jules Sanglier <jsgr@protonmail.ch>, January 2018
 */

require_once(__DIR__ . '/JsonResponseStatusType.php');
require_once(__DIR__.'/JsonResponsePayload.php');

/**
 * Json based response for POST/GET requests returns.
 * Always dealing with a status, a payload (which contains all the data) and a timestamp.
 * Class JsonResponse
 * @since Alpha 0.5
 */
class JsonResponse
{
    /**
     * The status of the response.
     * Defined from JsonResponseStatusType
     * @var int
     */
  private $status;
    /**
     * Array which carry all the returned data, view it like a util charge.
     * @var array
     */
  private $payload = array();
    /**
     * Unix timestamp, response issued at
     * @var int
     */
    private $iat;

    /**
     * JsonResponse constructor, must be instanced with all parameters.
     * @param $status int|JsonResponseStatusType
     * @param ...$in_payload JsonResponsePayload Put null for no payload.
     */
  public function __construct($status, ...$in_payload){
    $this->status = $status;

    foreach ($in_payload as $payload) {
      if ($payload != null)
        $this->payload[$payload->_key] = $payload->_value;
    }
    $this->iat = time();
  }

    /**
     * Add after instanced the constructor a new JsonResponsePayload
     * @param $payload JsonResponsePayload
     */
  public function add_payload($payload){
    if ($payload !== null)
      $this->payload[$payload->_key] = $payload->_value;
  }

    /**
     * Get the json encoded version of the response.
     * @return string
     */
  public function encode(){
    return json_encode(get_object_vars($this));
  }

  /**
   * Just echo the json encoded response.
   * Added lately
   */
  public function transmit(){
    echo $this->encode();
  }
}
