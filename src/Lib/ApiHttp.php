<?php
/**
 * Created by PhpStorm.
 * User: xingchen
 * Date: 2019/11/21
 * Time: 下午6:49
 */

namespace LinghitAi\PlatformPhpSdk\Lib;

//require_once 'KongHmac.php';

class ApiHttp
{


    /**
     * @param  string $url
     * @param  array $data HTTP POST BODY
     * @param  array $param HTTP URL
     * @param  array $headers HTTP header
     * @return array
     */
    public function post($url, $data,$ak,$secret){
       // $url = $this->buildUrl($url, $params);

        $hdate = $this->getHdate();
        $signature = KongHmac::getSignature($hdate,$secret);

        $headers=array(
            "Content-Type: application/json; charset=utf-8",
            "x-date: " . $hdate,
            "Authorization: " . "hmac username=".$ak."," .
            " algorithm=hmac-sha1, headers=x-date, " .
            "signature=".$signature.")"
        );

        //var_dump( $headers);

       // $headers = array_merge($this->headers, $this->buildHeaders($headers));
        $ch = curl_init();
       // $this->prepare($ch);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($data));
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 60000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 60000);
        $content = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($code === 0){
            throw new \Exception(curl_error($ch));
        }
        curl_close($ch);

        return $content;

    }

    public static function getHdate(){
        date_default_timezone_set("GMT");

        return date("D, d M Y H:i:s e");

    }

    /**
     * 请求预处理
     * @param resource $ch
     */
    public function prepare($ch){
        foreach($this->conf as $key => $value){
            curl_setopt($ch, $key, $value);
        }
    }
}