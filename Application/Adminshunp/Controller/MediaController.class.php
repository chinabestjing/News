<?php
namespace Adminshunp\Controller;
use Think\Controller;
class MediaController extends CommonController {
    /*
     *艺术传媒
     *      首页
     *      info id =
     * */
    public function index(){

        $this->display();
    }
    /*
     *艺术传媒
     *      中华美网
     *      info id =51
     * */
    public function beauty(){
        $info = M('info');
        $where['i_id'] = 51;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $data1['i_text1'] = $_POST['i_text1'];
            $data1['i_title1'] = I('post.i_title1');
            if($info->where($where)->save($data1)){
                message('修改成功', U('beauty'));
            }else{
                message('修改失败', -1, 0);
            }
        }
        $this->display();
    }
    /*
     *艺术传媒
     *      中华美术杂志
     *      info id = 52
     * */
    public function paint(){
        $info = M('info');
        $where['i_id'] = 52;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $data1['i_text1'] = $_POST['i_text1'];
            $data1['i_title1'] = I('post.i_title1');
            if($info->where($where)->save($data1)){
                message('修改成功', U('paint'));
            }else{
                message('修改失败', -1, 0);
            }
        }
        $this->display();

    }
    /*
     *艺术传媒
     *      巴蜀画派杂志
     *      info id = 53
     * */
    public function magazine(){
        $info = M('info');
        $where['i_id'] = 53;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $data1['i_text1'] = $_POST['i_text1'];
            if($info->where($where)->save($data1)){
                message('修改成功', U('magazine'));
            }else{
                message('修改失败', -1, 0);
            }
        }
        $this->display();

    }
    /*
     * 杂志列表
     *  work
     * */
    public function work(){
        $product = M('product');

        vendor('Page','','.class.php');//引入分页类
        $_GET['p'] = !empty($_GET['p'])?$_GET['p']:1;
        $count = $product->count();
        $Page = new \Page($count,10);
        $show       = $Page->show();// 分页显示输出

        $rt = $product->page($_GET['p'].',10')->order('p_time desc')->select();
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('data',$rt);
        $this->display();
    }
    /*
     * 删除杂志
     * del
     * */
    public function del(){
        $where['p_id'] = I('get.p_id');
        if(!empty($where['p_id'])){
        /*        $unlink = M('product')->where($where)->find();
            $hhe = substr($unlink['p_url'],19);
            unlink($hhe);*/
          $rt = M('product')->where($where)->delete();
            if($rt){
                message('删除成功', U('work'));
            }else{
                message('删除失败', -1, 0);
            }
        }

    }
    /*
     * 添加杂志
     * add
     * */
    public function add(){
        if(IS_POST){
            $data = I('post.');
            if(empty($data['p_title'])){
                message('文件说明为空', -1, 0);
            }
            if(empty($data['p_url'])){
                message('文件访问域名设置', -1, 0);
            }
            if(empty($data['p_pics'])){
                message('封面图片上传', -1, 0);
            }
            if(empty($data['url'])){
                message('文件未上传或未上传成功', -1, 0);
            }
            $data['p_time'] = time();
            $data['p_url'] = $data['p_url'].$data['url'];
            unset($data['url']);
            if( M('product')->add($data)){
                message('添加成功', U('work'));
            }else{
                message('添加失败', -1, 0);
            }
        }
        $this->display();

    }
    public function magazine1(){
        $info = M('info');
        $where['i_id'] = 53;//集团简介条件
        $where['i_state'] = 1;
        $data['i_text1'] = $info->where($where)->getField('i_text1');

        $where1['p_state'] = 1;
        $product = M('product');
        vendor('Page','','.class.php');//引入分页类
        $_GET['p'] = !empty($_GET['p'])?$_GET['p']:1;
        $count = $product->where($where1)->count();

        $Page = new \Page($count,6);
        $show       = $Page->show();// 分页显示输出

        $data['list'] = $product->where($where1)->page($_GET['p'].',6')->order('p_time desc')->select();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('data', $data);
        }
        $this->display();

    }
    /*
     *艺术传媒
     *      巴蜀画派微信微博
     *      info id = 54
     * */
    public function tencent(){
        $info = M('info');
        $where['i_id'] = 54;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $data1['i_text1'] = $_POST['i_text1'];
            $data1['i_title1'] = I('post.i_title1');
            $data1['i_text2'] = $_POST['i_text2'];
            $data1['i_title2'] = I('post.i_title2');
            if($info->where($where)->save($data1)){
                message('修改成功', U('tencent'));
            }else{
                message('修改失败', -1, 0);
            }
        }
        $this->display();

    }
    /*
     *艺术传媒
     *      巴蜀画派传媒公司
     *      info id = 55
     * */
    public function media(){
        $info = M('info');
        $where['i_id'] = 55;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $data1['i_text1'] = $_POST['i_text1'];
            $data1['i_title1'] = I('post.i_title1');
            if($info->where($where)->save($data1)){
                message('修改成功', U('media'));
            }else{
                message('修改失败', -1, 0);
            }
        }
        $this->display();

    }



}