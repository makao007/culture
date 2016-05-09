<?php namespace App\Http\Controllers;

//use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

use App\Models\LinkModel;

abstract class Controller extends BaseController
{
//    use DispatchesCommands, ValidatesRequests;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $limit = 10;       //每页显示记录数
    protected $model;       //数据模型
    protected $uploadSizeLimit = 1024*1023*1;       //上传文件大小限制 1M
    protected $uploadVideoSizeLimit = 1024*1023*50;       //上传文件大小限制 50M
    protected $userid;
    protected $cid;
    protected $person;
    protected $company;
    protected $firmNum = 3;     //企业服务记录数
    protected $comPptNum = 3;     //企业宣传记录数
    protected $comJobNum = 5;     //企业工作记录数
    protected $sefLogo = '/assets/images/icon.png';        //本网站普通自己的logo地址
//    protected $proAttrNum = 30;        //可以做动画的属性数量限制

    protected $lists = [      //数据列表
        ''=> '所有列表',
        'trash'=> '回收站',
        'create'=> [
            'url'=> 'create',
            'name'=> '创建作品',
        ],
        'edit'=> [
            'url'=> 'edit',
            'name'=> '修改作品',
        ],
        'show'=> [
            'url'=> 'show',
            'name'=> '查看详情',
        ],
        'category'=> [
            'url'=> '',
            'name'=> '',
        ],
        'func'=> [
            'url'=> '',
            'name'=> '',
        ],
    ];

//    protected $menus = [    //菜单
//        'home'=> '首 页',
//        'product'=> '产品样片',
//        'creation'=> '在线作品',
//        'supply'=> '供应企业',
//        'demand'=> '需求信息',
//        'entertain'=> '娱乐频道',
//        'rent'=> '租赁频道',
//        'design'=> '设计频道',
//        'about'=> '关于我们',
//        'idea'=> '创意点子',
//    ];
}