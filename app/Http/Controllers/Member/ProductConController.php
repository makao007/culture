<?php
namespace App\Http\Controllers\Member;

use App\Models\ProductConModel;
use Illuminate\Http\Request;

class ProductConController extends BaseController
{
    /**
     * 会员后台 产品内容
     */

    public function __construct()
    {
        parent::__construct();
        $this->lists['func']['name'] = '产品内容';
        $this->lists['func']['url'] = 'productcon';
        $this->lists['create']['name'] = '添加内容';
        $this->model = new ProductConModel();
    }

    public function index()
    {
        $curr['name'] = $this->lists['']['name'];
        $curr['url'] = $this->lists['']['url'];
        $result = [
            'datas'=> $this->query($del=0),
            'lists'=> $this->lists,
            'prefix_url'=> '/member/productcon',
            'curr'=> $curr,
        ];
        return view('member.productcon.index', $result);
    }

    public function trash()
    {
        $curr['name'] = $this->lists['trash']['name'];
        $curr['url'] = $this->lists['trash']['url'];
        $result = [
            'datas'=> $this->query($del=1),
            'lists'=> $this->lists,
            'prefix_url'=> '/member/productcon/trash',
            'curr'=> $curr,
        ];
        return view('member.productcon.index', $result);
    }

    public function create()
    {
        $curr['name'] = $this->lists['create']['name'];
        $curr['url'] = $this->lists['create']['url'];
        $result = [
            'model'=> $this->model,
            'lists'=> $this->lists,
            'curr'=> $curr,
        ];
        return view('member.productcon.create', $result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['created_at'] = date('Y-m-d H:i:s', time());
        ProductConModel::create($data);
        return redirect('/member/productcon');
    }

    public function edit($id)
    {
        $curr['name'] = $this->lists['edit']['name'];
        $curr['url'] = $this->lists['edit']['url'];
        $result = [
            'data'=> ProductConModel::find($id),
            'model'=> $this->model,
            'lists'=> $this->lists,
            'curr'=> $curr,
        ];
        return view('member.productcon.create', $result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = date('Y-m-d H:i:s', time());
        ProductConModel::where('id',$id)->update($data);
        return redirect('/member/productcon');
    }

    public function destroy($id)
    {
        ProductConModel::where('id',$id)->update(['del'=> 1]);
        return redirect('/member/productcon');
    }

    public function restore($id)
    {
        ProductConModel::where('id',$id)->update(['del'=> 0]);
        return redirect('/member/productcon/trash');
    }

    public function forceDelete($id)
    {
        ProductConModel::where('id',$id)->delete();
        return redirect('/member/productcon/trash');
    }




    /**
     * 收集数据
     */
    public function getData(Request $request)
    {
        if (!$request->pic_id || !$request->name) {
            echo "<script>alert('图片、文字必须填选一个！');history.go(-1);</script>";exit;
        }
        //图片样式
        if ($request->isPicAttr) {
            $pic_attr = [];
        }
        //文字样式
        if ($request->isTextAttr) {
            $pic_attr = [];
        }
        $data = [
            'name'=> $request->name,
            'productid'=> $request->productid,
            'attrid'=> $request->attrid,
            'genre'=> $request->genre,
            'pic_attr'=> isset($pic_attr)?serialize($pic_attr):'',
            'text_attr'=> isset($text_attr)?serialize($text_attr):'',
            'intro'=> $request->intro,
        ];
        return $data;
    }

    /**
     * 查询方法
     */
    public function query($del=0)
    {
        return ProductConModel::where('del',$del)
            ->orderBy('id','desc')
            ->paginate($this->limit);
    }
}