<?php
/**
 * 轮播图管理
 * Created by PhpStorm.
 * User: longHu
 * Date: 2016/4/5
 * Time: 17:53
 */

namespace Adminshunp\Controller;


class CarouselController extends CommonController {

    public function index(){
        // 实例化分页
        $count = M('banner')->count();
        // 获取数据
        $data = M('banner') ->order('b_time DESC') -> select();
        //var_dump($pageShow);exit;
        $this->assign('data',$data);
        $this->display();
    }

    /*
        * check
        *状态切换
        * */
    public function change(){
        if(IS_GET &&!empty($_GET['id'])){
            $where['b_id'] = I('get.id');
            $data['b_state'] = I('get.key') == 1?0:1;
            $rt = M('banner')->where($where)->save($data);
            if($rt){
                message('切换成功',U('index'));
            }else{
                message('更新失败', -1, 0);
            }
        }else{
            message('非法操作', -1, 0);
        }
    }
    /*
* 轮播图删除
* Del
* */
    public function del(){
        if(!empty($_GET['id'])){
            $where['b_id'] = I('get.id');
            $rt = M('banner')->where($where)->delete();
            if($rt){
                message('删除成功！',U('index'));
            }else{
                message('删除失败', -1, 0);
            }
        }else{
            message('非法操作', -1, 0);
        }
    }
    public function add(){
        if(IS_POST){
            $data = I('post.');
           /// dump($data);die;
            if(empty($data['b_url'])){
                message('轮播图链接未设置', -1, 0);
            }
            if(empty($data['b_pic_text'])){
                message('轮播图标题为空', -1, 0);
            }if(empty($data['b_pic'])){
                message('文件上传失败！', -1, 0);
            }
            $data['b_time'] = time();
            if( M('banner')-> add($data)){
                message('添加成功！', U('index'));
            }else{
                message('添加失败！', -1, 0);
            }
        }
        $this->display();
    }


}