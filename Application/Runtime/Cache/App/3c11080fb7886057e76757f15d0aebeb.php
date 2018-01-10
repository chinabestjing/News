<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>想溜APP接口</title>
        <link href="/Public/Common/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Public/Common/base.css" rel="stylesheet">
        <link rel="stylesheet" href="/Public/Admin/css/main.css">
        <script src="/Public/Common/jquery-1.10.2.min.js"></script>
        <script src="/Public/Common/bootstrap/js/bootstrap.min.js"></script>
        <!-- <script src="/Public/Admin/js/admin.js"></script> -->
    </head>
    <style>
        .lockshow tr td{ border: solid #ccc 1px; }
        .table thead tr th{ font-size: 15px; }
        .uheader{ margin-top: 10px; border-bottom: solid #ccc 1px; font-size: 14px;}
        .uheader li,.ubody li{ float: left; min-width: 118px; max-width: 310px; color: #6699CC; font-weight: bold; padding-left: 10px; line-height: 30px; word-wrap: break-word;}
        .ubody{border-bottom: solid #ccc 1px;}
        .ubody li{ color: #666; font-weight: 400; height: auto;}
        .ubom p{ line-height: 30px; min-height: 30px; padding: 4px 10px; color: #666;}
        .ubom p b{ color:  #6699CC;}
        .token{ line-height: 30px; background: #e7e7e7; padding: 20px;}
        .token b{ font-size: 16px; color: red;}
        .token p{ padding-left: 20px; color: #666; }
    </style>
    <body>
        <div id="top" style="position: fixed; top: 0; left: 0;">
            <div class="w1200 bc">
                <p><i class="glyphicon glyphicon-share-alt mr5"></i>巴蜀画派APP接口</p>
            </div>
        </div>

        <div id="main" class="w1200 bc mt50">
            <div class="token">
                <b>Token加密计算方式：</b>
                <p>1：参数按key值排序</p>
                <p>2：连接参数字符串 例如  a=1&b=2&c=3</p>
                <p>3：生成加密token =  md5(md5(连接的参数) + key)</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ 为字符串链接</p>
                <p style="color: red; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;key = d5ef31c8ad20e6ca597c2c89c09610c1</p>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr style="font-weight: bold; color: #5bc0de;">
                        <th width="15">#</th>
                        <th width="120">接口名称</th>
                        <th width="420">请求地址</th>
                        <th>请求方式</th>
                        <th>需要登录</th>
                        <th width="80">操作</th>
                    </tr>
                </thead>

                <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr style="cursor: pointer;" class="click_show" showod="<?php echo ($key); ?>">
                        <td><span class="badge" style="background: #5bc0de;"><?php echo ($key); ?></span></td>
                        <td colspan="20" style="font-size: 14px; font-weight: bold; color: #666;"><?php echo ($category[$key]); ?></td>
                    </tr>
                    <tbody class="cathide" id="catshow_<?php echo ($key); ?>" style="display: none; border-bottom: solid #5bc0de 5px;">
                    <?php if(is_array($val)): foreach($val as $k=>$v): ?><tr style="color: #666;" class="hhtop">
                            <td><!-- <span class="badge" style="background: #5bc0de;"><?php echo ($k + 1); ?></span> --></td>
                            <td><b><?php echo ($v["name"]); ?></b></td>
                            <td><i><u><?php echo ($v["url"]); ?></u></i></td>
                            <td>
                                <?php if($v['method'] == 'post'): ?><span class="label label-info">POST</span>
                                <?php else: ?>
                                    <span class="label label-warning">GET</span><?php endif; ?>
                            </td>
                            <td>
                                <?php if($v['islogin'] == '否'): ?><i class="glyphicon glyphicon-remove" style="color: red;"></i>
                                <?php else: ?>
                                    <i class="glyphicon glyphicon-ok" style="color: green;"></i><?php endif; ?>
                            </td>
                            <td>
                                <button data-toggle="modal" data-target="#lockBox_<?php echo ($v["id"]); ?>" class="btn btn-info btn-xs lock">查看参数</button>
                            </td>
                        </tr>
                        <!-- 参数框 begin -->
                        <div class="modal fade" id="lockBox_<?php echo ($v["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 980px; margin: 0 auto;">
                            <div class="modal-dialog" role="document" style="width: 980px;">
                                <div class="modal-content" style="padding: 10px;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel" style="color: #669999; font-size: 14px; font-weight: bold;">
                                            <i><i class="glyphicon glyphicon-transfer"></i><?php echo ($v["name"]); ?></i>
                                        </h4>
                                    </div>
                                    
                                    <div class="ubom">
                                        <p style="border-bottom: solid #ccc 1px; ">
                                            <b>请求地址：</b><?php echo ($v["url"]); ?>
                                        </p>
                                        <p style="border-bottom: solid #ccc 1px; ">
                                            <b>请求方式：</b>
                                            <?php if($v['method'] == 'post'): ?><span class="label label-info">POST</span>
                                            <?php else: ?>
                                                <span class="label label-warning">GET</span><?php endif; ?>
                                        </p>
                                        <p style="border-bottom: solid #ccc 1px; ">
                                            <b>是否登录：</b>
                                            <?php if($v['islogin'] == '否'): ?><i class="glyphicon glyphicon-remove" style="color: red;"></i>
                                            <?php else: ?>
                                                <i class="glyphicon glyphicon-ok" style="color: green;"></i>
                                                <span style="color: red;">需要将登录返回的logtoken放置header头来请求</span><?php endif; ?>
                                        </p>
                                    </div>
                                
                                    <ul class="uheader clearfix">
                                        <li>参数名</li>
                                        <li>参数类型</li>
                                        <li>是否必须</li>
                                        <li class="w300">示例值</li>
                                        <li class="w300">描述</li>
                                    </ul>
                                    <?php if(is_array($v["param"])): foreach($v["param"] as $key=>$val): ?><ul class="ubody clearfix">
                                            <li><?php echo ($val["name"]); ?>&nbsp;</li>
                                            <li><?php if($val['name'] != ''): echo ($val["type"]); endif; ?>&nbsp;</li>
                                            <li><?php if($val['name'] != ''): echo ($val["must"]); endif; ?>&nbsp;</li>
                                            <li class="w300"><?php echo ($val["value"]); ?>&nbsp;</li>
                                            <li class="w300"><?php echo ($val["msg"]); ?>&nbsp;</li>
                                        </ul><?php endforeach; endif; ?>
                                    
                                    <div class="ubom clearfix">
                                        <p style="border-bottom: solid #ccc 1px; "><b>参数加密排序：</b><?php echo ($v["sort"]); ?></p>
                                        <p class="clearfix">
                                            <b>&nbsp;&nbsp;&nbsp;返回值示例：</b>
                                        </p>
                                        <div style="width: 600px; float: left; padding-left: 20px; margin-bottom: 10px;">
                                            <pre class="p10" style="color: #666;"><?php echo ($v["return"]); ?></pre>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        
                                    </div>

                                    <div class="cb"></div>
                                </div>
                            </div>
                        </div>
                        <!-- 参数框 end --><?php endforeach; endif; ?>
                    </tbody><?php endforeach; endif; ?>
            </table>
        </div>
    </body>

    <script>
        $(function(){
            $('.click_show').click(function(){
                var _id = $(this).attr('showod');
                $(this).css({'background':'#5bc0de'}).find('td').css({'color':'#fff'});
                $(this).parents('tbody').siblings().find('.click_show').css({'background':'none'}).find('td').css({'color':'#666'});
                $('.cathide').hide();
                $('#catshow_' + _id).fadeTo(500,1);
            })
        })
    </script>
</html>