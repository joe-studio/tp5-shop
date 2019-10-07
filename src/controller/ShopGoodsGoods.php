<?php
namespace joeStudio\shop\controller;

class ShopGoodsGoods extends Shop
{

    public function __construct()
    {
        parent::__construct();

    }

    public function goodsAdd()
    {
        $params = $this->logic->getTemplateParamsAdd();

        return $this->view->fetch('shop_goods_goods/goods_add',$params);
    }

    public function goodsInsert(){
        $this->logic->insert($this->input);
    }

    public function goodsShow(){

        $output = $this->logic->search($this->input);

        return $this->view->fetch('shop_goods_goods/goods_show',$output);
    }

    public function goodsEdit()
    {

        $output = $this->logic->getTemplateParamsEdit($this->input);

        return $this->view->fetch('shop_goods_goods/goods_edit',$output);
    }

    public function goodsUpdate(){
        $this->logic->update($this->input);
    }

    public function goodsTrueDel(){
        $this->logic->trueDel($this->input);
    }

    public function imageList()
    {

        $output = $this->logic->getTemplateParamsImageList($this->input);

        return $this->view->fetch('shop_goods_goods/image_list',$output);
    }
    
}
