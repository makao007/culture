<?php
namespace App\Http\Controllers\Home;

//use Illuminate\Http\Request;
use App\Models\StoryBoardModel;
use App\Models\StoryBoardLikeModel;

class StoryBoardController extends BaseController
{
    /**
     *  会员后台 订单流程管理
     */

    public function index($way='',$genre=0)
    {
        if ($way==1) { $way = 'isnew'; }
        elseif ($way==2) { $way = 'ishot'; }
        $this->isnew();
        $result = [
            'lists'=> $this->list,
            'datas'=> $this->query($way,$genre),
            'curr_menu'=> 'storyboard',
            'genre'=> $genre,
            'way'=> $way,
        ];
        return view('home.storyboard.index', $result);
    }

    public function show($id)
    {
        if (!\Session::has('user.uid')) { return redirect('/login'); }
//        $this->userid = \Session::get('user.uid');
        $result = [
            'lists'=> $this->list,
            'data'=> StoryBoardModel::find($id),
            'curr_menu'=> 'storyboard/show',
        ];
        return view('home.storyboard.show', $result);
    }

    /**
     * 将超过5天的记录 isnew设置0
     */
    public function isnew()
    {
        $day = 86400;       //一天的秒数
        //计算5天前时间
        $oldTime = date('Y-m-d H:i:s',time()-$day*5);
        StoryBoardModel::where('created_at','<',$oldTime)->update(['isnew'=> 0]);
//        return $oldTime;
    }

    public function like($way,$id)
    {
        //登录权限限制
        if (!\Session::has('user.uid')) { return redirect('/login'); }
        $userid = \Session::get('user.uid');
        $storyBoardLikeModel = StoryBoardLikeModel::where(['uid'=>$userid,'sbid'=>$id])->first();
        if ($storyBoardLikeModel) {
            StoryBoardLikeModel::where('id',$storyBoardLikeModel->id)->delete();
        } else {
            $create = array('uid'=>$userid,'sbid'=>$id);
            StoryBoardLikeModel::create($create);
        }
        //确定所在页面：1index,2show
        if ($way==2) { return redirect('/storyboard/'.$id); }
        elseif ($way==1) { return redirect('/storyboard'); }
    }

    public function query($way,$genre)
    {
        if ($way) {
            if ($genre) {
                $datas = StoryBoardModel::where('del',0)
                    ->where('isshow',1)
//                ->where('img','<>',0)
                    ->where('genre',$genre)
                    ->where($way,1)
                    ->orderBy('sort','desc')
                    ->orderBy('id','desc')
                    ->paginate($this->limit);
            } else {
                $datas = StoryBoardModel::where('del',0)
                    ->where('isshow',1)
//                ->where('img','<>',0)
                    ->where($way,1)
                    ->orderBy('sort','desc')
                    ->orderBy('id','desc')
                    ->paginate($this->limit);
            }
        } else {
            if ($genre) {
                $datas = StoryBoardModel::where('del',0)
                    ->where('isshow',1)
//                ->where('img','<>',0)
                    ->where('genre',$genre)
                    ->orderBy('sort','desc')
                    ->orderBy('id','desc')
                    ->paginate($this->limit);
            } else {
                $datas = StoryBoardModel::where('del',0)
                    ->where('isshow',1)
//                ->where('img','<>',0)
                    ->orderBy('sort','desc')
                    ->orderBy('id','desc')
                    ->paginate($this->limit);
            }
        }
        return $datas;
    }
}