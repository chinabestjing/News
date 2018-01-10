<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Behavior;
// 创建Lite运行文件
// 可以替换框架入口文件运行
// 建议绑定位置app_init
class adBehavior {
    public function run($arg) {
      echo '你好，我的名字叫'.$arg['name'].'。我今年'.$arg['age'].'岁了。';
    }

}