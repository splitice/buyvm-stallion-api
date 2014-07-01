<?php
/**
 * Created by PhpStorm.
 * User: splitice
 * Date: 7/1/14
 * Time: 10:43 PM
 */

namespace Splitice\BuyVM;


class ApiTransportException extends \Exception {
    public $http_code;

    function __construct($http_code){
        $this->http_code = $http_code;
    }
} 