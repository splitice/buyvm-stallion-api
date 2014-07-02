<?php
namespace Splitice\BuyVM;

/**
 * BuyVM Api implementation
 *
 * @package Splitice\BuyVM
 */
class BuyVMApi {
    /**
     * @var IBuyVMApiClient
     */
    private $client;

    function __construct(IBuyVMApiClient $client){
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
        return $this->client->execute_action('rdns',array('ip'=>$ip,'rdns'=>$rdns));
    }

    /**
     * Reboot a VPS
     *
     * @return array
     */
    function reboot(){
        return $this->client->execute_action('reboot');
    }

    /**
     * Boot a VPS
     *
     * @return array
     */
    function boot(){
        return $this->client->execute_action('boot');
    }

    function shutdown(){
        return $this->client->execute_action('shutdown');
    }

    /**
     * Get information for a set of fields
     *
     * @param array $fields
     * @return array
     */
    function info($fields){
        return $this->client->execute_info($fields);
    }

    /**
     * Get information on a single field
     *
     * @param $field
     * @throws ApiException
     * @return string
     */
    function get($field){
        switch($field){
            case 'bw':
            case 'hdd':
            case 'mem':
            case 'ipaddr':
                $return_field = $field;
                break;
            case 'status':
                $return_field = 'statusmsg';
                break;
            default:
                throw new ApiException('Unknown information field: '.$field);
        }
        $return = $this->info(array($field));

        if(isset($return[$return_field])){
            return $return[$return_field];
        }

        throw new ApiException('Unable to fetch information on field: '.$field);
    }
}