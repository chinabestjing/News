<?php
/**
 * [首页控制器]
 * @Author: Careless
 * @Date:   2015-12-01 15:02:50
 * @Email:  965994533@qq.com
 * @Copyright:
 */
namespace Adminshunp\Controller;

class IndexController extends CommonController {
	/**
	 * [index 后台首页]
	 * @Author          彭彪
	 * @DateTime        2015-12-01T15:04:47+0800
	 */
	public function index(){
		$admin_info=session('adminUser');
		$admin_power_id=intval($admin_info['rid']);
		$managetable=M('json_admin_middle_role');
        $rolemanage=$managetable->where('sp_json_admin_middle_role_id='.$admin_power_id.'')->find();
        //返回管理权限的信息
        $$contentArr=array(); //声明一个存入权限菜单的数组作为返回值
        if(!empty($rolemanage['sp_json_admin_middle_role_content_id'])){  //假设有权限
        	$adminPowerIdStr=$rolemanage['sp_json_admin_middle_role_content_id'];
        	$menu=M('json_admin_content');
        	$selectId['sp_json_admin_content_id']=array('IN',$adminPowerIdStr);
        	$rolemanage=$menu->where($selectId)->select();
        	for($i=0;$i<count($rolemanage);$i++){
        				$contentArr[$i]['content']=$rolemanage[$i]['sp_json_admin_content_name'];
        				$contentArr[$i]['url']=$rolemanage[$i]['sp_json_admin_content_url'];
        	}
        }else{  //如果是有该管理员的登录信息 但是他的rid没有或者是rid的权限并没有出现在middlerole表中
        	$contentArr[0]['content']="亲,请使用管理员账号";
        	$contentArr[0]['url']="Login/index";
        }
        	$this->assign('contentArr',$contentArr);
		$this -> display();
	}

	/**
	 * [welcome 欢迎界面]
	 * @Author          彭彪
	 * @DateTime        2015-12-25T14:32:25+0800
	 */
	public function welcome(){
		$this -> display();
	}

	/**
	 * [update_cache 更新全站缓存]
	 * @Author          彭彪
	 * @DateTime        2016-01-08T16:51:46+0800
	 */
	public function update_cache(){
		dirDelete(APP_PATH . 'Runtime/Data');
		message('更新成功', U('welcome'));
	}

    public function update_cache_kinds(){
        $id = I('get.id');
        if(!empty($id)){
            $rt = deldDir('Application/Runtime/Data/'.$id);
            if($rt){
                message('更新成功', U('welcome'));
            }else{
                message('没有任何缓存', -1,0);
            }
        }
    }


    /*静态缓存区*/

    public function html(){
            $id = I('get.id');
        if(!empty($id)){
            $rt = deldDir('Application/'.$id);
            if($rt){
                message('更新成功', U('welcome'));
            }else{
                message('没有任何缓存', -1,0);
            }
        }
    }
    public function model(){
        $id = I('get.id');
        if(!empty($id)){
            $rt = deldDir('Application/Html/'.$id);
            if($rt){
                message('更新成功', U('welcome'));
            }else{
                message('没有任何缓存', -1,0);
            }
        }
    }

    /*public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728000 ;// 设置附件上传大小
        $upload->exts      =     array('jpg','jpeg','png','pdf','mp4');// 设置附件上传类型
        $upload->rootPath  =      './Public/file/'; // 设置附件上传根目录
        // 上传单个文件
        $info = $upload->uploadOne($_FILES["file"]);
        if(!$info) {// 上传错误提示错误信息
            //$err = $this->error($upload->getError());
            die($upload->getError());
        }else{// 上传成功 获取上传文件信息
            // 保存表单数据 包括附件数据
           die('上传成功');
        }
    }*/
}

