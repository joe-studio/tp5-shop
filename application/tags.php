<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用行为扩展定义文件
return [
    // 应用初始化
    'app_init'     => [],
    // 应用开始
    'app_begin'    => [],
    // 模块初始化
    'module_init'  => [],
    // 操作开始执行
    'action_begin' => [],
    // 视图内容过滤
    'view_filter'  => [],
    // 日志写入
    'log_write'    => [],
    // 应用结束
    'app_end'      => [],
    //登录态
    'check_login'   =>  [
        'joeStudio\\admin\\behavior\\CheckLogin',
    ],
    //初始化view
    'init_view'     =>  [
        'joeStudio\\admin\\behavior\\View',
    ],
    //初始化输入参数
    'init_input'    =>  [
        'joeStudio\\admin\\behavior\\Input',
    ],
    //初始化输出内容
    'init_output'    =>  [
        'joeStudio\\admin\\behavior\\Output',
    ],
    //初始化逻辑层
    'init_logic'    =>  [
        'joeStudio\\admin\\behavior\\Logic',
    ],
    //初始化模型层
    'init_model'    =>  [
        'joeStudio\\admin\\behavior\\Model',
    ],
    //初始化验证器
    'init_validate'    =>  [
        'joeStudio\\admin\\behavior\\Validate',
    ],
    //权限验证
    'check_permission'  =>  [
        'joeStudio\\admin\\behavior\\CheckPermission',
    ],
    //初始化view
    'init_shop_view'     =>  [
        'joeStudio\\shop\\behavior\\View',
    ],
    //初始化逻辑层
    'init_shop_logic'    =>  [
        'joeStudio\\shop\\behavior\\Logic',
    ],
    //初始化输入参数
    'init_shop_input'    =>  [
        'joeStudio\\shop\\behavior\\Input',
    ],
];
