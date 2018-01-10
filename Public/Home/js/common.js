/**
 * Created by hashpuppy on 2017/8/11.
 */
function grabtypeFilter(value){
    var grabres='';
    switch (value){
        case 'house_detail':
            grabres='houseDetail';
            break;
        case 'car_detail':
            grabres='carDetail';
            break;
        case 'land_detail':
            grabres='landDetail';
            break;
        case 'ship_detail':
            grabres='shipDetail';
            break;
        case 'assets_detail':
            grabres='assetsDetail';
            break;
        case 'intangible_detail':
            grabres='intangibleDetail';
            break;
        case 'debt_detail':
            grabres='debtDetail';
            break;
        case 'shares_detail':
            grabres='sharesDetail';
            break;
        case 'forest_detail':
            grabres='forestDetail';
            break;
        case 'mine_detail':
            grabres='mineDetail';
            break;
    };
    return grabres;
};

function addCSS(){
    var windowHeight = $(window).height() ;
    var cssText ='.alert-wrap{height:'+windowHeight+'px}';
    var style = document.createElement('style'),  //创建一个style元素
        head = document.head || document.getElementsByTagName('head')[0]; //获取head元素
    style.type = 'text/css'; //这里必须显示设置style元素的type属性为text/css，否则在ie中不起作用
    if(style.styleSheet){ //IE
        var func = function(){
            try{ //防止IE中stylesheet数量超过限制而发生错误
                style.styleSheet.cssText = cssText;
            }catch(e){
            
            }
        }
        //如果当前styleSheet还不能用，则放到异步中则行
        if(style.styleSheet.disabled){
            setTimeout(func,10);
        }else{
            func();
        }
    }else{ //w3c
        //w3c浏览器中只要创建文本节点插入到style元素中就行了
        var textNode = document.createTextNode(cssText);
        style.appendChild(textNode);
    }
    head.appendChild(style); //把创建的style元素插入到head中
}
addCSS();

var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
    window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;

var cancelAnimationFrame = window.cancelAnimationFrame || window.mozCancelAnimationFrame;