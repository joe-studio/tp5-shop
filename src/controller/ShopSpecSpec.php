<?php
namespace joeStudio\shop\controller;

class ShopSpecSpec extends Shop
{

    public function __construct()
    {
        parent::__construct();

    }

    public function specAdd()
    {
        $params = $this->logic->getTemplateParamsAdd();

        return $this->view->fetch('shop_spec_spec/spec_add',$params);
    }

    public function specInsert(){
        $this->logic->insert($this->input);
    }

    public function specShow(){

        $output = $this->logic->search($this->input);

        return $this->view->fetch('shop_spec_spec/spec_show',$output);
    }

    public function specEdit()
    {

        $output = $this->logic->getTemplateParamsEdit($this->input);

        return $this->view->fetch('shop_spec_spec/spec_edit',$output);
    }

    public function specUpdate(){
        $this->logic->update($this->input);
    }

    public function specTrueDel(){
        $this->logic->trueDel($this->input);
    }
}
