<?php
namespace Adminshunp\Controller;
use Think\Controller;
class CultureController extends CommonController {
/*
 * 文化活动
 *      首页
 *      info id = 7
 *
 * */
    public function index(){

    $this->display();
    }

    /*
 * 文化活动
 *      巴蜀国际艺博会
 *      info id = 8
 *
 * */
    public function art(){
        $info = M('info');
        $where['i_id'] = 8;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功', U('art'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }


    /*
 * 文化活动
 *      巴蜀青少年艺博会
 *      info id = 9
 *
 * */
    public function young(){
        $info = M('info');
        $where['i_id'] = 9;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }

        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功', U('young'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }



    /*
 * 文化活动
 *      宝墩国际创博会
 *      info id = 10
 *
 * */
    public function create(){
        $info = M('info');
        $where['i_id'] = 10;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功', U('create'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }


    /*
 * 文化活动
 *      巴蜀画派名家进校园
 *      info id = 11
 *
 * */
    public function famous(){
        $info = M('info');
        $where['i_id'] = 11;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功', U('famous'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }


    /*
 * 文化活动
 *      艺奥国际青少年书画大赛
 *      info id = 12
 *
 * */
    public function match(){
        $info = M('info');
        $where['i_id'] = 12;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功', U('match'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }

    /*
 * 文化活动
 *      童星耀巴蜀才艺年会
 *      info id = 13
 *
 * */
    public function tongxingyao(){
        $info = M('info');
        $where['i_id'] = 13;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }

        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功', U('tongxingyao'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }







}