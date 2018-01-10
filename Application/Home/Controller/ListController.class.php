<?php
namespace Home\Controller;
use Think\Controller;

class ListController extends Controller {
/*
*
*/
    public function index(){
   
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");

curl_setopt($ch, CURLOPT_HTTP_VERSION  , CURL_HTTP_VERSION_1_0 );
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 8);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD  , 'api:0c67496aa8e7a8774dce8c10ac5eba17');

curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => '18782462482','message' => '验证码：123456【铁壳测试】'));

$res = curl_exec( $ch );
curl_close( $ch );
//$res  = curl_error( $ch );
var_dump($res);
        //$this->display('Index/list');
    }


}