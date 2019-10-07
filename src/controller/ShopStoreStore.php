<?php
namespace joeStudio\shop\controller;

class ShopStoreStore extends Shop
{

    public function __construct()
    {
        parent::__construct();

    }

    public function storeAdd()
    {
        return $this->view->fetch('shop_store_store/store_add');
    }

    public function storeInsert(){
        $this->logic->insert($this->input);
    }

    public function storeShow(){

        $output = $this->logic->search($this->input);

        return $this->view->fetch('shop_store_store/store_show',$output);
    }

    public function storeEdit()
    {

        $output = $this->logic->getRole($this->input);

        return $this->view->fetch('shop_store_store/store_edit',$output);
    }

    public function storeUpdate(){
        $this->logic->update($this->input);
    }

    public function storeTrueDel(){
        $this->logic->trueDel($this->input);
    }

}
