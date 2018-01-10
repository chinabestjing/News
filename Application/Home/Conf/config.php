<?php
return array(
    'HTML_CACHE_ON' => true,//开启静态缓存
    'HTML_CACHE_TIME' => 300000,
    'HTML_FILE_SUFFIX' => '.shtml',
    'HTML_PATH' =>'__MODULE__/html',
    'HTML_CACHE_RULES' => array(
        '*'=>array('{:controller}/{:action}_{id}','6000000'),
       /* 'Contact:'=>array('Contact/{:action}_{id}','600'),
        'Culture:'=>array('Culture/{:action}_{id}','600'),
        'Index:'=>array('Index/{:action}_{id}','600'),
        'Media:'=>array('Media/{:action}_{id}','600'),
        'News:'=>array('News/{:action}_{id}','600'),
        'Resource:'=>array('Resource/{:action}_{id}','600'),
        'Trade:'=>array('Trade/{:action}_{id}','600'),
        'School:'=>array('School/{:action}_{id}','600')*/
    )
        //'配置项'=>'配置值'
);