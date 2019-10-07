<?php
namespace joeStudio\shop\controller;

class ShopGoodsImage extends Shop
{

    public function __construct()
    {
        parent::__construct();

    }

    public function imageAdd()
    {
        $params = $this->logic->getTemplateParamsAdd();

        return $this->view->fetch('shop_goods_image/image_add',$params);
    }

    public function imageInsert(){
        $this->logic->insert($this->input);
    }

    public function imageShow(){

        $output = $this->logic->search($this->input);

        return $this->view->fetch('shop_goods_image/image_show',$output);
    }

    public function imageEdit()
    {

        $output = $this->logic->getTemplateParamsEdit($this->input);

        return $this->view->fetch('shop_goods_image/image_edit',$output);
    }

    public function imageUpdate(){
        $this->logic->update($this->input);
    }

    public function imageTrueDel(){
        $this->logic->trueDel($this->input);
    }

    public function imageUpload(){
        $this->logic->imageUpload($this->input);
    }
}
