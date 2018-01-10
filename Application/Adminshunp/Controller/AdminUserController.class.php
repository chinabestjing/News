<?php
/**
 * author      : zhoulei
 * createTime  : 2015/12/8 13:35
 * description : 后台管理员控制器
 */

namespace Adminshunp\Controller;
class AdminUserController extends CommonController{

    /**
     * [index 后台管理员]
     * @Author          彭彪
     * @DateTime        2015-12-08 13:42
     */
    public function index(){
        $model = D('Common/AdminUser');
        $data = $model -> get_data();
        // 分配变量
        $this -> assign('page', $data['page']);
        unset($data['page']);
        $this -> assign('_list', $data);
        $this -> display();
    }

    /**
     * [add_adminuser 添加后台管理员]
     * @Author          彭彪
     * @DateTime        2015-12-08 13:52
     */
    public function add_adminuser(){
        $model = D('Common/AdminUser');
        if(IS_POST){
            $list= $model -> create();
            if(!$list){
                message($model -> getError(),-1,0);
            }
            if($model -> add_data() > 0){
                message('添加成功',U('index'));
            }
        }
    }

    /**
     * [edit 修改后台管理员]
     * @Author          彭彪
     * @DateTime        2015-12-08 16:22
     */
    public function edit(){
        $model = D('Common/AdminUser');
        if(IS_POST){

            if(!$model -> create()){
                message($model -> getError(),-1,0);
            }

            if($model -> edit_data() > 0){
                message('修改成功',U('index'));
            }else{
                message('修改失败',0,-1);
            }

        }else{
            $uid = I('get.id',0,'int');
            $row = $model -> get_one(array('id'=>$uid));
            $this -> assign('row',$row);
            $this -> display();
        }
    }

    /**
     * [del 删除后台管理员]
     * @Author          彭彪
     * @DateTime        2015-12-08 16:52
     */
    public function del(){
        $uid = I('get.id',0,'int');
        $res = M('admin_user') -> where(array('id'=>$uid)) -> delete();
        if(false !== $res || $res > 0){
            message('删除成功',U('index'));
        }
    }


    /****************************预约看样记录*/
    public function yuyue(){
        $yuyue = M('member');
        $data = $yuyue->data('m_id,m_time,m_name,m_phone,m_state')->order('m_state,m_time')->select();
        $this->assign('data',$data);
        $this->display();
    }

    public function yuyueEdit(){
        $member = M('member');
        $id = I('get.m_id');
        if(!empty($id) && IS_GET){
            $data = $member->where('m_id = '.$id)->find();
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('data',$data);
        }

        if(IS_POST && $_POST['m_id']){
           $data=I('post.');
            $data['m_time'] = strtotime($data['m_time']);
            $rt = $member->data($data)->save();

            if($rt){
                message('修改成功', U('yuyue'));
            }else{
                message('修改失败', -1, 0);
            }
        }

        $this->display();
    }

    public function yuyueDel(){
        $member = M('member');
        $id = I('get.m_id');
        if($id && IS_GET){
            $rt = $member->where('m_id = '.$id)->delete();
            if($rt){
                message('删除成功', U('yuyue'));
            }else{
                message('删除失败', -1, 0);
            }
        }else{
            message('系统错误', -1, 0);
        }
    }

    public function yuyueAdd(){
        $member = M('member');
        $data = I('post.');
        if(!empty($data['m_phone'])&&$data['m_name']){
            $data['m_time'] = strtotime($data['m_time']);
            $rt = $member->add($data);
            if($rt){
                message('添加成功', U('yuyue'));
            }else{
                message('添加失败', -1, 0);
            }
        }

        $this->display();
    }






}