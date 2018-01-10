<?php
/**
 * [扩展函数库]
 * @Author: Careless
 * @Date:   2015-12-01 16:23:57
 * @Email:  965994533@qq.com
 * @Copyright:
 */
/**
 * [p 打印数据]
 * @Author          彭彪
 * @DateTime        2015-12-01T16:24:09+0800
 */
function deldDir($dir) {
    //先删除目录下的文件：
    $dh=opendir($dir);
    while ($file=readdir($dh)) {
        if($file!="." && $file!="..") {
            $fullpath=$dir."/".$file;
            if(!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldDir($fullpath);
            }
        }
    }

    closedir($dh);
    //删除当前文件夹：
    if(rmdir($dir)) {
        return true;
    } else {
        return false;
    }
}
function p($var) {
	if (is_bool($var)) {
		var_dump($var);
	} else if (is_null($var)) {
		var_dump(NULL);
	} else {
		echo "<pre style='padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;'>" . print_r($var, true) . "</pre>";
	}
}

/**
 * [message 消息提示框]
 * @Author           彭彪
 * @DateTime         2015-12-01T17:43:02+0800
 * @param    string  $message   [提示信息]
 * @param    string  $url       [跳转地址]
 * @param    integer $status    [状态 1:成功 | 0:失败]
 */
function message($message = '', $url = '', $status = 1){
	// 存入cookie
	cookie('msgStatus', $status);
	cookie('msgContent', $message);
	// 判断跳转页面
	if ($url == '-1') {
		header("Location: " . $_SERVER['HTTP_REFERER']);
	} else {
		header('location:'.$url);
	}
	exit();
}

/**
 * [show_msg 显示提示框]
 * @Author          彭彪
 * @DateTime        2015-12-01T18:03:06+0800
 */
function show_msg(){
	if (cookie('msgContent')) {
		// 显示弹窗
		return "<script>\$(function(){\$('#showmsg').click();})</script>";
	}
}

/**
 * [ajax_error ajax返回错误信息]
 * @param  [string]  $msg  [错误提示]
 * @param  integer   $code [错误代码，用于前端判断]
 */
function ajax_error($msg, $status = 0){
    $data = array(
        'status'     => $status,
  //      'code'      => $code,
        'msg'      => $msg,
    );
    echo json_encode($data);
    die;
}

/**
 * [ajax_success ajax返回成功]
 * @param  [array] $data [返回数据]
 */
function ajax_success($msg, $data = null){
    $data = array(
        'status'     => 1,
        'msg'       => $msg,
        'data'      => $data,
    );
    echo json_encode($data);
    die;
}

/**
 * [createpwd 用户密码加密方式]
 * @Author          彭彪
 * @DateTime        2015-12-04T17:57:44+0800
 * @param    [type] $pwd       [要加密的密码]
 */
function createpwd($pwd){
	return md5(C('UP_KEY') . md5($pwd));
}

/**
 * [create_id_dir 创建对应ID目录]
 * @param  [type] $id [description]
 */
function create_id_dir($id){
	// 将id用前导0填充
	$str = sprintf('%09d', $id);
	// 1级目录
	$dir1 = substr($str, 0, 3);
	// 2级目录 
	$dir2 = substr($str, 3, 2);
	// 3级目录
	$dir3 = substr($str, 5, 2);
	// 组合路径
	$pash = $dir1 . '/' . $dir2 . '/' . $dir3 . '/';
	// 创建目录
	return $pash;
}

/**
 * [create_order_num 创建唯一订单号]
 * @return [string]
 */
function create_order_num(){
	// 截取当前微秒数的后6位
	$num = substr(uniqid(), 7, 13);
	// 将截取的微秒数分割为数组
	$numArr = str_split($num);
	// 用ord获取ASCII码，避免字母的出现
	$numArr = array_map('ord', $numArr);
	// 组合为字符串 规范长度
	$str = substr(implode('', $numArr), 0, 8);
	// 生成随机数
	$rand = '';
	for ($i=0; $i < 6; $i++) { 
		$rand .= mt_rand(0,9);
	}
	// 组合订单号
	return date('Ymd') . $str . $rand;
}

/**
 * [upload_img 上传图片]
 * @Author          彭彪
 * @DateTime        2015-12-17T17:29:40+0800
 * @return   [type] [description]
 */
function upload_img($fname){
	// 判断是否有图片上传
    if (!empty($_FILES[$fname]['name'])) {
        // 实例化上传类
        $upload = new \Think\Upload();
        // 设置附件上传大小
        $upload -> maxSize = 3145728;
        // 设置附件上传类型
        $upload -> exts = array('jpg', 'gif', 'png', 'jpeg');
        // 上传文件
        $info = current($upload -> upload());
        if (!$info) {
            // 上传错误提示错误信息
            ajax_error($upload->getError());
        } else {
            // 返回图片路径
            return '/Uploads/' . $info['savepath'] . $info['savename'];
        }
    }
}

/**
 * [sql_keyupdate_one 有则修改，无则添加 sql 语句（一条）]
 * @Author          彭彪
 * @DateTime        2015-12-18T10:08:58+0800
 */
function sql_keyupdate_one($data, $table){
	// 组合sql语句
	$sql = 'INSERT INTO `' . C('DB_PREFIX') . $table . '` (';
	$b = '';
	foreach ($data as $k => $v) {
		$insert .= $b . '`' . $k . '` ';
		$values .= $b . '"' . $v . '"';
		$update .= $b . '`' . $k . '`="' . $v . '"'; 
		$b = ',';
	}
	$sql .= $insert . ') VALUES (' . $values . ') ON DUPLICATE KEY UPDATE ' . $update;
	return $sql;
}

/**
 * [curl_post curl post请求]
 * @Author          彭彪
 * @DateTime        2015-12-28T11:05:57+0800
 */
function curl_post($url, $data = null){
	// 初始化curl
	$ch = curl_init();
	// 设置请求地址
	curl_setopt($ch, CURLOPT_URL, $url);
	// 请求方式为POST
	curl_setopt($ch, CURLOPT_POST, 1);
	// header头设为空
	curl_setopt($ch, CURLOPT_HEADER, 0);
	// 返回的数据自动显示
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// 抓取跳转后的页面
	// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	// POST数据
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// 判断是否为https
	$ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE;
	if ($ssl) {
		$opt[CURLOPT_SSL_VERIFYHOST] = 1;
        $opt[CURLOPT_SSL_VERIFYPEER] = FALSE;
	}
	// 执行请求
	$return = curl_exec($ch);
	// 关闭curl资源
	curl_close($ch);

	// 返回数据
	return $return;
}

/**
 * [ip_location IP定位]
 * @Author          彭彪
 * @DateTime        2016-01-04T16:18:09+0800
 * @param    [type] $ip        [IP地址]
 */
function ip_location($ip) {
	// 加密key
	$sk = 'lGfc379pBlPZ1E5dMIdGiLrGn7tKfhvr';
	// 请求参数
	$parm = array(
		'ip'	=> $ip,
		'ak'	=> '15aZkMG1LiQVODftrGtCnKR8',
	);
	// 请求uri
	$uri = '/location/ip';
	// 计算加密sn
	$parm['sn'] = caculateAKSN($parm['ak'], $sk, $uri, $parm);
	// 组合请求地址
	$url = 'http://api.map.baidu.com/location/ip?' . http_build_query($parm);
	// 请求数据
	$json = file_get_contents($url);
	return json_decode($json, true);
}

/**
 * [caculateAKSN IP定位 sn加密]
 * @Author          彭彪
 * @DateTime        2016-01-04T16:21:24+0800
 */
function caculateAKSN($ak, $sk, $url, $querystring_arrays, $method = 'GET'){
	if ($method === 'POST'){  
	    ksort($querystring_arrays);  
	}  
	$querystring = http_build_query($querystring_arrays);  
	return md5(urlencode($url.'?'.$querystring.$sk));  
}

/**
 * [lng_location 通过经纬度获取地区]
 * @Author          彭彪
 * @param    [type] $lng     [经度]
 * @param    [type] $lat     [纬度]
 */
function lng_location($lng, $lat){
	// 加密key
	$sk = 'lGfc379pBlPZ1E5dMIdGiLrGn7tKfhvr';
	// 请求参数
	$parm = array(
		'output'	=> 'json',
		'location'	=> $lat . ',' . $lng,
		'ak'	=> '15aZkMG1LiQVODftrGtCnKR8',
	);
	// 请求uri
	$uri = '/geocoder/v2/';
	// 计算加密sn
	$parm['sn'] = caculateAKSN($parm['ak'], $sk, $uri, $parm);

	// 组合请求地址
	$url = 'http://api.map.baidu.com/geocoder/v2/?' . http_build_query($parm);
	$json = file_get_contents($url);
	return json_decode($json, true);
}

/**
 * [returnSquarePoint 附近定位]
 * @Author           彭彪
 * @DateTime         2016-01-04T16:24:56+0800
 */
function returnSquarePoint($lng,$lat,$distance=5) {
    $earthRadius = 6371;
    $dlng = 2*asin(sin($distance/(2*$earthRadius))/cos(deg2rad($lat)));
    $dlng = rad2deg($dlng);
    $dlat = $distance/$earthRadius;
    $dlat = rad2deg($dlat);
    return array(
        'left-top'=>array('y'=>$lat+$dlat,'x'=>$lng-$dlng),
        'right-top'=>array('y'=>$lat+$dlat,'x'=>$lng+$dlng),
        'left-bottom'=>array('y'=>$lat-$dlat,'x'=>$lng-$dlng),
        'right-bottom'=>array('y'=>$lat-$dlat,'x'=>$lng+$dlng),
    );

}

/**
* [getDistance 获得地球表面的两点之间距离]
*/
function getDistance($lat1, $lng1, $lat2, $lng2){
     $earthRadius = 6371000;
     $lat1 = ($lat1 * pi() ) / 180;
     $lng1 = ($lng1 * pi() ) / 180;
 
     $lat2 = ($lat2 * pi() ) / 180;
     $lng2 = ($lng2 * pi() ) / 180;
 
     $calcLongitude = $lng2 - $lng1;
     $calcLatitude = $lat2 - $lat1;
     $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);  
     $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
     $calculatedDistance = $earthRadius * $stepTwo;
 
     return round($calculatedDistance);
 }

/**
 * [getAddress 根据IP获得城市信息]
 * @Author          周磊
 * @DateTime        2016/1/5 17:31
 */

function getAddress($clientIP){
    $ip = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$clientIP; //调用淘宝API城市接口
    $ipInfo = json_decode(file_get_contents($ip));
    $province = $ipInfo -> data -> region;
    $city = $ipInfo -> data -> city;
    $data = $province.$city;
    return $data;
}

/**
 * [array_sort 多维数组按某个键值排序]
 * @Author          彭彪
 * @DateTime        2016-01-06T15:32:14+0800
 */
function array_sort($array,$keys,$type='asc'){
	$keysvalue=array();
	foreach($array as $key=>$val){
		$keysvalue[] = $val[$keys];
	}
	asort($keysvalue); //key值排序
	reset($keysvalue); //指针重新指向数组第一个
	foreach($keysvalue as $key=>$vals) {
		$keysort[] = $key;
	}
	$keysvalue = array();
	$count=count($keysort);
	if(strtolower($type) != 'asc'){
		for($i=$count-1; $i>=0; $i--) {
			$keysvalue[] = $array[$keysort[$i]];
		}
	}else{
		for($i=0; $i<$count; $i++){
			$keysvalue[] = $array[$keysort[$i]];
		}
	}
	return $keysvalue;
}


/**
 * [dirDelete 删除指定目录下的所有文件及文件夹]
 * @Author          彭彪
 * @DateTime        2016-01-08T17:01:53+0800
 */
function dirDelete($dir) {
	$dir = dirPath($dir);
	if (!is_dir($dir)) {
		return false;
	}
	$list = glob($dir . '*');
	foreach ($list as $v) {
		if (basename($v) != 'index.html' && basename($v) != 'token' && basename($v) != 'bz' && basename($v) != 'msg_read') {
			is_dir($v) ? dirDelete($v) : @unlink($v);
		}
	}
	return @rmdir($dir);
}

/**
 * [dirPath 标准化路径]
 * @Author          彭彪
 * @DateTime        2016-01-08T17:02:12+0800
 */
function dirPath($path) {
	$path = str_replace('\\', '/', $path);
	if (substr($path, -1) != '/')
	$path = $path . '/';
	return $path;
}

// 验证 webhooks 签名方法
function verify_signature($raw_data, $signature, $pub_key_path) {
    $pub_key_contents = file_get_contents($pub_key_path);
    // php 5.4.8 以上，第四个参数可用常量 OPENSSL_ALGO_SHA256
    return openssl_verify($raw_data, base64_decode($signature), $pub_key_contents, 'sha256');
}

/**
 * [get_province 获取省]
 * @Author          彭彪
 * @DateTime        2016-01-22T17:42:11+0800
 */
function get_province(){
	$data = F('city/province');
	if (!$data) {
		$data = M('province') -> field('province_id,name') -> select();
		F('city/province', $data);
	}
	return $data;
}

/**
 * [get_city 获取市]
 * @Author          彭彪
 * @DateTime        2016-01-22T17:47:01+0800
 */
function get_city($province_id){
	$data = F('city/city_' . $province_id);
	if (!$data) {
		$data = M('city') -> field('city_id,name') -> where(array('province_id'=>$province_id)) -> select();
		F('city/city_' . $province_id, $data);
	}
	return $data;
}

/**
 * [get_county 获取县]
 * @Author          彭彪
 * @DateTime        2016-01-22T17:53:53+0800
 */
function get_county($city_id){
	$data = F('city/county_' . $city_id . '/' . $city_id);
	if (!$data) {
		$data = M('county') -> field('county_id,name') -> where(array('city_code'=>$city_id)) -> select();
		F('city/county_' . $city_id . '/' . $city_id, $data);
	}
	return $data;
}

/**
 * 龙湖
 * @param $data
 * @return array
 *  非递归方式实现分类无限极 数据分类
 */
function actionCategroyData($data){
    $new_data = array();
    foreach($data as $key=>$val){
        if($val['pid']==0){//当fid为0的话是个新的
            $arr = $val;
//            echo '<pre>';
//            print_r($arr);
//            echo '<pre/>';
            unset($data[$key]);
            foreach($data as $key1=>$val1){
                if($val1['pid']==$arr['cid']){
                    $arr['nextlist'][] = $val1;
                    unset($data[$key1]);
                }
            }
            $new_data[] = $arr;
            //var_dump( $new_data);
        }
    }
    return $new_data;
}


/**
 * [admin_page 后台分页]
 * @Author          彭彪
 * @DateTime        2016-04-20T21:53:16+0800
 */
function admin_page($model, $where = null, $orderby = null, $field = null, $is = false){
	// 获取总数
	$count = $model -> where($where) -> count();
	// 实例化分页
	$page = new \Think\Page($count,10);
	$limit = $page -> firstRow . ',' . $page -> listRows;
	// 获取数据
	$data = $model -> field($field,$is) -> where($where) -> order($orderby) -> limit($limit) -> select();
	$data['page'] = $page -> show();
	return $data;
}