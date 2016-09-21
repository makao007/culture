<?php
namespace App\Models\Base;

use App\Models\Online\ProductModel;

class OrderProductModel extends BaseModel
{
    /**
     * 用户意见model
     */
    protected $table = 'bs_orders_pro';
    protected $fillable = [
        'id','productid','serial','seller','sellerName','buyer','buyerName','money','status','isshow','del','created_at','updated_at',
    ];

    protected $statuss = [
        1=>''
    ];

    public function product()
    {
        $product = ProductModel::find($this->productid);
        return isset($product) ? $product->name : '';
    }

    public function statusName()
    {
        return array_key_exists($this->status,$this->statuss) ? $this->statuss[$this->status] : '';
    }

    /**
     * 获取对应支付信息
     */
    public function getPay()
    {
        $payModel = PayModel::where('genre',3)
            ->where('order_id',$this->id)
            ->first();
        return $payModel ? $payModel : '';
    }

    /**
     * 获取对应支付金额
     */
    public function getMoney()
    {
        return $this->getPay() ? $this->getPay()->money() : '';
    }
}