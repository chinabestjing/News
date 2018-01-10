<?php
namespace Adminshunp\Controller;
use Think\Controller;
class SchoolController extends CommonController {

/*
 * 艺术教育
 *      首页
 *      info id =17
 *
 * */
    public function index(){
        $info = M('info');
        $where['i_id'] = 17;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->field('i_text1')->where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(!empty($_POST['i_text1'])){
            $rt = $info->where('i_id = 17')->save(array('i_text1'=>$_POST['i_text1']));
            if($rt){
                message('修改成功', U('index'));
            }else{
                message('修改失败', -1, 0);
            }
        }

    $this->display();
    }
    /*
     * 艺术教育
     *  巴蜀画派艺术学校
     * info id 18
     * */
    public function art(){
        $info = M('info');
        $where['i_id'] = 18;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->/*field('i_text1')*/where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $data['i_title1'] = I('post.i_title1');
            $data['i_title2'] = I('post.i_title2');
            $data['i_title3'] = I('post.i_title3');
            $data['i_url'] = I('post.i_url');
            $data['i_text1'] = $_POST['i_text1'];
            $data['i_text2'] = $_POST['i_text2'];
            $data['i_text3'] = $_POST['i_text3'];
            if($info->where('i_id = 18')->save($data)){
                message('修改成功', U('art'));
            }else{
                message('修改失败', -1, 0);
            }
        }
        $this->display();
    }
    /*
     * 艺术教育
     *巴蜀画派专修学院
     * info id = 19
     * */
    public function profession(){
        $info = M('info');
        $where['i_id'] = 19;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->/*field('i_text1')*/where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $data['i_title1'] = I('post.i_title1');
            $data['i_title2'] = I('post.i_title2');

            $data['i_url'] = I('post.i_url');
            $data['i_text1'] = $_POST['i_text1'];
            $data['i_text2'] = $_POST['i_text2'];
            if($info->where('i_id = 19')->save($data)){
                message('修改成功', U('profession'));
            }else{
                message('修改失败', -1, 0);
            }
        }
        $this->display();

    }









}