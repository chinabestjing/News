/**
 * Created by hashpuppy on 2017/5/3.
 */


/*
 
 * var sUserAgent = navigator.userAgent.toLocaleLowerCase();
var bIsAndroid = sUserAgent.match(/android/i) == "android";//是否为安卓
var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";//是否为wp系统
var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
var href=window.location.href;
if(href.match(/itemdetail_/)){ //兼容旧地址
    var startNum=href.indexOf('itemdetail_')+11;
    var endNum=href.indexOf('.html');
    var urlid=href.substring(startNum,endNum);
    href=href.replace(/itemdetail_[1-9]\d*.html/,'');
    href=href+'i?id='+urlid;
    window.location.href=href;
};
if (bIsAndroid || bIsIphoneOs || bIsWM ) {
    if( !href.match(/h5.laipaiya.com/) ){  //如果当前是移动端但是url不匹配移动端的网址 则跳转到h5.laipaiya.com
        if(href.match(/www/)){
            href = href.replace('www.laipaiya.com','h5.laipaiya.com');
        }else{
            if(href.match(/m.laipaiya/)){
                href = href.replace('m.laipaiya.com','h5.laipaiya.com');
            }else{
                href = href.replace('laipaiya.com','h5.laipaiya.com');
            }
        };
        window.location.href=href;
    };
    
}else{
    //pc端
    if( href.match(/h5.laipaiya.com/) ){ //如果当前使用pc端访问移动页面，则跳转至pc端
        window.location.href=href.replace('h5.laipaiya.com','laipaiya.com');
    };
    
}
 * */