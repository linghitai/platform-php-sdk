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
    public function post($url, $data,$ak,$secret,$timeout = 60){

        $hdate = $this->getHdate();

        $signature = KongHmac::getSignature($hdate,$secret);

//        $headers=array(
//            "Content-Type: application/json; charset=utf-8",
//            "x-date: " . $hdate,
//            "Authorization: " . "hmac username=".$ak."," .
//            " algorithm=hmac-sha1, headers=x-date, " .
//            "signature=".$signature
//        );
        $headers[] = "Content-Type: application/json; charset=utf-8";
        $headers[] = 'x-date: '. $hdate;
        $headers[] = 'Authorization: '. 'hmac username="'.$ak.'",' .
            ' algorithm="hmac-sha1", headers="x-date", ' .
            'signature="'.$signature.'"';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($data));
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeout*1000);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, $timeout*1000);
        curl_setopt($ch,CURLINFO_HEADER_OUT,true);

        $content = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

       // var_dump( curl_getinfo($ch, CURLINFO_HEADER_OUT)); //官方文档描述是“发送请求的字符串”，其实就是请求的header。这个就是直接查看请求header，因为上面允许查看
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