<?php
namespace Adminshunp\Controller;
use Think\Controller;
class ResourceController extends CommonController {
    /*人力资源
     *  人才理念
     *info表里面的id 5
     *
     * */
    public function method(){
        $info = M('info');
        $where1['i_id'] = 5;
        $where1['i_state'] = 1;
        $data = $info->where($where1)->find();
        if(!empty($data['i_text1'])){
            $this->assign('data',$data);
        }else{
            $this->assign('data','');
        }

        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where1)->save($_POST);
            if($rt){
                message('修改成功', U('method'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }
    /*人力资源
         *  社会招聘
         *      world
         * */
    public function world(){
        $wanted = M('wanted');
       /* $where['w_state'] = 1;*/
        vendor('Page','','.class.php');//引入分页类
        $_GET['p'] = !empty($_GET['p'])?$_GET['p']:1;
        $count = $wanted->count();
        $Page = new \Page($count,10);
        $show       = $Page->show();// 分页显示输出

        $data = $wanted->/*where($where)->*/order('w_time desc')->page($_GET['p'].',10')->select();
       if(!empty($data[0])){
           $this->assign('data',$data);
           $this->assign('page',$show);// 赋值分页输出
       }else{
           $this->assign('data','');
       }
        $this->display();
    }
    /*
     * check
     *招聘状态切换
     * */
    public function change(){
        if(IS_GET &&!empty($_GET['id'])){
            $where['w_id'] = I('get.id');
            $data['w_state'] = I('get.key') == 1?0:1;
            $rt = M('wanted')->where($where)->save($data);
            if($rt){
                message('切换成功',U('world'));
            }else{
                message('更新失败', -1, 0);
            }
        }else{
            message('非法操作', -1, 0);
        }
    }
    /*
 * 删除 队友
 * teamDel
 * */
    public function del(){
        if(!empty($_GET['id'])){
            $where['w_id'] = I('get.id');
            $rt = M('wanted')->where($where)->delete();
            if($rt){
                message('删除成功！',U('world'));
            }else{
                message('删除失败', -1, 0);
            }
        }else{
            message('非法操作', -1, 0);
        }
    }


    /*人力资源
         *  校园招聘
         *      school
         * info   id = 6
           * */
    public function school(){
        $info = M('info');
        $where['i_id'] = 6;
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        $data['i_pic'] = explode(',',$data['i_pics']);

        //yi
        for($i = 0;$i<count($data['i_pic']);$i++){
            $data['i_pic'][$i] = explode('com',$data['i_pic'][$i]);
            $data['i_pic'][$i][0] = $data['i_pic'][$i][0].'com';
        }
        if(!empty($data)){
            $this->assign('data',$data);
        }else{
            $this->assign('data','');
        }

        if(IS_POST){
            $data1['i_title1'] = I('post.i_title1');
            $data1['i_pics'] = I('post.i_url').I('post.url1');
            $data1['i_text1'] = $_POST['i_text1'];
            if($info->where($where)->save($data1)){
                message('修改成功！',U('school'));
            }else{
                message('修改失败', -1, 0);
            }
        }

        $this->display();
    }

    /*
     * 添加招聘信息
     * */

    public function teamAdd(){
        if(IS_POST){
            $data = I('post.');
            $data['w_text'] = $_POST['w_text'];
            $data['w_time'] = time();
            if(M('wanted')->add($data)){
                message('添加成功！',U('world'));
            }else{
                message('添加失败', -1, 0);
            }
        }
        $this->display();
    }









}