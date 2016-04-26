<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * 公司后台基础控制器
     */

    protected $topmenus = [
        'contact'=> '联系方式',
        'recruit'=> '招聘',
        'team'=> '团队',
        'firm'=> '服务项目',
        'brief'=> '花絮',
        'product'=> '产品',
        'intro'=> '公司介绍',
        'home'=> '首页',
    ];

    /**
     * 判断是否已有公司页面，无则给默认页面
     */
    public function iscompany()
    {
        if (!\Session::get('user.uid')) { return redirect('/login'); }
        if (!\Session::get('user.cid')) { return redirect(''); }
    }
}