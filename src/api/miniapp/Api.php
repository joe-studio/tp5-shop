<?php


namespace joeStudio\shop\api\miniapp;


use filter\Output;
use think\Session;

class Api extends Output
{
    public function __construct()
    {
        $this->input = input('post.');

        !input('post.session3rd') && $this->scene('miniApp')->setStatus(false)->setMsg('缺少session3rd')->output();

        $this->init_user(input('post.session3rd'));
    }

    public function init_user($session3rd){

        Session::init([
            'prefix'         => 'miniApp',
            'type'           => '',
            'auto_start'     => true,
            'id'            =>  $session3rd,
        ]);

        $this->user_id = Session::get('user_id');
    }
}