<?php
/**
 * Created by PhpStorm.
 * User: xingchen
 * Date: 2019/11/21
 * Time: 下午5:39
 */
namespace LinghitAi\PlatformPhpSdk\Lib;

class RequestParametersModel{
    /**
     * @var null|string
     */
    protected $url = '';

    /**
     * @var null|string
     */
    protected $ak = '';

    /**
     * @var null|string
     */
    protected $sk = '';

    /**
     * @var null|string
     */
    protected $timeout = 60;

    /**
     * @var null|string
     */
    protected $json = array();

    /**
     * @return null|string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null|string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return null|string
     */
    public function getAk()
    {
        return $this->ak;
    }

    /**
     * @param null|string $ak
     */
    public function setAk($ak)
    {
        $this->ak = $ak;
    }

    /**
     * @return null|string
     */
    public function getSk()
    {
        return $this->sk;
    }

    /**
     * @param null|string $sk
     */
    public function setSk($sk)
    {
        $this->sk = $sk;
    }

    /**
     * @return null|string
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * @param null|string $json
     */
    public function setJson($json)
    {
        $this->json = $json;
    }

    /**
     * @return null|string
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param null|string $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }





}