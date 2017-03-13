<?php
/**
 * File:  基类控制器，其他控制器的公共父类
 * Author: WangJian
 */
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {
    public function __construct() {
        //调用父类构造函数
        parent::__construct();
        
        //登陆过滤
        if(ACTION_NAME != 'login' && ACTION_NAME != 'register' && ACTION_NAME != 'usernameExists' && ACTION_NAME != 'nicknameExists') {
            if(!(cookie("username") && cookie("nickname"))) {
                header('location: /chat/index.php/User/login');
                exit();
            }
        }
    }
}