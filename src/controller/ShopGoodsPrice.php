<?php
namespace joeStudio\shop\controller;

class ShopGoodsPrice extends Shop
{

    public function __construct()
    {
        parent::__construct();

    }

    public function show(){

        $output = $this->logic->search($this->input);

        return $this->view->fetch('shop_goods_price/price_show',$output);
    }

    public function getSpecAttributeList(){

        $output = $this->logic->getSpecAttributeList($this->input['specCategoryId']);

        echo $this->view->fetch('shop_goods_price/spec_attribute_list',$output);exit;
    }

    public function update(){

        $this->logic->update($this->input);
    }

    public function getAttributeGroupList(){

        $output = $this->logic->getAttributeGroupList($this->input);

        echo '<pre>';print_r($output);exit;
    }

    public function getPriceList(){

        $output = $this->logic->getPriceList($this->input);

        echo $this->view->fetch('shop_goods_price/price_list',$output);exit;
    }

}
