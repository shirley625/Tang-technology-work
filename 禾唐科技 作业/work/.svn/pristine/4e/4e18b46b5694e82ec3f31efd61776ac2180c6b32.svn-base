<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
    /**
     * 登录用户表
     * @var string
     */
    protected $tableName = 'user';

    /**
     * 登录
     * @param string $account
     * @return array
     */
    public function login($account){
        $arr=$this->where(array('user_no'=>$account,'status'=>1))->field(true)->find();
        if($arr) $arr['password'] = $this->pwdDecrypt($arr['password']);
        $role_arr = explode(',',$arr['roles']);
        if(in_array('22',$role_arr) || in_array('31',$role_arr) || in_array('32',$role_arr)){
            return false;
        }
        return $arr;
    }
    /**
     * 密码加密
     * @param string $pwd
     * @return string
     */
    public function pwdEncrypt($pwd, $isSha1=false){
        if(!$isSha1) $pwd = sha1($pwd.C('PWD_HASH_ADDON'));
        return aes_encrypt($pwd, C('CRYPT_KEY_PWD'));
    }
    /**
     * 密码解密
     * @param string $pwd
     * @return string
     */
    public function pwdDecrypt($pwd){
        return aes_decrypt($pwd, C('CRYPT_KEY_PWD'));
    }

    public function check_old_pwd($user_id,$old_pwd){
        if(!$user_id || !$old_pwd ) return false;
        $p = $this->pwdDecrypt(M('user')->where(array(
            'id' => $user_id,
            'status' => array('eq',1)
        ))->getField('password'));

        $key = substr($p, 5, 32);
        $true = aes_decrypt_base($old_pwd, $key);
        if($true!=$p){
            return false;
        }
        return true;
    }

    public function save_new_pwd($user_id,$new_pwd){
        if(!$user_id || !$new_pwd ) return false;
        $new_pwd_Encrypt = $this->pwdEncrypt($new_pwd);
        $data['password'] = $new_pwd_Encrypt;
        return M('user')->where(array(
            'id' => $user_id,
            'status' => array('eq',1)
        ))->data($data)->field('password')->save();

    }
}