<?php
use Splitice\BuyVM\BuyVMApi;

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

    function testHardDrive(){
        //Assert
        $client = $this->getMock(self::API_CLIENT);
        $client->expects($this->once())->method('execute_info')->with($this->equalTo(array('hdd')))->will($this->returnValue(array('hdd'=>'total,used,free,percentage')));

        //Do
        $api = new BuyVMApi($client);
        $api->get('hdd');
    }

    function testMemory(){
        //Assert
        $client = $this->getMock(self::API_CLIENT);
        $client->expects($this->once())->method('execute_info')->with($this->equalTo(array('mem')))->will($this->returnValue(array('mem'=>'total,used,free,percentage')));

        //Do
        $api = new BuyVMApi($client);
        $api->get('mem');
    }

    function testIpAddresses(){
        //Assert
        $client = $this->getMock(self::API_CLIENT);
        $client->expects($this->once())->method('execute_info')->with($this->equalTo(array('ipaddr')))->will($this->returnValue(array('ipaddr'=>'1.2.3.4,2.3.4.5,4.5.6.7,7.8.9.10')));

        //Do
        $api = new BuyVMApi($client);
        $api->get('ipaddr');
    }

    function testStatus(){
        //Assert
        $client = $this->getMock(self::API_CLIENT);
        $client->expects($this->once())->method('execute_info')->with($this->equalTo(array('status')))->will($this->returnValue(array('statusmsg'=>'online')));

        //Do
        $api = new BuyVMApi($client);
        $api->get('status');
    }
} 