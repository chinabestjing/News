<?php
namespace Adminshunp\Controller;
use Think\Controller;
class ContactController extends CommonController {
    /*
     * 联系我们
     *  联系方式
     * ·首页
     *  info id = 46
     *
     * */
    public function index(){
        $info = M('info');
        $where['i_id'] = 46;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->/*field('i_text1')*/where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功', U('index'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();


    }
    /*
     * 联系我们
     *  下属公司
     * info id 47
     *
     * */
    public function nextTel(){
        $info = M('info');
        $where['i_id'] = 47;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->/*field('i_text1')*/where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功', U('nextTel'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }
    /*
     * 联系我们
     *  销售网点
     * info id 48
     *
     * */
    public function saleNet(){
        $info = M('info');
        $where['i_id'] = 48;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->/*field('i_text1')*/where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功', U('saleNet'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }
    /*
     * 联系我们
     *  教学网点
     * info id 49
     *
     * */
    public function teachNet(){
        $info = M('info');
        $where['i_id'] = 49;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->/*field('i_text1')*/where($where)->find();
        if (empty($data['i_text1'])) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功', U('teachNet'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }


}