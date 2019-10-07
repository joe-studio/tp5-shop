<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/1
 * Time: 17:36
 */

namespace joeStudio\shop\model;

use think\Model;
use traits\model\SoftDelete;

class ShopGoodsDetailsImage extends Model
{
    use SoftDelete;

    protected $field = true;
    protected $pk = 'details_image_id';
    protected $delete_time = "delete_time";

    public function addOne($data)
    {
        $object = ShopGoodsImage::data($data)->isUpdate(FALSE)->allowField(TRUE)->save();
        return $object;

    }

    public function editAll($data)
    {
        $object = ShopGoodsImage::isUpdate(TRUE)->saveAll($data,TRUE);
        return $object;
    }


    public function getOne($map=[])
    {
        $object = ShopGoodsImage::get($map);
        return $object;
    }


//================================================================================
    // 软删除
    public function softDel($id=0)
    {
        $object = ShopGoodsImage::destroy($id);
        return $object;
    }

    // 获取软删除数据
    public function getSoftOne($id=0)
    {
        $object = ShopGoodsImage::onlyTrashed()->find($id);
        return $object;
    }
    public function softAll($map=true)
    {
        $object = ShopGoodsImage::onlyTrashed()->where($map)->select();
        return $object;
    }
    // 恢复软删除
    public function restoreOne($id=0)
    {
        $object = ShopGoodsImage::restore([$this->pk=>$id]);
        return $object;
    }
    // 真实删除
    public function trueDel($id=0)
    {
        $object = ShopGoodsImage::destroy($id,TRUE);
        return $object;
    }
}