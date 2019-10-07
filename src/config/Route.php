<?php
namespace joeStudio\shop\config;

class Route
{
    public static $route = [

        '[shop]'   =>  [

            //店铺控制器路由
            'ShopStoreStore/add'       =>  ['\joeStudio\shop\controller\ShopStoreStore@storeAdd',['method'=>'get']],
            'ShopStoreStore/insert'    =>  ['\joeStudio\shop\controller\ShopStoreStore@storeInsert',['method'=>'post']],
            'ShopStoreStore/show'      =>  ['\joeStudio\shop\controller\ShopStoreStore@storeShow',['method'=>'get']],
            'ShopStoreStore/edit'      =>  ['\joeStudio\shop\controller\ShopStoreStore@storeEdit',['method'=>'get']],
            'ShopStoreStore/update'    =>  ['\joeStudio\shop\controller\ShopStoreStore@storeUpdate',['method'=>'post']],
            'ShopStoreStore/trueDel'   =>  ['\joeStudio\shop\controller\ShopStoreStore@storeTrueDel',['method'=>'post']],

            //商品分类控制器路由
            'ShopGoodsCategory/add'                     =>  ['\joeStudio\shop\controller\ShopGoodsCategory@categoryAdd',['method'=>'get']],
            'ShopGoodsCategory/insert'                  =>  ['\joeStudio\shop\controller\ShopGoodsCategory@categoryInsert',['method'=>'post']],
            'ShopGoodsCategory/show'                    =>  ['\joeStudio\shop\controller\ShopGoodsCategory@categoryShow',['method'=>'get']],
            'ShopGoodsCategory/edit'                    =>  ['\joeStudio\shop\controller\ShopGoodsCategory@categoryEdit',['method'=>'get']],
            'ShopGoodsCategory/update'                  =>  ['\joeStudio\shop\controller\ShopGoodsCategory@categoryUpdate',['method'=>'post']],
            'ShopGoodsCategory/trueDel'                 =>  ['\joeStudio\shop\controller\ShopGoodsCategory@categoryTrueDel',['method'=>'post']],

            //属性控制器路由
            'shopGoodsGoods/add'               =>  ['\joeStudio\shop\controller\shopGoodsGoods@goodsAdd',['method'=>'get']],
            'shopGoodsGoods/insert'            =>  ['\joeStudio\shop\controller\shopGoodsGoods@goodsInsert',['method'=>'post']],
            'shopGoodsGoods/show'              =>  ['\joeStudio\shop\controller\shopGoodsGoods@goodsShow',['method'=>'get']],
            'shopGoodsGoods/edit'              =>  ['\joeStudio\shop\controller\shopGoodsGoods@goodsEdit',['method'=>'get']],
            'shopGoodsGoods/update'            =>  ['\joeStudio\shop\controller\shopGoodsGoods@goodsUpdate',['method'=>'post']],
            'shopGoodsGoods/trueDel'           =>  ['\joeStudio\shop\controller\shopGoodsGoods@goodsTrueDel',['method'=>'post']],

            //商城图片制器路由
            'shopGoodsImage/add'               =>  ['\joeStudio\shop\controller\shopGoodsImage@imageAdd',['method'=>'get']],
            'shopGoodsImage/insert'            =>  ['\joeStudio\shop\controller\shopGoodsImage@imageInsert',['method'=>'post']],
            'shopGoodsImage/show'              =>  ['\joeStudio\shop\controller\shopGoodsImage@imageShow',['method'=>'get']],
            'shopGoodsImage/edit'              =>  ['\joeStudio\shop\controller\shopGoodsImage@imageEdit',['method'=>'get']],
            'shopGoodsImage/update'            =>  ['\joeStudio\shop\controller\shopGoodsImage@imageUpdate',['method'=>'post']],
            'shopGoodsImage/trueDel'           =>  ['\joeStudio\shop\controller\shopGoodsImage@imageTrueDel',['method'=>'post']],
            'shopGoodsImage/imageUpload'           =>  ['\joeStudio\shop\controller\shopGoodsGoods@imageUpload',['method'=>'post']],

            //商品图片列表路由
            'shopGoodsGoods/imageList'           =>  ['\joeStudio\shop\controller\shopGoodsGoods@imageList',['method'=>'get']],
            'shopGoodsGoods/imageUpload'           =>  ['\joeStudio\shop\controller\shopGoodsGoods@imageUpload',['method'=>'post']],
            'shopGoodsGoods/imageAdd'           =>  ['\joeStudio\shop\controller\shopGoodsGoods@imageAdd',['method'=>'post']],

            //规格分类控制器路由
            'shopSpecCategory/add'       =>  ['\joeStudio\shop\controller\shopSpecCategory@categoryAdd',['method'=>'get']],
            'shopSpecCategory/insert'    =>  ['\joeStudio\shop\controller\shopSpecCategory@categoryInsert',['method'=>'post']],
            'shopSpecCategory/show'      =>  ['\joeStudio\shop\controller\shopSpecCategory@categoryShow',['method'=>'get']],
            'shopSpecCategory/edit'      =>  ['\joeStudio\shop\controller\shopSpecCategory@categoryEdit',['method'=>'get']],
            'shopSpecCategory/update'    =>  ['\joeStudio\shop\controller\shopSpecCategory@categoryUpdate',['method'=>'post']],
            'shopSpecCategory/trueDel'   =>  ['\joeStudio\shop\controller\shopSpecCategory@categoryTrueDel',['method'=>'post']],

            //规格控制器路由
            'shopSpecSpec/add'               =>  ['\joeStudio\shop\controller\shopSpecSpec@specAdd',['method'=>'get']],
            'shopSpecSpec/insert'            =>  ['\joeStudio\shop\controller\shopSpecSpec@specInsert',['method'=>'post']],
            'shopSpecSpec/show'              =>  ['\joeStudio\shop\controller\shopSpecSpec@specShow',['method'=>'get']],
            'shopSpecSpec/edit'              =>  ['\joeStudio\shop\controller\shopSpecSpec@specEdit',['method'=>'get']],
            'shopSpecSpec/update'            =>  ['\joeStudio\shop\controller\shopSpecSpec@specUpdate',['method'=>'post']],
            'shopSpecSpec/trueDel'           =>  ['\joeStudio\shop\controller\shopSpecSpec@specTrueDel',['method'=>'post']],

            //属性控制器路由
            'shopSpecAttribute/add'               =>  ['\joeStudio\shop\controller\shopSpecAttribute@attributeAdd',['method'=>'get']],
            'shopSpecAttribute/insert'            =>  ['\joeStudio\shop\controller\shopSpecAttribute@attributeInsert',['method'=>'post']],
            'shopSpecAttribute/show'              =>  ['\joeStudio\shop\controller\shopSpecAttribute@attributeShow',['method'=>'get']],
            'shopSpecAttribute/edit'              =>  ['\joeStudio\shop\controller\shopSpecAttribute@attributeEdit',['method'=>'get']],
            'shopSpecAttribute/update'            =>  ['\joeStudio\shop\controller\shopSpecAttribute@attributeUpdate',['method'=>'post']],
            'shopSpecAttribute/trueDel'           =>  ['\joeStudio\shop\controller\shopSpecAttribute@attributeTrueDel',['method'=>'post']],

            //首页广告轮播图控制器路由
            'shopAdvertising/add'       =>  ['\joeStudio\shop\controller\shopAdvertising@advertisingAdd',['method'=>'get']],
            'shopAdvertising/insert'    =>  ['\joeStudio\shop\controller\shopAdvertising@advertisingInsert',['method'=>'post']],
            'shopAdvertising/show'      =>  ['\joeStudio\shop\controller\shopAdvertising@advertisingShow',['method'=>'get']],
            'shopAdvertising/edit'      =>  ['\joeStudio\shop\controller\shopAdvertising@advertisingEdit',['method'=>'get']],
            'shopAdvertising/update'    =>  ['\joeStudio\shop\controller\shopAdvertising@advertisingUpdate',['method'=>'post']],
            'shopAdvertising/trueDel'   =>  ['\joeStudio\shop\controller\shopAdvertising@advertisingTrueDel',['method'=>'post']],
        ]

    ];

}