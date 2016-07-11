<?php
namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class PicModel extends BaseModel
{
    protected $table = 'bs_pics';
    protected $fillable = [
        'id','uid','name','url','width','height','intro','del','created_at','updated_at',
    ];

    /**
     * 自动存储图片尺寸
     */
    public static function saveSize()
    {
        $picModels = PicModel::where('width',0)->orWhere('height',0)->get();
        if (count($picModels)) {
            foreach ($picModels as $picModel) {
                $size = getimagesize(ltrim($picModel->url,'/'));
                PicModel::where('id',$picModel->id)->update(array('width'=> $size[0], 'height'=> $size[1]));
            }
        }
    }

    /**
     * 设置一张图片尺寸
     */
    public static function setOneSize($id,$w=null,$h=null)
    {
        if (!$w || !$h) {
            echo "<script>alert('宽度、高度不能同时为空');history.go(-1);</script>";exit;
        } elseif (!$w && $h) {
            PicModel::where('id',$id)->update(array('height'=> $h));
        } elseif ($w && !$h) {
            PicModel::where('id',$id)->update(array('width'=> $w));
        } elseif ($w && $h) {
            PicModel::where('id',$id)->update(array('width'=> $w, 'height'=> $h));
        }
    }
}