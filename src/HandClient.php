<?php
/**
 * Created by PhpStorm.
 * User: xingchen
 * Date: 2019/11/21
 * Time: 下午5:22
 */

namespace LinghitAi\PlatformPhpSdk;

use LinghitAi\PlatformPhpSdk\Lib\RetResult;

use LinghitAi\PlatformPhpSdk\Lib\RequestParametersModel;

use LinghitAi\PlatformPhpSdk\Lib\Config;

use LinghitAi\PlatformPhpSdk\Lib\GlobalIds;


class HandClient extends ApiBase
{
    public function handRecognitionByBase64($imgBase64,$timeout = 60)
    {
        $RequestParametersModel = new RequestParametersModel();
        $RequestParametersModel->setAk($this->ak);
        $RequestParametersModel->setsk($this->sk);
        $RequestParametersModel->setTimeout($timeout);

        //定义一个正则表达式的筛选规则，为了获取图片的类型,'/^data:image\/(\w+);base64/'
         $rgex = "/^data:image\/(\w+);base64/";

         $type = $this->getSubUtilSimple($imgBase64, $rgex);
        //var_dump($type);
         if ($type == ''){
             RetResult::retJson(1000503,'base64转码失败');
         }

         if ($type!= 'jpg' && $type != 'jpeg' && $type !='png'){
             RetResult::retJson(1000503,'base64转码失败');
         }

         $arr = array();
         $arr['image'] = $imgBase64;
         $arr['business'] = 'kong';

      //   $jsonencode = json_encode($arr);

        $RequestParametersModel->setJson($arr);
        $RequestParametersModel->setUrl(GlobalIds::handRecognition);

        return $this->frequestPostServer($RequestParametersModel);

    }

    public function getSubUtilSimple($imgBase64,$rgex){
        preg_match($rgex, $imgBase64, $out);
        if ($out != '' && $out[1] != ''){
            return $out[1];
        };
        return '';
    }

    public function handRecognitionByUrl($url,$timeout = 60)
    {
        $RequestParametersModel = new RequestParametersModel();
        $RequestParametersModel->setAk($this->ak);
        $RequestParametersModel->setsk($this->sk);
        $RequestParametersModel->setTimeout($timeout);

        if ($url == ''){
            RetResult::retJson(1000503,'图片地址不能为空');
        }

        $arr = array();
        $arr['url'] = $url;
        $arr['business'] = 'kong';

        $RequestParametersModel->setJson($arr);
        $RequestParametersModel->setUrl(GlobalIds::handRecognition);

        return $this->frequestPostServer($RequestParametersModel);

    }

}
