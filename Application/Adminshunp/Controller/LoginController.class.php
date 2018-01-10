<?php
/**
 * [后台登录管理控制器]
 * @Author: Careless
 * @Date:   2015-12-01 16:02:12
 * @Email:  965994533@qq.com
 * @Copyright:
 */
namespace Adminshunp\Controller;
use Think\Controller;

class LoginController extends Controller{
	/**
	 * [index 登录方法]
	 * @Author          彭彪
	 * @DateTime        2015-12-01T16:02:49+0800
	 */
	public function index(){
		// 判断是否为POST提交
		if (IS_POST) {
			// 实例化管理员模型
			$model = D('Common/AdminUser');
			// 验证表单令牌
			if (!$model -> autoCheckToken(I('post.'))) {
				message('非法提交', -1, 0);
				return;
			}
			// 登录验证
			if (!$model -> varify_login()) {
				// 登录失败
				message($model -> errMsg, -1, 0);
				return;
			}
			//var_dump(session('adminUser'));die;
			// 登录成功
			//session('adminUser')=>array(4)(["gid"]=> NULL ["id"]=> string(1) "1" ["username"]=> string(8) "shunp123" ["rid"]=> string(1) "0");
			message('登录成功', U('Index/index'));
			return;
		}
		$this -> display();
	}

	/**
	 * [login_out 退出登录]
	 * @Author          彭彪
	 * @DateTime        2015-12-01T16:46:57+0800
	 */
	public function login_out(){
		session('adminUser', NULL);
		message('退出成功', U('Login/index'));
	}

	/**
	 * [code 验证码]
	 * @Author          彭彪
	 * @DateTime        2015-12-02T17:42:49+0800
	 */
	public function code(){
		// 引入验证码类
		import('Common.Class.Code');
		// 实例化类
		$code = new \Code();
		// 执行类中的显示方法
		$code -> show();
	}
}
