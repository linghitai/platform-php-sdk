<?php
/**
 * Created by PhpStorm.
 * User: xingchen
 * Date: 2019/11/21
 * Time: 下午5:32
 */
namespace LinghitAi\PlatformPhpSdk\Lib;

class RetResult {
    public static function retJson($code,$message = '',$data = array())
    {
        if(!is_numeric($code))
        {
            return '';
        }

        $result=array(
            'code' => $code,
            'message' => $message,
        'data' => $data
    );

    echo json_encode($result);
    exit;
}
}