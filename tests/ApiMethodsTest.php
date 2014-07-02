<?php
use Splitice\BuyVM\BuyVMApi;

/**
 * Created by PhpStorm.
 * User: splitice
 * Date: 6/4/14
 * Time: 2:24 PM
 */

class ApiMethodsTest extends PHPUnit_Framework_TestCase {
    const API_CLIENT = '\\Splitice\\BuyVM\\IBuyVMApiClient';

    function testRdns(){
        //Setup
        $ip = '1.1.1.1';
        $rdns = 'test-ptr';

        //Assert
        $client = $this->getMock(self::API_CLIENT);
        $client->expects($this->once())->method('execute_action')->with($this->equalTo('rdns'),$this->equalTo(array('ip'=>$ip,'rdns'=>$rdns)));

        //Do
        $api = new BuyVMApi($client);
        $api->rdns($ip, $rdns);
    }

    function testBandwidth(){
        //Assert
        $client = $this->getMock(self::API_CLIENT);
        $client->expects($this->once())->method('execute_info')->with($this->equalTo(array('bw')))->will($this->returnValue(array('bw'=>'total,used,free,percentage')));

        //Do
        $api = new BuyVMApi($client);
        $api->get('bw');
    }
} 