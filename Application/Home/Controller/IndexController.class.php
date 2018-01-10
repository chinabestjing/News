<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    /*
     *网站首页
     * */
    public function index(){
     
        $banner = M('banner');
        $bannerResult=$banner->where("b_state=1")->select();
        $this->assign('bannerResult',$bannerResult); //banner图显示

        $kinds=M('json_kinds');
        	$kindsResult=$kinds->where("1=1")->select();
        $this->assign('kindsResult',$kindsResult); //banner图显示

        $location=M('json_province');
        $locationResult=$location->where("1=1")->select();
        $this->assign('locationResult',$locationResult);  //标的物 地址显示
        $this->display();
    }


}