<?php
/**
 * Created by PhpStorm.
 * User: xingchen
 * Date: 2019/11/21
 * Time: 下午5:23
 */
/**
 * Aip Base 基类
 */

namespace LinghitAi\PlatformPhpSdk;


use LinghitAi\PlatformPhpSdk\Lib\RequestParametersModel;
use LinghitAi\PlatformPhpSdk\Lib\ApiHttp;

//require_once 'ApiHttp.php';

abstract class ApiBase {
    /**
     * $ak
     * @var string
     */
    protected $ak = '';
    /**
     * $sk
     * @var string
     */
    protected $sk = '';

    /**
     * @param string $ak
     * @param string $sk
     */
    public function __construct($ak, $sk){
        $this->ak = trim($ak);
        $this->sk = trim($sk);

    }

    public static function frequestPostServer(RequestParametersModel $params){
        $url = $params->getUrl();
        $ak = $params->getAk();
        $sk = $params->getSk();
        $timeout = $params->getTimeout();

        $http = new ApiHttp();
        //var_dump($params);
        $res = $http->post($url,$params->getJson(),$ak,$sk,$timeout);

        $obj = json_decode($res,TRUE);

        $json = json_encode($obj);

        return $json;
    }


}