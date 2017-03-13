<?php
use Workerman\Worker;
require_once 'D:/Program Files/PHPnow/htdocs/chat/websocket/Workerman/Autoloader.php';

//创建一个Worker监听8000端口, 使用websocket协议通讯
$ws_worker = new Worker("websocket://10.130.8.104:8000");

//启动4个进程对外提供服务
$ws_worker->count = 4;

//将客户端发送过来的数据广播到所有客户端
$ws_worker->onMessage = function($connection, $data) {
    $data = json_decode($data);
    
    if($data->type == "public" || $data->type == "private") {
        //给消息添加时间属性
        date_default_timezone_set("Asia/Chongqing");
        $data->time = date("H:i:s", time());
    
        //去掉消息中的第一个p标签
        $pattern = "/^<p>(.*?)<\/p>/";
        $data->content = preg_replace($pattern, "$1", $data->content, 1);
    } 
  
    //消息广播
    foreach($connection->worker->connections as $connection_item) {    
        $connection_item->send(json_encode($data));
    }
};

//运行worker
$ws_worker->runAll();

