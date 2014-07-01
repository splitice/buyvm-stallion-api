<?php
namespace Splitice\BuyVM;

class ApiClient implements IApiClient
{
    const URL = "https://manage.buyvm.net/api/client/command.php";
    private $ch;
    private $key;
    private $hash;

    function __construct($key, $hash, $url = self::URL){
        $this->key = $key;
        $this->hash = $hash;
        $this->ch = curl_init($url);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($this->ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
    }
    function execute($action, $data){
        $post = array(
            'key' => $this->key,
            'hash' => $this->hash,
            'action' => $action
        );
        foreach($data as $k=>$v){
            $post[$k] = $v;
        }
        die(var_dump($post));

        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post);

        $data = curl_exec($this->ch);
        $code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);

        if($code == 200){
            return $data;
        }else{
            throw new ApiException($code);
        }
    }
}