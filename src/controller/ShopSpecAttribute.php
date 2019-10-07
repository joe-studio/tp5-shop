<?php
namespace joeStudio\shop\controller;

class ShopSpecAttribute extends Shop
{

    public function __construct()
    {
        parent::__construct();

    }

    public function attributeAdd()
    {
        $params = $this->logic->getTemplateParamsAdd();

        return $this->view->fetch('shop_spec_attribute/attribute_add',$params);
    }

    public function attributeInsert(){
        $this->logic->insert($this->input);
    }

    public function attributeShow(){

        $output = $this->logic->search($this->input);

        return $this->view->fetch('shop_spec_attribute/attribute_show',$output);
    }

    public function attributeEdit()
    {

        $output = $this->logic->getTemplateParamsEdit($this->input);

        return $this->view->fetch('shop_spec_attribute/attribute_edit',$output);
    }

    public function attributeUpdate(){
        $this->logic->update($this->input);
    }

    public function attributeTrueDel(){
        $this->logic->trueDel($this->input);
    }
}
