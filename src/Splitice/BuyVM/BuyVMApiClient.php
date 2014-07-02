<?php
namespace Splitice\BuyVM;

/**
 * Stallion 'SolusVM like' API client
 * @package Splitice\BuyVM
 */
class BuyVMApiClient implements IBuyVMApiClient
{
    const URL = "https://manage.buyvm.net/api/client/command.php";
    private $ch;
    private $key;
    private $hash;

    function __construct($key, $hash, $url = self::URL){
        $this->key = $key;
        $this->hash = $hash;

        //Setup curl
        $this->ch = curl_init($url);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($this->ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Expect:'));
    }

    function __destruct(){
        curl_close($this->ch);
    }

    private function execute($post){
        //Set authentication
        $post['key'] = $this->key;
        $post['hash'] = $this->hash;

        //set post data
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post);

        //Execute request
        $data = curl_exec($this->ch);
        $code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);

        //Handle response
        if($code == 200){
            preg_match_all('/<(.*?)>([^<]+)<\/\\1>/i', $data, $match);
            $result = array();

            foreach ($match[1] as $x => $y) {
                $result[$y] = $match[2][$x];
            }

            return $result;
        }else{
            throw new ApiTransportException($code);
        }
    }

    function execute_action($action, $data = array()){
        $data['action'] = $action;
        return $this->execute($data);
    }

    function execute_info($fields){
        $post = array();
        foreach($fields as $f){
            $post[$f] = 'true';
        }
        return $this->execute($post);
    }
}