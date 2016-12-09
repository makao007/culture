<?php
namespace App\Http\Controllers\Admin;

use App\Api\ApiUser\ApiLog;
use App\Api\ApiUser\ApiUsers;
use App\Http\Requests;
use App\Models\Base\OrderFirmModel;
use App\Models\Base\OrderModel;
use App\Models\Online\OrderProductModel;

class HomeController extends BaseController
{
    /**
     * 系统后台首页
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $result = [
            'users'=> $this->users(),
            'orders'=> $this->orders(),
        ];
        return view('admin.home.index', $result);
    }





    public function users()
    {
        //所有用户
        $rstUsers_all = ApiUsers::getUsersByTime('');
        $users_all = $rstUsers_all['code']==0 ? $rstUsers_all['data'] : [];
//        $users_week = LogModel::where('loginTime','>',time()-3600*24*7)
//            ->distinct('uid')
//            ->get();
//        $users_hour = LogModel::where('loginTime','>',time()-3600)
//            ->distinct('uid')
//            ->get();
        //一周内登录
        $rstUsers_week = ApiLog::getLogsByTime(1,time()-3600*24*7);
        $users_week = $rstUsers_week['code']==0 ? $rstUsers_week['data'] : [];
        //今天登录
        $rstUsers_hour = ApiLog::getLogsByTime(1,time()-3600);
        $users_hour = $rstUsers_hour['code']==0 ? $rstUsers_hour['data'] : [];
        //最新注册用户
//        $datas = UserModel::where('isauth','>',0)
//            ->where('created_at','>',)
//            ->orderBy('id','desc')
//            ->paginate($this->limit);
        $rstUsers = ApiUsers::getUsersByTime(time()-3600*24*7);
        $datas = $rstUsers['code']==0 ?$rstUsers['data'] : [];
        if (!count($datas)) {
            $rstUsers2 = ApiUsers::getUsersByTime(0);
            $datas = $rstUsers2['code']==0 ?$rstUsers2['data'] : [];
        }
        return array(
            'datas'=> $datas,
            'all'=> count($users_all),
            'week'=> count($users_week),
            'hour'=> count($users_hour),
        );
    }

    public function orders()
    {
        $orders_create = OrderProductModel::all();
        $orders_all = OrderModel::all();
        $orders_firm = OrderFirmModel::all();
        //各个订单
        $orders_C = OrderProductModel::where('isshow',1)
            ->paginate($this->limit);
        $orders_A = OrderModel::where('del',0)
            ->where('isshow',1)
            ->paginate($this->limit);
        $orders_F = OrderFirmModel::where('del',0)
            ->where('isshow',1)
            ->paginate($this->limit);
        return array(
            'create'=> count($orders_create),
            'all'=> count($orders_all),
            'firm'=> count($orders_firm),
            'ordersC'=> $orders_C,
            'ordersA'=> $orders_A,
            'ordersF'=> $orders_F,
        );
    }
}