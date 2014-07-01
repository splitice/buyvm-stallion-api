<?php
namespace Splitice\BuyVM;

class BuyVMApi {
    /**
     * @var IApiClient
     */
    private $client;

    function __construct(IApiClient $client){
        $this->client = $client;
    }
    function rdns($ip, $rdns){
        return $this->client->execute('rdns',array('ip'=>$ip,'rdns'=>$rdns));
    }
}