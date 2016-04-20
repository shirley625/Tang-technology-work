<?php
namespace Home\Controller;
use Home\Model\UserModel;
use Think\Controller;
class UserController extends BaseController {
    protected $model;
	public function index(){
		$this->display();
	}
    public function login(){
        $this->userLogout();
        //$this->cacheSiteSetting();
        session('LOGIN_KEY', md5(rand(10000000, 99999999)));
        $this->display();
    }
    public function pwd(){
        if(!ss_h_uid() || ss_h_uid() == '' ){
            $this->redirect('User/login');
        }
        $this->display();
    }
    public function ajax_do_login(){

        $json = array('status'=>false, 'info'=>'', 'data'=>'');
        $u = aes_decrypt_base(I('u'), session('LOGIN_KEY'));
        $this->model = new UserModel();
        if(!$user = $this->model->login($u)) {
            $json['info'] = '账号不存在或已禁用！'.$u;
            $this->ajaxReturn($json);
        }
        $key = substr($user['password'], 5, 32);
        $true = aes_decrypt_base(I('p'), $key);
        if($user['password'] != $true){
            $json['info'] = '输入的密码有误！';
            $this->ajaxReturn($json);
        }
        $json['status'] = true;
        $json['info'] = '用户身份验证成功，玩命加载中...';
        $json['data'] = rand(10000000, 99999999);

        session('user_no',$user['user_no']);
        session('user_id', $user['id']);
        session('userName', $user['name']);

//        if($user['id'])	{
//            $log = array('user_id'=>$user['id'], 'controller'=>CONTROLLER_NAME, 'action'=>ACTION_NAME, 'post'=>json_encode(I('post.')), 'description'=>' >> '.$logStep, 'ip'=>get_client_ip(), 'create_time'=>time());
//            M('frame_log')->add($log);
//        }

        $this->ajaxReturn($json);
    }

    public function ajax_save_pwd(){
        $json = array('status'=>false, 'info'=>'', 'data'=>'');
        $old_p = I('o_p');
        $new_p = I('n_p');
        $confirm_p = I('c_p');
        $uM = D('user');
        $old_result = $uM->check_old_pwd(ss_h_uid(),$old_p);
        if(!$old_result){
            $json['info'] = '旧密码输入错误!';
            $this->ajaxReturn($json);
        }
        $new_result = $uM->save_new_pwd(ss_h_uid(),$new_p);
        if(!$new_result) {
            $json['info'] = '密码修改失败!';
            $this->ajaxReturn($json);
        }
        $json['status'] = true;
        $json['info'] = '密码修改成功!';
        $this->ajaxReturn($json);
    }

    public function userLogout(){
        if(!ss_h_uid()) return;
        $this->model = new UserModel();
        $this->model->where(array('id'=>ss_h_uid()))->setField('session_id','');
        session('[destroy]');
        $this->redirect('Index/index');
    }

}
