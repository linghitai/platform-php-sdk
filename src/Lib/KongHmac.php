<?php
/**
 * Created by PhpStorm.
 * User: xingchen
 * Date: 2019/11/21
 * Time: 下午7:27
 */
namespace LinghitAi\PlatformPhpSdk\Lib;

class KongHmac
{
    public static function getSignature($hdate,$secret){
        $str = "x-date: " . $hdate;
        //$str = "x-date: Mon, 25 Nov 2019 03:08:20 GMT";
        $hash_hmac = hash_hmac("sha1", $str, $secret, true);
        $signature = base64_encode($hash_hmac);

        return $signature;
    }
}