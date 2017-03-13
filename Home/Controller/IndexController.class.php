<?php
namespace Home\Controller;

class IndexController extends BaseController {
    public function index() {
        //获取服务器IP，用于创建websocket对象
        $host = C("HOST");
        
        //查询在线用户
        $model = new \Home\Model\UserModel();
        $online_users = $model->getOnlineUsers();
        //在线用户数量
        $online_numbers = $model->getOnlineNumbers();
        
        //模板赋值
        $this->assign("online_users", $online_users);
        $this->assign("online_numbers", $online_numbers);
        $this->assign("host", $host);
        
        $this->display();
    }
}