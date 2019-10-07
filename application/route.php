<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------

use joeStudio\admin\config\Route as adminRoute;
use joeStudio\shop\config\Route as shopRoute;

$admin_route = adminRoute::$route;
$shop_route = shopRoute::$route;

$route = [];

return array_merge($route,$admin_route,$shop_route);
