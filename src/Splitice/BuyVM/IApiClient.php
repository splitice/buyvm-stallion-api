<?php
/**
 * Created by PhpStorm.
 * User: splitice
 * Date: 7/1/14
 * Time: 9:01 PM
 */
namespace Splitice\BuyVM;

/**
 * An interface for a BuyVM compatible client
 *
 * @package Splitice\BuyVM
 */
interface IApiClient
{
    /**
     * Execute an action request
     *
     * @param string $action
     * @param array $data
     * @return array
     */
    function execute_action($action, $data = array());

    /**
     * Execute an information request
     *
     * @param array $fields
     * @return array
     */
    function execute_info($fields);
}