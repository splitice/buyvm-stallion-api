<?php
/**
 * Created by PhpStorm.
 * User: splitice
 * Date: 7/1/14
 * Time: 9:01 PM
 */
namespace Splitice\BuyVM;

interface IApiClient
{
    function execute($action, $data);
}