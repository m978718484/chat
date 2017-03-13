<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
    //定义常量
    const EXISTS_USERNAME = 0;
    const EXISTS_NICKNAME = 1;
    
    /**
     * 添加用户
     * @param string $username  用户名
     * @param string $password  密码
     * @return mixed
     */
    public function addUser($username, $password, $nickname) {
        //如果用户名已经存在，则添加失败
        if($this->exists($username, self::EXISTS_USERNAME)) {
            return false;
        }
        
        //如果用户名不存在，添加用户
        $this->username = ':username';
        $this->password = ':password';
        $this->nickname = ':nickname';
        $bind[':username'] = $username;
        $bind[':password'] = md5(md5($password));
        $bind[':nickname'] = $nickname;
        return $this->bind($bind)->add();
    }
    
    
    /**
     * 检查用户名是否存在
     * @param string $field  用户名或昵称
     * @param int $style  以什么字段作为判断依据，EXISTS_USERNAME表示用户名是否存在，EXISTS_NICKNAME表示昵称是否存在
     * @return bool  如果存在，返回true，否则返回false
     */
    public function exists($field, $style) {
        //判断用户名是否存在
        if($style == self::EXISTS_USERNAME) {
            $where['username'] = ':username';
            $user = $this->where($where)->bind(':username', $field)->find();
            if(null !== $user) {
                return true;
            } else {
                return false;
            }
        } 
        
        //判断昵称是否存在
        if($style == self::EXISTS_NICKNAME) {
            $where['nickname'] = ':nickname';
            $user = $this->where($where)->bind(':nickname', $field)->find();
            if(null !== $user) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    
    /**
     * 验证登陆信息是否正确
     * @param string $username  用户名
     * @param string $password  密码
     * @return bool  信息正确返回该用户的完整信息，为一个关联数组，否则返回false
     */
    public function loginValidate($username, $password) {
        //查询用户名为$username的用户
        $where['username'] = ':username';
        $user = $this->where($where)->bind(':username', $username)->field('username, password, nickname')->find();
        
        //如果该用户存在，进一步验证密码是否正确
        if(null !== $user) {
            if($user['password'] == md5(md5($password))) {
                return $user;
            }
        }
        
        return false;
    }
    
    
    /**
     * 上线
     * @param string $username  用户名
     * @return int  返回受影响的行数
     */
    public function online($username) {
        $where['username'] = ':username';
        $data['online'] = 1;
        return $this->where($where)->bind(':username', $username)->save($data);
    }
    
    
    /**
     * 下线
     * @param string $username  用户名
     * @return int  返回受影响的行数
     */
    public function offline($username) {
        $update = "update chat_user set online=0 where username='$username'";
        return $this->execute($update);
    }
    
    
    /**
     * 获取在线用户
     * @return Array 返回一个二维数组
     */
    public function getOnlineUsers() {
        $where["online"] = ":online";
        return $this->where($where)->bind(":online", 1)->select();
    }
    
    /**
     * 获取在线用户数量
     * @return int
     */
    public function getOnlineNumbers() {
        $where["online"] = ":online";
        $result = $this->where($where)->bind(":online", 1)->field("count(*) as count")->find();
        return $result["count"];
    }
}