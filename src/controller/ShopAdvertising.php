<?php
namespace joeStudio\shop\controller;

class ShopAdvertising extends Shop
{

    public function __construct()
    {
        parent::__construct();

    }

    public function advertisingAdd()
    {
        return $this->view->fetch('shop_advertising/advertising_add');
    }

    public function advertisingInsert(){
        $this->logic->insert($this->input);
    }

    public function advertisingShow(){

        $output = $this->logic->search($this->input);

        return $this->view->fetch('shop_advertising/advertising_show',$output);
    }

    public function advertisingEdit()
    {

        $output = $this->logic->getRole($this->input);

        return $this->view->fetch('shop_advertising/advertising_edit',$output);
    }

    public function advertisingUpdate(){
        $this->logic->update($this->input);
    }

    public function advertisingTrueDel(){
        $this->logic->trueDel($this->input);
    }


}
