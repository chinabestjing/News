<?php
namespace Adminshunp\Controller;
use Think\Controller;
class TradeController extends CommonController {
    /*艺术交易
     *  首页
     *
     * */
    public function index(){
        $this->display();
    }
    /*
     * 艺术交易
     *      宝墩拍卖
     *  info id 14
     *
     * */
    public function  auction(){
        $info = M('info');
        $where['i_id'] = 14;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->field('i_id,i_title1,i_text1,i_pics,i_url,i_time')->where($where)->find();
        /*   $data['i_pic'] = explode(',',$data['i_pics']);*/
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $data1['i_text1'] = $_POST['i_text1'];
            $data1['i_url'] = I('post.i_url');
            $data1['i_title1'] = I('post.i_title1');
            $data1['i_pics'] = I('post.i_pics');
            if($info->where($where)->save($data1)){
                message('修改成功', U('auction'));
            }else{
                message('修改失败', -1, 0);
            }
        }

        $this->display();
    }
    /*
         * 艺术交易
         *      宝墩艺术品
         *  info id 15
         *
         * */
    public function  artwork(){
        $info = M('info');
        $where['i_id'] = 15;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->field('i_id,i_title1,i_text1,i_pics,i_url,i_time')->where($where)->find();
        /*   $data['i_pic'] = explode(',',$data['i_pics']);*/
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $data1['i_text1'] = $_POST['i_text1'];
            $data1['i_url'] = I('post.i_url');
            $data1['i_title1'] = I('post.i_title1');
            $data1['i_pics'] = I('post.i_pics');
            if($info->where($where)->save($data1)){
                message('修改成功', U('artwork'));
            }else{
                message('修改失败', -1, 0);
            }
        }

        $this->display();
    }
    /*
     * 艺术交易
     *  艺链国际
     *  info id 16
     *
     * */
    public function  artlink(){
        $info = M('info');
        $where['i_id'] = 16;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->field('i_id,i_title1,i_text1,i_pics,i_url,i_time')->where($where)->find();
     /*   $data['i_pic'] = explode(',',$data['i_pics']);*/
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $data1['i_text1'] = $_POST['i_text1'];
            $data1['i_url'] = I('post.i_url');
            $data1['i_title1'] = I('post.i_title1');
            $data1['i_pics'] = I('post.i_pics');
            if($info->where($where)->save($data1)){
                message('修改成功', U('artlink'));
            }else{
                message('修改失败', -1, 0);
            }
        }
        $this->display();
    }









}