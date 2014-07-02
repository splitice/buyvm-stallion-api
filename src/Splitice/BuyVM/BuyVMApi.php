<?php
namespace Splitice\BuyVM;

/**
 * BuyVM Api implementation
 *
 * @package Splitice\BuyVM
 */
class BuyVMApi {
    /**
     * @var IApiClient
     */
    private $client;

    function __construct(IApiClient $client){
        $this->client = $client;
    }

    /**
     * Set a Reverse DNS entry for an IP address
     *
     * @param string $ip
     * @param string $rdns
     * @return array API return values
     */
    function rdns($ip, $rdns){
        return $this->client->execute('rdns',array('ip'=>$ip,'rdns'=>$rdns));
    }
}