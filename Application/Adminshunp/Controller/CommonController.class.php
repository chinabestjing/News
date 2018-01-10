<?php
/**
 * [后台公共控制器]
 * @Author: Careless
 * @Date:   2015-12-01 15:02:01
 * @Email:  965994533@qq.com
 * @Copyright:
 */
namespace Adminshunp\Controller;
use Think\Controller;

class CommonController extends Controller {
	/**
	 * [_initialize 自动运行方法]
	 * @Author          彭彪
	 * @DateTime        2015-12-01T16:45:18+0800
	 */
	public function _initialize(){
		// 检测是否登录
		if (!session('adminUser')) {
			// message('请先登录', U('Login/index'), 0);
			$gourl = U('Login/index');

			echo '<script type="text/javascript">top.location.href="' . $gourl . '";</script>';
			return;
		}
	}
}
