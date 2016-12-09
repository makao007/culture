<?php
namespace App\Api\ApiUser;

use Curl\Curl;

class ApiPerson
{
    /**
     * 个人资料数据接口
     */

    /**
     * 单个资料
     */
    public static function getPersonInfo($uid)
    {
        $redisKey = 'personInfo';
        //判断缓存有没有该数据
        if ($redisResult = ApiBase::getRedis($redisKey)) {
            return array('code' => 0, 'data' => unserialize($redisResult));
        }
        //没有，接口读取
        $apiUrl = ApiBase::getApiCurl() . '/api/v1/person/one';
        $curl = new Curl();
        $curl->setHeader('X-Authorization', ApiBase::getApiKey());
        $curl->post($apiUrl, array(
            'uid' => $uid
        ));
        $response = json_decode($curl->response);
        if ($response->error->code != 0) {
            return array('code' => -2, 'msg' => $response->error->msg);
        }
        return array('code' => 0, 'data' => ApiBase::objToArr($response->data));
    }

    /**
     * 新增个人资料
     */
    public static function add($data)
    {
        $apiUrl = ApiBase::getApiCurl() . '/api/v1/person/add';
        $curl = new Curl();
        $curl->setHeader('X-Authorization', ApiBase::getApiKey());
        $curl->post($apiUrl, $data);
        $response = json_decode($curl->response);
        if ($response->error->code != 0) {
            return array('code' => -2, 'msg' => $response->error->msg);
        }
        return array('code' => 0, 'data' => ApiBase::objToArr($response->data));
    }
}