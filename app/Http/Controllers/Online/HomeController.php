<?php
namespace App\Http\Controllers\Online;

use App\Models\Online\ProductModel;

class HomeController extends BaseController
{
    /**
     * 在线创作窗口主页
     */

    protected $limit = 12;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ProductModel();
    }

    public function index($cate=0)
    {
        $result = [
            'datas'=> $this->query($cate),
            'model'=> $this->model,
            'prefix_url'=> DOMAIN.'online',
            'cate'=> $cate,
        ];
        return view('online.home.index', $result);
    }

    public function show($id)
    {
        $result = [
            'data'=> ProductModel::find($id),
        ];
        return view('online.home.show', $result);
    }




    /**
     * 以下是要展示的数据
     */

    public function query($cate)
    {
        if ($cate) {
            $datas = ProductModel::where('cate',$cate)
                ->where('isshow',1)
                ->orderBy('sort','desc')
                ->orderBy('id','desc')
                ->paginate($this->limit);
        } else {
            $datas = ProductModel::where('isshow',1)
                ->orderBy('sort','desc')
                ->orderBy('id','desc')
                ->paginate($this->limit);
        }
        $datas->limit = $this->limit;
        return $datas;
    }






    /**
     * 在线创作动画预览
     */
    public function lay()
    {
        return view('online.pre.index');
    }
}