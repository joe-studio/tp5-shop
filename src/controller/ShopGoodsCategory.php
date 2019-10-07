<?php
namespace joeStudio\shop\controller;

class ShopGoodsCategory extends Shop
{

    public function __construct()
    {
        parent::__construct();

    }

    public function categoryAdd()
    {
        $params = $this->logic->getTemplateParamsAdd();

        return $this->view->fetch('shop_goods_category/category_add',$params);
    }

    public function categoryInsert(){
        $this->logic->insert($this->input);
    }

    public function categoryShow(){

        $output = $this->logic->search($this->input);

        return $this->view->fetch('shop_goods_category/category_show',$output);
    }

    public function categoryEdit()
    {

        $output = $this->logic->getTemplateParamsEdit($this->input);

        return $this->view->fetch('shop_goods_category/category_edit',$output);
    }

    public function categoryUpdate(){
        $this->logic->update($this->input);
    }

    public function categoryTrueDel(){
        $this->logic->trueDel($this->input);
    }
}
