<?php
namespace App\Api\ApiBusiness;

use Curl\Curl;

class ApiStaff
{
    /**
     * 人员接口
     */

    public static function index($limit,$pageCurr=1,$uid=0,$genre=0,$type=0,$isshow=2,$del=0)
    {
        $apiUrl = ApiBase::getApiCurl() . '/api/v1/staff';
        $curl = new Curl();
        $curl->setHeader('X-Authorization', ApiBase::getApiKey());
        $curl->post($apiUrl, array(
            'limit' =>  $limit,
            'page'  =>  $pageCurr,
            'uid'   =>  $uid,
            'genre' =>  $genre,
            'type'  =>  $type,
            'isshow'    =>  $isshow,
            'del'       =>  $del,
        ));
        $response = json_decode($curl->response);
        if ($response->error->code != 0) {
            return array('code' => -1, 'msg' => $response->error->msg);
        }
        return array(
            'code' => 0,
            'data' => ApiBase::objToArr($response->data),
        );
    }

    /**
     * 通过 uid 获取艺人列表
     */
    public static function getStaffsByUid($uid,$genre,$type)
    {
        $apiUrl = ApiBase::getApiCurl() . '/api/v1/staff/staffsbyuid';
        $curl = new Curl();
        $curl->setHeader('X-Authorization', ApiBase::getApiKey());
        $curl->post($apiUrl, array(
            'uid'   =>  $uid,
            'genre' =>  $genre,
            'type'  =>  $type,
        ));
        $response = json_decode($curl->response);
        if ($response->error->code != 0) {
            return array('code' => -1, 'msg' => $response->error->msg);
        }
        return array(
            'code' => 0,
            'data' => ApiBase::objToArr($response->data),
        );
    }

    public static function show($id)
    {
        $apiUrl = ApiBase::getApiCurl() . '/api/v1/staff/show';
        $curl = new Curl();
        $curl->setHeader('X-Authorization', ApiBase::getApiKey());
        $curl->post($apiUrl, array(
            'id'    =>  $id,
        ));
        $response = json_decode($curl->response);
        if ($response->error->code != 0) {
            return array('code' => -1, 'msg' => $response->error->msg);
        }
        return array(
            'code' => 0,
            'data' => ApiBase::objToArr($response->data),
        );
    }

    public static function add($data)
    {
        $apiUrl = ApiBase::getApiCurl() . '/api/v1/staff/add';
        $curl = new Curl();
        $curl->setHeader('X-Authorization', ApiBase::getApiKey());
        $curl->post($apiUrl, $data);
        $response = json_decode($curl->response);
        if ($response->error->code != 0) {
            return array('code' => -1, 'msg' => $response->error->msg);
        }
        return array(
            'code' => 0,
            'msg' => $response->error->msg,
        );
    }

    public static function modify($data)
    {
        $apiUrl = ApiBase::getApiCurl() . '/api/v1/staff/modify';
        $curl = new Curl();
        $curl->setHeader('X-Authorization', ApiBase::getApiKey());
        $curl->post($apiUrl, $data);
        $response = json_decode($curl->response);
        if ($response->error->code != 0) {
            return array('code' => -1, 'msg' => $response->error->msg);
        }
        return array(
            'code' => 0,
            'msg' => $response->error->msg,
        );
    }

    /**
     * 获取 model
     */
    public static function getModel()
    {
        $apiUrl = ApiBase::getApiCurl() . '/api/v1/staff/getmodel';
        $curl = new Curl();
        $curl->setHeader('X-Authorization', ApiBase::getApiKey());
        $curl->post($apiUrl, array(
        ));
        $response = json_decode($curl->response);
        if ($response->error->code != 0) {
            return array('code' => -1, 'msg' => $response->error->msg);
        }
        return array(
            'code' => 0,
            'model' => ApiBase::objToArr($response->model),
        );
    }
}