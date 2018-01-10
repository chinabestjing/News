<?php
return array(
    //'配置项'               =>'配置值'
	
    'LOAD_EXT_CONFIG'        => 'dbconfig',                                  // 加载数据库配置项
    'SHOW_PAGE_TRACE'        => false, 			                             // 开启页面Trace
    'URL_MODEL'             =>  2,
    'URL_ROUTER_ON'         =>  true,//开启路由
    'URL_ROUTE_RULES'=>array(
        'First/one/1' =>'Index/index',
        'Second/one/2' =>'Group/index',
        'Third/one/3' =>'News/index',
        'Fourth/one/4' =>'School/index',
        'Fifth/one/5' =>'Trade/index',
        'Sixth/one/6' =>'Media/index',
        'Seventh/one/7' =>'Culture/index',
        'Eighth/one/8' =>'Contact/index',
        'Ninth/one/9' =>'Resource/index',
            ),
    //
    // 'TMPL_ACTION_SUCCESS' => 'Public/success',	                         // 默认成功跳转对应的模板文件
    // 'TMPL_ACTION_ERROR'   => 'Public/error',		                         // 默认错误跳转对应的模板文件
    'DEFAULT_FILTER'         => 'htmlspecialchars,addslashes',               // 默认数据过滤 (实体化标签,转译)
    'UP_KEY'                 => md5(sha1('shudaoupload') . 'mykey'),         // 上传token

    // 接口分类
    'PORT_CATEGORY'         => array(                                        
        '0'     => '',
        '1'     => '登录注册类',
        '2'     => '城市地址类',
        '3'     => '页面数据类',
        '4'     => '用户中心类',
        '5'     => '订单类',
    ),

    // 商品类型
    'GOODS_TYPE'    => array(
        '1'     => '普通商品',
        '2'     => '积分商城',
        '3'     => '预售',
        '4'     => '优惠活动',
    ),

    // 订单状态
    'ORDER_STATUS'  => array(
        '0'     => '待支付',
        '1'     => '待发货',
        '2'     => '待确认收货',
        '3'     => '待评价',
        '4'     => '已完成',
    ),
    
    //********************************表单令牌********************************
    'TOKEN_ON'               => false,                                        // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'             => '__hash__',                                  // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'             => 'md5',                                       // 令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'            => true,                                        // 令牌验证出错后是否重置令牌 默认为true

    //********************************验证码********************************
    "CODE_FONT"                     => APP_PATH . "Runtime/Font/font.ttf",             // 字体
    "CODE_STR"                      => "1234567890abcdefghijklmnopqrstuvwxyz",      // 验证码种子
    "CODE_WIDTH"                    => 130,                                          // 宽度
    "CODE_HEIGHT"                   => 33,                                          // 高度
    "CODE_LEN"                      => 4,                                           // 文字数量
    "CODE_FONT_SIZE"                => 20,                                          // 字体大小
    'CODE_BG_COLOR'                 => '#ffffff',                                   // 背景颜色
);