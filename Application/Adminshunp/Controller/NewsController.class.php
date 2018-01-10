<?php
namespace Adminshunp\Controller;
use Think\Controller;
use Think\Page;

class NewsController extends CommonController {
    /*
     * 新闻管理中心
     *  n_type = 1;
     *  集团新闻
     *
     * */
    public function ours_news(){
        $news = M('news');
        $where['n_type'] = 1;

        vendor('Page','','.class.php');//引入分页类
        $_GET['p'] = !empty($_GET['p'])?$_GET['p']:1;
        $count = $news->where($where)->count();
        $Page = new \Page($count,10);
        $show       = $Page->show();// 分页显示输出

        $data = $news->where($where)->page($_GET['p'].',10')->order('is_top desc,is_itop desc,n_time desc')->select();
        $this->assign('empty','<span class="empty">没有数据</span>');
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('data',$data);
        $this->display();
    }
    /*
   * AJAX
   * state 上下架切换
   *1 为上架，0为下架
   * */
    public function stateCheck(){
        if(IS_GET){
            $news = M('news');

            //判断能否下架  该条处于栏目头条不能下架 该条处于新闻头条不能下架
            $where1['is_top'] = 1;
            $where1['is_itop'] = 1;
            $where1['_logic'] = 'or';

            $map['_complex'] = $where1;
            $map['n_id'] = array('eq',I('get.n_id'));
            $num = $news->where($map)->count();
            if($num > 0){
                message('不能下架，该条新闻处于头条状态', -1, 0);
            }


            $data = array(
                'n_state'=>I('get.n_state') ==1?0:1,
            );
            $where['n_id'] = I('get.n_id');
            $rt = $news->where($where)->save($data);

            if($rt){
                $type = $news->where($where)->getField('n_type');
                if($type == 1){
                    message('切换成功', U('ours_news'));
                }elseif($type == 2){
                    message('切换成功', U('business_news'));
                }elseif($type == 3){
                    message('切换成功', U('others_news'));
                }
            }else{
                message('切换失败', -1, 0);
            }
        }
    }
    /*
     * AJAX
     * is_itop 是否为栏目头条
     *1 为上架，0为下架
     * */
    public function lanmuCheck(){
        if(IS_GET){
            $news = M('news');

            //判断能否设置为栏目头条 有栏目头条不能设置（可设置，必须修改）  处于xia架情况不能设置

            $where1['n_state'] =0;
            $where1['n_id'] = I('get.n_id');
            $rt1 = $news->where($where1)->count();
            if($rt1 >0){
                message('下架新闻不能设置为头条', -1, 0);
            }

            $where2['n_type'] = 1;
            $where2['is_itop'] = 1;
            $save = $news->where($where2)->save(array('is_itop'=>0));
            if($save){
                $data = array(
                    'is_itop'=>I('get.is_itop') == 1?0:1,
                );

                $where['n_id'] = I('get.n_id');
                $rt = $news->where($where)->save($data);
                if($rt){
                    message('切换成功', U('ours_news'));
                }else{
                    message('切换失败', -1, 0);
                }
            }else{
                message('旧的栏目头条未修改成功', -1, 0);
            }
        }
    }
    /*
     * AJAX
     * 是否为新闻头条
     *1 为上架，0为下架
     * */
    public function xinwenCheck(){
        if(IS_GET) {
            $news = M('news');

            //判断能否设置为栏目头条 有栏目头条不能设置（可设置，必须修改）  处于xia架情况不能设置

            $where1['n_state'] = 0;
            $where1['n_id'] = I('get.n_id');
            $rt1 = $news->where($where1)->count();
            if ($rt1 > 0) {
                message('下架新闻不能设置为头条', -1, 0);
            }

            // $where2['n_type'] = 1;
            $where2['is_top'] = 1;
            $save = $news->where($where2)->save(array('is_top' => 0));
            if ($save) {
                $data = array(
                    'is_top' => I('get.is_top') == 1 ? 0 : 1,
                );

                $where['n_id'] = I('get.n_id');
                $rt = $news->where($where)->save($data);
                if ($rt) {
                    $type = $news->where($where)->getField('n_type');
                    if($type == 1){
                        message('切换成功', U('ours_news'));
                    }elseif($type == 2){
                        message('切换成功', U('business_news'));
                    }elseif($type == 3){
                        message('切换成功', U('others_news'));
                    }
                } else {
                    message('切换失败', -1, 0);
                }
            } else {
                message('旧的栏目头条未修改成功', -1, 0);
            }
        }
    }


    /*
     * 新闻管理中心
     *  n_type = 2;
     *  行业新闻
     *
     * */
    public function business_news(){
        $news = M('news');
        $where['n_type'] = 2;

        vendor('Page','','.class.php');//引入分页类
        $_GET['p'] = !empty($_GET['p'])?$_GET['p']:1;
        $count = $news->where($where)->count();
        $Page = new \Page($count,10);
        $show       = $Page->show();// 分页显示输出

        $data = $news->where($where)->page($_GET['p'].',10')->order('is_top desc,is_itop desc,n_time desc')->select();
        $this->assign('empty','<span class="empty">没有数据</span>');
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('data',$data);
        $this->display();

    }
    /*
   * AJAX
   * is_itop 是否为栏目头条
   *1 为上架，0为下架
   * */
    public function lanmuCheck2(){
        if(IS_GET){
            $news = M('news');

            //判断能否设置为栏目头条 有栏目头条不能设置（可设置，必须修改）  处于xia架情况不能设置

            $where1['n_state'] =0;
            $where1['n_id'] = I('get.n_id');
            $rt1 = $news->where($where1)->count();
            if($rt1 >0){
                message('下架新闻不能设置为头条', -1, 0);
            }

            $where2['n_type'] = 2;
            $where2['is_itop'] = 1;
            $save = $news->where($where2)->save(array('is_itop'=>0));
            if($save){
                $data = array(
                    'is_itop'=>I('get.is_itop') == 1?0:1,
                );

                $where['n_id'] = I('get.n_id');
                $rt = $news->where($where)->save($data);
                if($rt){
                    message('切换成功', U('business_news'));
                }else{
                    message('切换失败', -1, 0);
                }
            }else{
                message('旧的栏目头条未修改成功', -1, 0);
            }
        }
    }

    /*
     * 新闻管理中心
     *  n_type = 3;
     *  媒体关注
     *
     * */
    public function others_news(){
        $news = M('news');
        $where['n_type'] = 3;

        vendor('Page','','.class.php');//引入分页类
        $_GET['p'] = !empty($_GET['p'])?$_GET['p']:1;
        $count = $news->where($where)->count();
        $Page = new \Page($count,20);
        $show       = $Page->show();// 分页显示输出

        $data = $news->where($where)->page($_GET['p'].',20')->order('is_top desc,is_itop desc,n_time desc')->select();
        $this->assign('empty','<span class="empty">没有数据</span>');
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('data',$data);
        $this->display();
    }
    /*
   * AJAX
   * is_itop 是否为栏目头条
   *1 为上架，0为下架
   * */
    public function lanmuCheck3(){
        if(IS_GET){
            $news = M('news');

            //判断能否设置为栏目头条 有栏目头条不能设置（可设置，必须修改）  处于xia架情况不能设置

            $where1['n_state'] =0;
            $where1['n_id'] = I('get.n_id');
            $rt1 = $news->where($where1)->count();
            if($rt1 >0){
                message('下架新闻不能设置为头条', -1, 0);
            }

            $where2['n_type'] = 3;
            $where2['is_itop'] = 1;
            $save = $news->where($where2)->save(array('is_itop'=>0));
            if($save){
                $data = array(
                    'is_itop'=>I('get.is_itop') == 1?0:1,
                );

                $where['n_id'] = I('get.n_id');
                $rt = $news->where($where)->save($data);
                if($rt){
                    message('切换成功', U('others_news'));
                }else{
                    message('切换失败', -1, 0);
                }
            }else{
                message('旧的栏目头条未修改成功', -1, 0);
            }
        }
    }
    /*
     * 删除 id
     * 删除该新闻
     *
     * */
    public function del(){
        $map['is_top'] = 1;
        $map['is_itop'] = 1;
        $map['n_state'] = 1;
        $map['_logic'] ='or';
        $where['_complex'] = $map;

        $where['n_id'] = array('eq',I('get.n_id'));
        if(!empty($where['n_id'])){
            $news = M('news');
            //判断能不能删除
            if($news->where($where)->count()>0){
                message('不能删除该条', -1, 0);
            }
            $where1['n_id'] = I('get.n_id');
            $type = $news->where($where1)->getField('n_type');
            $rt = $news->where($where1)->delete();
            if($rt){
                if($type == 1){
                    message('删除成功', U('ours_news'));
                }elseif($type == 2){
                    message('删除成功', U('business_news'));
                }elseif($type == 3){
                    message('删除成功', U('others_news'));
                }
            }else{
                message('删除失败', -1, 0);
            }

        }
    }
    /*
     * 修改新闻  edit
     * */
    public function edit(){
        $news = M('news');
        $id = I('get.n_id');
        if(!empty($id) && IS_GET){
             $data = $news->where('n_id = '.$id)->find();
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('data',$data);
            $this->display();
        }
        if(IS_POST && $_POST['n_id']){
            $data1['n_title'] = I('post.n_title');
            $data1['n_type'] = I('post.n_type');
            $data1['n_intro'] = $_POST['n_intro'];
            $data1['n_text'] = $_POST['n_text'];
            $data1['n_id'] = I('post.n_id');
            if($news->save($data1)){
                if($data1['n_type'] == 1){
                    message('修改成功', U('ours_news'));
                }elseif($data1['n_type'] == 2){
                    message('修改成功', U('business_news'));
                }elseif($data1['n_type'] == 3){
                    message('修改成功', U('others_news'));
                }
            }else{
                message('修改失败', -1, 0);
            }
        }

    }
    /*
     * 发布新闻  add
     * */
    public function add(){
        if(IS_POST){
            $news = M('news');
            $data['n_title'] = I('post.n_title');
            $data['n_type'] = I('post.n_type');
            $data['n_intro'] = $_POST['n_intro'];
            $data['n_text'] = $_POST['n_text'];
            $data['n_time'] = time();
            if(empty($data['n_title'])){
                message('标题为空', -1, 0);
            }
            if(empty($data['n_intro'])){
                message('简介为空', -1, 0);
            }
            if(empty($data['n_text'])){
                message('内容为空', -1, 0);
            }
            if( $news->add($data)){
                if($data['n_type'] == 1){
                    message('添加成功', U('ours_news'));
                }elseif($data['n_type'] == 2){
                    message('添加成功', U('business_news'));
                }elseif($data['n_type'] == 3){
                    message('添加成功', U('others_news'));
                }
            }else{
                message('添加失败', -1, 0);
            }
        }
    $this->display();
    }


/*以下无关后台                                                              */
    /*
     * 新闻中心
     *      新闻中心首页
     * */
    public function index(){
        $news = M('news');
        //头条新闻开始
        $where['n_state']= 1;
        $where['is_top']= 1;
        $data['top'] = $news -> where($where)->find();
        //集团新闻开始
        $where1['n_state'] = 1;
        $where1['n_type'] = 1;
        $data['ours_news'] = $news->where($where1)->order('n_time desc')->limit(14)->select();

        //行业新闻
        $where2['n_state'] = 1;
        $where2['n_type'] = 2;
        $data['business_news'] = $news->where($where2)->order('n_time desc')->limit(3)->select();

        //媒体关注
        $where3['n_state'] = 1;
        $where3['n_type'] = 3;
        $data['others_news'] = $news->where($where3)->order('n_time desc')->limit(7)->select();

        $this->assign('data',$data);
        $this->display();
    }

    /*
     *新闻中心
     *
     * 新闻消息页
     * */
    public function info(){
        $id = I('get.id');
        if(!empty($id)){
            $where['n_id'] = $id;
            $where['n_state'] = 1;
            $news = M('news');
            $data = $news->where($where)->find();

            if(!empty($data)){
                //查询本类top
                $where1['n_type'] = $data['n_type'];
                $where1['n_state'] = 1;
                $where1['is_itop'] = 1;
                $top = $news->where($where1)->find();
                //查询本类消息4条
                $where2['n_type'] = $data['n_type'];
                $where2['n_state'] = 1;
                $list = $news->where($where2)->order('n_time desc')->limit(4)->select();
                $this->assign('top',$top);
                $this->assign('list',$list);
                $this->assign('data',$data);
            }else{
                $this->assign('data','');
            }
        }else{
            $this->assign('data','');
        }
        $this->display();
    }
    /*
     * 新闻中心
     *          集团新闻
     *          n_type = 1
     * */
    public function ours_newsList(){
        $news = M('news');
        $where['n_state'] = 1;
        $where['n_type'] = 1;

        vendor('Page','','.class.php');//引入分页类
        $_GET['p'] = !empty($_GET['p'])?$_GET['p']:1;
        $count = $news->where($where)->count();
        $Page = new \Page($count,10);
        $data = $news->where($where)->page($_GET['p'].',10')->order('n_time desc')->select();

        $show       = $Page->show();// 分页显示输出
        $where['is_itop'] = 1;
        $top = $news->where($where)->find();

        if(!empty($data[0])){
            $this->assign('data',$data);
            $this->assign('top',$top);
            $this->assign('page',$show);// 赋值分页输出
        }else{
            $this->assign('data','');
        }
        $this->display();
    }

    /*
    * 新闻中心
    *          行业新闻
    *          n_type = 2
    * */
    public function business_newsList(){
        $news = M('news');
        $where['n_state'] = 1;
        $where['n_type'] = 2;
        vendor('Page','','.class.php');//引入分页类
        $_GET['p'] = !empty($_GET['p'])?$_GET['p']:1;
        $count = $news->where($where)->count();
        $Page = new \Page($count,10);
        $show       = $Page->show();// 分页显示输出

        $data = $news->where($where)->page($_GET['p'].',10')->order('n_time desc')->select();
        $where['is_itop'] = 1;
        $top = $news->where($where)->find();
        if(!empty($data[0])){
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('data',$data);
            $this->assign('top',$top);

        }else{
            $this->assign('data','');
        }
        $this->display();
    }

    /*
    * 新闻中心
    *          媒体关注
    *          n_type = 3
    * */
    public function others_newsList(){
        $news = M('news');
        $where['n_state'] = 1;
        $where['n_type'] = 3;
        vendor('Page','','.class.php');//引入分页类
        $_GET['p'] = !empty($_GET['p'])?$_GET['p']:1;
        $count = $news->where($where)->count();
        $Page = new \Page($count,10);
        $show       = $Page->show();// 分页显示输出

        $data = $news->where($where)->order('n_time desc')->select();
        $where['is_itop'] = 1;
        $top = $news->where($where)->find();
        if(!empty($data[0])){
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('data',$data);
            $this->assign('top',$top);

        }else{
            $this->assign('data','');
        }
        $this->display();
    }








}