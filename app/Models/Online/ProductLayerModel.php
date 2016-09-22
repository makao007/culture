<?php
namespace App\Models\Online;

use App\Models\Base\BaseModel;

class ProductLayerModel extends BaseModel
{
    protected $table = 'bs_pro_layer';
    protected $fillable = [
        'id','name','attrid','a_name','timelong','func','delay','created_at','updated_at',
    ];
    //速度曲线
    protected $funcs = [
        1=>'linear','ease','ease-in','ease-out','ease-in-out',/*'cubic-bezier',*/
    ];
    protected $funcNames = [
        1=>'匀速','默认，先慢再快后慢','低速开始','低速结束','低速开始和结束',/*'贝塞尔函数自定义',*/
    ];

    /**
     * 获得同产品的所有属性
     */
    public function getAttrs($attrid=null)
    {
        $attrid = $attrid ? $attrid : $this->attrid;
        $attrModel = ProductAttrModel::find($attrid);
        $productModel = ProductModel::find($attrModel->productid);
        $attrs = ProductAttrModel::where('genre',1)->where('productid',$productModel->id)->get();
        return count($attrs) ? $attrs : [];
    }

    public function getAttrName()
    {
        if ($this->attrid) {
            $attrModel = ProductAttrModel::find($this->attrid);
            if ($attrModel) { $attrName = $attrModel->name; }
        }
        return isset($attrName) ? $attrName : '';
    }

    public function getFunc()
    {
        return array_key_exists($this->func,$this->funcs) ? $this->funcs[$this->func] : '';
    }

    public function getFuncName()
    {
        return array_key_exists($this->func,$this->funcNames) ? $this->funcNames[$this->func] : '';
    }
}