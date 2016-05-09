<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\VideoModel;

class VideoController extends BaseController
{
    /**
     * 会员后台图片管理
     */

    public function __construct()
    {
        parent::__construct();
        $this->lists['func']['name'] = '我的视频';
        $this->lists['func']['url'] = 'video';
        $this->lists['create']['name'] = '添加视频';
        $this->model = new VideoModel();
    }

    public function index()
    {
        $result = [
            'datas'=> $this->query($del=0),
            'prefix_url'=> '/member/video',
            'lists'=> $this->lists,
            'curr_list'=> '',
        ];
        return view('member.video.index', $result);
    }

    public function trash()
    {
        $result = [
            'datas'=> $this->query($del=1),
            'prefix_url'=> '/member/video/trash',
            'lists'=> $this->lists,
            'curr_list'=> 'trash',
        ];
        return view('member.video.index', $result);
    }

    public function create()
    {
        $result = [
            'lists'=> $this->lists,
            'curr_list'=> 'create',
        ];
        return view('member.video.create', $result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['created_at'] = date('Y-m-d H:i:s', time());
        VideoModel::create($data);
        return redirect('/member/video');
    }

    public function edit($id)
    {
        $result = [
            'data'=> VideoModel::find($id),
            'lists'=> $this->lists,
            'curr_list'=> 'edit',
        ];
        return view('member.video.edit', $result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = date('Y-m-d H:i:s', time());
        VideoModel::where('id',$id)->update($data);
        return redirect('/member/video');
    }

    public function show($id)
    {
        $result = [
            'data'=> VideoModel::find($id),
            'lists'=> $this->lists,
            'curr_list'=> 'show',
        ];
        return view('member.bideo.show', $result);
    }

    public function destroy($id)
    {
        VideoModel::where('id',$id)->update(['del'=> 1]);
        return redirect('/member/video');
    }

    public function restore($id)
    {
        VideoModel::where('id',$id)->update(['del'=> 0]);
        return redirect('/member/video/trash');
    }

    public function forceDelete($id)
    {
        VideoModel  ::where('id',$id)->delete();
        return redirect('/member/video/trash');
    }



    public function getData(Request $request)
    {
        $data = [
            'uid'=> $this->userid,
            'name'=> $request->name,
            'intro'=> $request->intro,
            'url'=> $request->url,
        ];
        return $data;
    }

    public function query($del)
    {
        return VideoModel::where('del',$del)
            ->where('uid',\Session::get('user.uid'))
            ->paginate($this->limit);
    }
}