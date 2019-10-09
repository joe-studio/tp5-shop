<?php
namespace joeStudio\shop\api\miniapp;

use filter\Output;
use JiaweiXS\WeApp\WeApp;

use joeStudio\shop\model\ShopUserUser;
use think\Session;

class MiniApp extends Output
{
    public function __construct()
    {
        parent::__construct();
        $this->input = input('post.');

        $this->weApp = new WeApp('wx1e01ca22784089b0','96494086ae86d04e3c8cc6c4698ab3ca',RUNTIME_PATH  . 'miniApp');
    }

    public function login(){

        if(isset($this->input['code'])){

            $res = $this->weApp->getSessionKey($this->input['code']);

            $res = json_decode($res,true);

            $openid = $res['openid'];

            $session3rd  = null;
            $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
            $max = strlen($strPol)-1;
            for($i=0;$i<16;$i++){
                $session3rd .=$strPol[rand(0,$max)];
            }

            $userModel = new ShopUserUser();

            $user = $userModel->where([
                'openid'    =>  $openid
            ])->find();

            if($user){

                Session::init([
                    'prefix'         => 'miniApp',
                    'type'           => '',
                    'auto_start'     => true,
                    'id'            =>  $session3rd,
                ]);

                Session::set('user_id',$user['user_id']);

                $this->scene('miniApp')->setStatus(true)->setMsg('登录成功（已经注册了）')->setData([
                    'session3rd'    =>  $session3rd
                ])->output();

            }else{//第一次登录

                $res = $userModel->save([
                    'openid'    =>  $openid
                ]);

                if($res){
                    $user_id = $userModel->getLastInsID();

                    Session::init([
                        'prefix'         => 'miniApp',
                        'type'           => '',
                        'auto_start'     => true,
                        'id'            =>  $session3rd,
                    ]);

                    Session::set('user_id',$user_id);

                    $this->scene('miniApp')->setStatus(true)->setMsg('第一次登录成功（注册成功）')->setData([
                        'session3rd'    =>  $session3rd
                    ])->output();
                }
            }


        }else{
            $this->scene('miniApp')->setStatus(false)->setMsg('无参数提交')->output();
        }

    }
}