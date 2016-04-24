<?php
namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class VideoModel extends BaseModel
{
    protected $table = 'bs_videos';
    protected $fillable = [
        'id','uid','name','cate_id','url','intro','created_at',
    ];

    /**
     * 关联类型表
     */
    public function cate()
    {
        return $this->hasOne('App\Models\CategoryModel', 'id', 'cate_id');
    }
}