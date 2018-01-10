<?php
/**
 * [管理员模型]
 * @Author: Careless
 * @Date:   2015-12-01 16:35:53
 * @Email:  965994533@qq.com
 * @Copyright:
 */
namespace Common\Model;
use Think\Model;

class AdminUserModel extends Model{
	// 保存错误信息
	public $errMsg;
    // ----------------自动验证规则-------------------
    protected $_validate = array(
        // 验证用户名
        array('username', 'require', '请输入管理员名称', 1, '', 3),
      //  array('username', '/^[a-zA-z][a-zA-Z0-9_]{4,12}$/', '管理员名称由5-12位字母、数字、下划线组成，必须以字母开头', 1, 'regex', 3),
        array('username', '', '该管理员名已经存在', 1, 'unique', 1),
        //验证密码
        array('password', 'require', '请输入密码', 1, '', 1),
        array('password', '/^[0-9_a-zA-Z]{6,16}$/', '密码长度应为(6~16位),由字母数字下划线组成', 1, 'regex', 1),
        array('repassword', 'password', '两次输入密码不一致',1, 'confirm', 1),
        array('repassword', 'require', '请输入确认密码', 2, '', 2),

        array('password', 'require', '请输入密码', 2, '', 2),
        array('password', '/^[0-9_a-zA-Z]{6,16}$/', '密码长度应为(6~16位),由字母数字下划线组成', 2, 'regex', 2),
        array('repassword', 'password', '两次输入密码不一致',2, 'confirm', 2),
    );
	/**
	 * [varify_login 登录验证]
	 * @Author          彭彪
	 * @DateTime        2015-12-01T16:37:03+0800
	 */
	public function varify_login(){
		// 获取用户登录信息
		$username = I('post.username');
		$password = createpwd(I('post.password'));
		$code     = I('post.code');
		// 检测用户名和密码是否为空
		if ($username == '' || $password == '') {
			$this -> errMsg = '请输入用户名和密码';
			return false;
		}

		// 判断验证码是否正确
		if (strtoupper($code) != strtoupper(session('code'))) {
			$this -> errMsg = '验证码错误';
			return false;
		}

		// 获取数据库用户信息
		$dbUser = $this -> get_one(array('username'=>$username));
		// 判断用户是否存在
		if (!$dbUser) {
			$this -> errMsg = '用户不存在';
			return false;
		}
		// 判断密码是否正确
		if ($dbUser['password'] != $password) {
			$this -> errMsg = '密码错误';
			return false;
		}
        //判断用户账号是否被禁用
        if($dbUser['status'] != 1){
            $this -> errMsg = '该账号还未启用，暂时不能登录';
            return false;
        }
        if($dbUser['gid']==2){
           $school =  M('school')->where(array('id'=>$dbUser['school_id']))->find();
            // 保存登录状态
            $user = array(
                'school_id' =>$school['id'],
                'school_name'=>$school['name'],
                'gid'       => $dbUser['gid'],
                'id'		=> $dbUser['id'],
                'username'	=> $dbUser['username'],
            );
        }else{
            // 保存登录状态
            $user = array(
                'gid'       => $dbUser['gid'],
                'id'		=> $dbUser['id'],
                'username'	=> $dbUser['username'],
                'rid'       =>$dbUser['rid']
            );
        }

		session('adminUser', $user);
		return true;
	}

	/**
	 * [get_one 获取一条数据]
	 * @Author          彭彪
	 * @DateTime        2015-12-01T16:40:36+0800
	 * @param    [type] $where                   [where条件]
	 */
	public function get_one($where){
		return $this -> where($where) -> find();
	}

    /**
     * [get_data 获取数据]
     * @Author          周磊
     * @DateTime        2015-12-08 15:14
     *
     */
    public function get_data($where=array()){
        // 获取总数
        $count = $this -> count();
        // 实例化分页
        $page = new \Think\Page($count,10);
        // 获取数据
        $data = $this ->where($where)-> limit($page -> firstRow . ',' . $page -> listRows) -> select();
        // 分页显示
        $pageShow = $page -> show();
        $data['page'] = $pageShow;
        return $data;
    }

    /**
     * [add_data 添加管理员]
     * @Author          周磊
     * @DateTime        2015-12-08 15:18
     */
    public function add_data(){
        $this -> data['password'] = createpwd($this -> data['password']);

        return $this -> add();
    }

    /**
     * [edit_data 修改管理员]
     * @Author          周磊
     * @DateTime        2015-12-08  15:23
     */
    public function edit_data(){
        if ($this -> data['password'] == '') {
            unset($this -> data['password']);
        } else {

            $this -> data['password'] = createpwd($this -> data['password']);
        }
        return $this -> save();
    }
}
