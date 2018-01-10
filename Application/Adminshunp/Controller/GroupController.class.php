<?php
namespace Adminshunp\Controller;

class GroupController extends CommonController
{

    /*
     * 集团介绍
     *      集团简介
     *      info id = 1
     * */
    public function index()
    {
        $info = M('info');
        $where['i_id'] = 1;//集团简介条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data)) {
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
     * 集团介绍
     *    董事长致辞
     *  info   id 2
     * */
    public function talking()
    {
        $info = M('info');
        $where['i_id'] = 2;//懂事长致辞条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();
        if (empty($data)) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(!empty($_POST['i_title1'])&&!empty($_POST['i_text1'])){
            $rt = $info->where($where)->save($_POST);
            if($rt){
                message('修改成功',U('talking'));
            }else{
                message('更新失败', -1, 0);
            }
        }
        $this->display();
    }

    /*团队管理开始*/
    /*
     * 集团介绍
     *         管理团队
     *
     * */
    public function team()
    {
        $info = M('member');
        $data = $info ->select();
        $this->assign('data',$data);
        $this->display();
    }
    /*
     * teamCheck
     * 团队成员在职离职切换
     * */
    public function teamCheck(){
        if(IS_GET &&!empty($_GET['id'])){
            $where['m_id'] = I('get.id');
            $data['m_state'] = I('get.key') == 1?0:1;
            $rt = M('member')->where($where)->save($data);
            if($rt){
                message('切换成功',U('team'));
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
    public function teamDel(){
        if(!empty($_GET['id'])){
            $where['m_id'] = I('get.id');
            $rt = M('member')->where($where)->delete();
            if($rt){
                message('删除成功！',U('team'));
            }else{
                message('删除失败', -1, 0);
            }
        }else{
            message('非法操作', -1, 0);
        }
    }
    /*
     * 修改 队友
     * teamUpdate
     * */
    public function teamUpdate(){
        if(!empty($_GET['id'])){
            $where['m_id'] = I('get.id');
            $rt = M('member')->where($where)->find();
            if($rt){
                $this->assign('data',$rt);
                $this->display();
            }else{
                message('查询失败！', -1, 0);
            }
        }elseif(IS_POST){
            $data = I('post.');
            unset($data['file_upload']);
            if(M('member')->save($data)){
                message('修改成功！',U('team'));
            }else{
                message('更新失败！', -1, 0);
            }
        }else{
            message('非法操作', -1, 0);
        }
    }
    /*
     * 添加 同事
     *  teamAdd
     *
     * */
    public function teamAdd(){
        if(IS_POST){
            $data['m_name'] = I('m_name');
            if(!$data['m_name']){
                message('用户名为空！', -1, 0);
            }
            $data['m_position'] = I('m_position');
            if(!$data['m_position']){
                message('职位为空！', -1, 0);
            }
            $data['m_study'] = I('m_study');
            if(!$data['m_study']){
                message('学历为空！', -1, 0);
            }
            $data['m_pic'] = I('m_pic');
            if(!$data['m_pic']){
                message('照片不能为空！', -1, 0);
            }
            $data['m_state'] = 1;
            $data['m_intro'] = I('m_intro');
            $data['m_order'] = I('m_order');
            $data['m_sex'] = I('m_sex');
            $data['m_time'] = time();
            if(M('member')->add($data)){
                message('添加成功！',U('team'));
            }else{
                message('添加失败！', -1, 0);
            }


        }
        $this->display();
    }
    /* 团队管理结束*/


    /*
     * 集团介绍
     *      集团品牌
     * info if 3
     * */
    public function brand()
    {
        $info = M('info');
        $where['i_id'] = 3;//集团品牌条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();

        $texts = explode(',', $data['i_pics_text']);
        unset($data['i_pics_text']);

        $photos = explode(',', $data['i_pics']);
        unset($data['i_pics']);
        foreach ($photos as $k => $v) {
            $data['i_pics'][$k]['pic'] = $v;
            $data['i_pics'][$k]['text'] = $texts[$k];
        }
        if (empty($data)) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            $config = array(
                'maxSize' => 3145728,
                'rootPath' => './Uploads/',
                'savePath' => '',
                'saveName' => array('uniqid',''),
                'exts' => array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub' => true,
                'subName' => array('date','Ymd')
            );

            $upload = new \Think\Upload($config);
            $info1 = $upload->upload();
            for($i = 0;$i<count($info1);$i++){
                $photoAdd[$i+1000] = '/Uploads/'.$info1[$i]['savepath'].$info1[$i]['savename'];
            }
           /* if(!$info) {// 上传错误提示错误信息
                message($upload->getError(), -1, 0);
            }else{// 上传成功 获取上传文件信息

                for($i = 0;$i<count($info);$i++){
                    $photoAdd[$i] = 'Uploads/'.$info[$i]['savepath'].$info[$i]['savename'];
                }
            }*/


            //删除图片文字
            $delText = I('post.textdel');
            $delPic = I('post.textdel');
            if(!empty($delText)&&!empty($delPic)){
                $remainText = array_diff_key($texts,I('post.textdel'));//
                $remainPic = array_diff_key($photos,I('post.photodel'));//
            }else{
                $remainText =  $texts;
                $remainPic =  $photos;
            }

            if($photoAdd[1000] == '/Uploads/'){
                $arrarText = $remainText;
                $arrarPic = $remainPic;
            }else{
                $addtext1 = I('post.phototext');
                for($k = 0;$k<count($addtext1);$k++){
                        $addText2[$k+1000] = $addtext1[$k];
                }
                $addPic = $photoAdd;
                $addText = $addText2;
                $arrarPic = $remainPic+$addPic;
                $arrarText = $remainText+$addText;
            };

            //去空
            $arrarPic = array_filter($arrarPic);
            $arrarText = array_filter($arrarText);
            $addArray['i_pics'] = implode(',',$arrarPic);
            $addArray['i_pics_text'] = implode(',',$arrarText);

            $addArray['i_text1'] = $_POST['i_text1'];
            $addArray['i_text2'] = $_POST['i_text2'];
            if($info->where($where)->save($addArray)){
                message('修改成功，已为您保存！','brand');
            }else{
                message('修改失败！', -1, 0);
            }


        }
        $this->display();

    }


    /*
     * 集团介绍
     *          公司荣誉
     * info id 4
     * */
    public function honor()
    {
        $info = M('info');
        $where['i_id'] = 4;//公司荣誉条件
        $where['i_state'] = 1;
        $data = $info->where($where)->find();

        $titles = explode('__@__', $data['i_title1']);
        unset($data['i_title1']);

        $texts = explode('__@__', $data['i_text1']);
        unset($data['i_text1']);
        foreach ($texts as $k => $v) {
            $data['i_text'][$k]['text'] = $v;
            $data['i_text'][$k]['title'] = $titles[$k];
        }
        if (empty($data)) {
            $this->assign('data', '');
        } else {
            $this->assign('data', $data);
        }
        if(IS_POST){
            if(!empty($_POST['addtitle'][0])&&!empty($_POST['addtext'][0])){
                $addtitle = I('post.addtitle');
                $addtext = I('post.addtext');
                    foreach($addtitle as $k => $v){
                        $addtitle1[$k+1000] = $v;
                        $addtext1[$k+1000] = $addtext[$k];
                    }
                $title = I('post.title')+$addtitle1;
                $text = I('post.text')+$addtext1;
            }else{
                $title =  I('post.title');
                $text =  I('post.text');
            }
            $addArray['i_text2'] = $_POST['i_text2'];
            $addArray['i_title1'] = implode('__@__',$title);
            $addArray['i_text1'] = implode('__@__',$text);
            if($info->where($where)->save($addArray)){
                message('修改成功，已为您保存！','honor');
            }else{
                message('修改失败！', -1, 0);
            }


        }
        $this->display();
    }
}
