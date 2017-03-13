<?php
namespace Home\Controller;

class UserController extends BaseController {
    //用户登录
    public function login() {
        if(IS_POST) {
            //收集登陆信息
            $username = I('post.username', '', 'addslashes');
            $password = I('post.password');
            
            //检验登陆信息是否正确
            $model = new \Home\Model\UserModel();
            if($user = $model->loginValidate($username, $password)) {
                //设置cookie，有效期为1天
                cookie("username", $username, 0);
                cookie("nickname", $user["nickname"], 0);
                
                //将用户设置为在线状态
                $model->online($username);
                
                header('location: /chat/index.php/Index/index');
                exit();
            } else {
                $this->assign('loginFailure', true);
            }
        }
        
        //显示模板
        $this->display();
    }
    
    //用户注册
    public function register() {
        if(IS_POST) {
            //实例化模型
            $model = new \Home\Model\UserModel();
        
            //获取数据
            $username = I('post.username', '', 'addslashes');
            $password = I('post.password', '', 'addslashes');
            $nickname = I('post.nickname', '', 'addslashes');
        
            //添加用户
            $result = $model->addUser($username, $password, $nickname);
            
            if($result) {
                $this->success('注册成功', 'User/login', 5);
                exit();
            } else {
               die('<meta charset="utf-8" />注册失败，请<a href="/chat/index.php/User/register">重试</a>');
            }
        }
        
        //显示模板
        $this->display();
    }
    
    //检查用户是否存在
    public function usernameExists() {
        if(IS_AJAX) {
            //获取数据
            $username = I('get.username', '', 'addslashes');
        
            //实例化模型
            $model = new \Home\Model\UserModel();
            
            echo $model->exists($username, \Home\Model\UserModel::EXISTS_USERNAME);
        }
    }
    
    //检查昵称是否存在
    public function nicknameExists() {
        if(IS_AJAX) {
            //获取数据
            $nickname = I('get.nickname', '', 'addslashes');
        
            //实例化模型
            $model = new \Home\Model\UserModel();
            
            echo $model->exists($nickname, \Home\Model\UserModel::EXISTS_NICKNAME);
        }
    }
    
    //注销登陆
    public function logout() {     
        //下线
        $model = new \Home\Model\UserModel();
        $model->offline(cookie('username'));
        
        //删除cookie
        cookie('username', null);
        
        //跳转回登陆页面
        header('location: /chat/index.php/User/login');
        exit();
    }
}