<?php
namespace BasisInfo\Model;
use Common\Model\HyAllModel;
use System\Model\HomkaiServiceModel;

/**
 * 教工管理模型
 *
 * @author Homkai QQ:345887894
 */
class TeacherModel extends HyAllModel {

    /**
     * @overrides
     */
    protected function initTableName(){
        return 'teacher';
    }

    protected function initInfoOptions() {
        return array (
            'title' => '教师基本信息',
            'subtitle' => '管理所有教师信息',
            'pagetitle' => '教师信息'
        );
    }

    /**
     * @overrides
     */
    protected function initSqlOptions() {
        return array (
            'associate' => array (
                'user|user_id|id|user_no,roles,name,sex,email,phone,login_last_time,status user_status'
            ),
            'where' => array (
                'status'=>1
            )
        );
    }
    /**
     * @overrides
     */
    protected function initPageOptions() {
        return array (
            'checkbox'	=> true,
            'deltype'	=> 'status|9',
            'actions' 	=> array (
                'edit' => array (
                    'title' => '编辑',
                    'max' => 1
                ),
                'delete' => array (
                    'title' => '删除',
                    // 是否需要确认
                    'confirm' => true
                ),
                'addRoles' => array(
                    'title'=>'增加管理员角色',
                    'max'=>1
                ),
                'delRoles' => array(
                    'title'=>'删除管理员角色',
                    'max'=>1
                )
            ),
            'tips'		=> array(
                'add'	=> '新增用户初始密码123123',
                'roles'=>'此功能用于限制账号的系统权限，请谨慎使用，可能会造成角色相关功能异常！'
            ),
            'order'		=>	'user.id desc',
            'tablesWrite'=>array(
                'user'=>'id',
                $this->getTableNameHy()=>array('user_id'=>'user')
            ),
            'initJS'=>'Teacher',
        );
    }
    /**
     * @overrides
     */
    protected function initFieldsOptions() {
        return array (
            'name' => array (
                'title' => '姓名',
                'table' => 'user',
                'list' => array (
                    //'orderdir' => 'CONVERT(user.name USING gbk)',
                    'callback'=>array('tplReplace',C('TPL_DETAIL_BTN')),
                    'search' => array (
                        'query' => 'like' ,
                    )
                ),
                'form' => array (
                    'callback'=>array('get_name','{:user_id}','{#}'),
                    'validate' => array (
                        'required' => true,
                        'minlength' => 2
                    )
                )
            ),
            'roles' => array (
                'title' => '角色',
                'table' => 'user',
                'list' => array (
                    'callback'=>array('rolesRead'),
                    'search' => array (
                        'type' => 'select',
                        'query'=>'like'
                    )
                ),
                'form'=>array(
                    'type'=>'select',
                    'validate'=>array(
                        'required'=>true
                    ),
                    'select'=>array(
                        'multiple'=>true,
                        'editmultiple'=>true
                    ),
                    'edit'=>false,
                    'fill'=>array(
                        'both'=>array('rolesWrite',22)
                    ),
                )
            ),
            'job' => array (
                'form' => array (
                    'title' => '职务',
                    'type' => 'text'

                )
            ),
            'user_no'=>array(
                'title'=>'教工号',
                'table'=>'user',
                'list'=>array(
                    'hidden'=>true
                ),
                'form'=>array(
                    'callback'=>array('get_user_no','{:user_id}','{#}'),
                    'validate'=>array(
                        'required'=>true
                    )
                ),
            ),
            'sex' => array (
                'title' => '性别',
                'table' => 'user',
                'list' => array (
                    'search' => array (
                        'type' => 'select'
                    )
                ),
                'form' => array (
                    'type' => 'select',
                    'validate' => array (
                        'required' => true
                    )
                )
            ),
            'phone' => array (
                'title' => '电话',
                'table' => 'user',
                'list' => array (
                    'order' => false ,
                    'callback'=>array('val_decrypt')
                ) ,
                'form'=>array(
                    'validate'=>array(
                        'required'=>true,
                        'regex'=>'^1[3578]\d{9}$'
                    ),
                    'fill'=>array(
                        'both'=>array('val_encrypt')
                    ),
                    'callback'=>array('get_phone','{:user_id}','{#}'),

                )
            ),
            'email' => array (
                'title' => '邮箱',
                'table' => 'user',
                'list' => array (

                ),
                'form' => array (
                    'callback'=>array('get_email','{:user_id}','{#}'),
                    'type' => 'text',
                    'validate'=>array(

                    ),

                )
            ),
            'login_last_time' => array (
                'title' => '上次登录',
                'table' => 'user',
                'list' => array (
                    'callback' =>array('to_time')
                )
            ),
            'remark' => array (
                'table' => 'user',
                'form' => array (
                    'title' => '备注',
                    'type' => 'textarea'
                )
            ),
            'password'=>array(
                'table'=>'user',
                'form'=>array(
                    'title'=>'密码',
                    'add'=>false,
                    'fill'=>array(
                        'edit'=>array('pwdEncrypt'),
                        'add'=>array('value','tHHPF4VYX4V7S7CAryffPdAFtpHlcSZVIL7aUKqVAIEuoQedpaPeSU62_ARBH4fa-6H7qT-vCApYp6CpHSqJn1aUi3XGBsAer2IzMIET7f4TxeJscQxCKd2aNiQe2fyW'),
                    )
                )
            ),
            'user_status'=>array(
                'table' => 'user',
                'list' => array (
                    'title' => '账号状态',
                    'width' => '30',
                    'callback' => array('status'),
                    'orderdir'=>'hy.status'
                ),
            ),
            'status' => array (
                'table'=>'user',
                'form'=>array(
                    'title' => '账号状态',
                    'callback' => array('value','{:user_status}'),
                    'type'=>'select',
                    'options'=>array(1=>'正常','00'=>'禁用'),
//                    'style'=>'no-bs-select'
                )
            )
        );
    }

    public function callback_get_name($user_id){
        return M('user')->where(array(
            'id' => $user_id,
            'status' => array('eq',1)
        ))->getField('name');
    }
    public function callback_get_user_no($user_id){
        return M('user')->where(array(
            'id' => $user_id,
            'status' => array('eq',1)
        ))->getField('user_no');
    }
    public function callback_get_phone($user_id){
        return val_decrypt(M('user')->where(array(
            'id' => $user_id,
            'status' => array('eq',1)
        ))->getField('phone'));
    }
    protected function callback_rolesRead($role_str){
        if(!$role_str) return '无';
        $role_str = M('frame_role')->where(array(
            'id' => array(IN,$role_str)
        ))->getField('title',true);
        return implode(',',$role_str);
    }
    /**
     * 角色写入回调
     */
    protected function callback_rolesWrite($arr){
        if(!$arr) return false;
        if(is_array($arr)) return implode(',', $arr);
        return $arr;
    }
    /**
     * 写入回调 - 密码加密
     * @param string $str
     * @return string | boolean
     */
    protected function callback_pwdEncrypt($str){
        if(is_string($str) && ''!==trim($str)) return D('HyAccount')->pwdEncrypt($str);
        return false;
    }

    /**
     * 用于支持fieldsOptions
     */
    protected function getOptions_roles() {
        return M ( 'frame_role' )->where ( array (
                'id' =>array('gt',21)
        ) )->order('id desc')->limit('1,10')->getField ( 'id,title' );
    }

    public function detail($pk){
        $reflect=array(
            'user|user_id|id|user_no,name,sex,phone,roles,email,login_last_time,login_times'
        );
        $arr=$this->associate($reflect)->where(array($this->getPk()=>$pk))->find('hy');
//        dump($arr);

        return array('table'=>array(
            'base'=>array(
                'title'=>'基础信息',
                'icon'=>'fa-list-alt',
                'style'=>'green',
                'value'=>array(
                    '姓名：'=>val_decrypt($arr['name']),
                    '性别：'=>$arr['sex'],
                    '电话：'=>val_decrypt($arr['phone']),
                    '邮箱：'=>$arr['email']
                )
            ),
            'teacher'=>array(
                'title'=>'教工信息',
                'icon'=>'fa-book',
                'style'=>'purple',
                'value'=>array(
                    '教工号：'=>$arr['user_no'],
                    '职务：'=>$arr['job'],
                    '备注：'=>$arr['remark'],
                )
            ),
            'user'=>array(
                'title'=>'账号信息',
                'icon'=>'fa-user',
                'style'=>'yellow',
                'value'=>array(
                    '角色 ：'=>$this->callback_rolesRead($arr['roles']),
                    '上次登录：'=>to_time($arr['login_last_time']),
                    '累计登录：'=>($arr['login_times']?:0).'次',
                )
            )
        ));


    }

    public function ajax_addRoles(&$json){
        $idStr = I('pk');
        $user_id = act_decrypt($idStr);

        $user_info = M('user')->where(array(
            'id' => $user_id,
            'status' => array('eq',1)
        ))->find();

        $user_info['roles'] = explode(',',$user_info['roles']);

        foreach($user_info['roles'] as $k=>$v){
            if($v == 31){
                $json['status'] = false;
                $json['info'] = '所选教师已有管理员的角色！';
                return ;
            }
        }
        array_push($user_info['roles'],'31');

        $data['roles'] = implode($user_info['roles'],',');
        $result = M('user')->where(array(
            'id' => $user_id
        ))->save($data);
        if($result){
            $json['status'] = true;
            $json['info'] = '已添加管理员的角色！';
        }else{
            $json['status'] = false;
            $json['info'] = '数据处理失败！';
        }
    }

    public function ajax_delRoles(&$json){
        $idStr = I('pk');
        $user_id = act_decrypt($idStr);

        $user_info = M('user')->where(array(
            'id' => $user_id,
            'status' => array('eq',1)
        ))->find();

        $user_info['roles'] = explode(',',$user_info['roles']);

        foreach($user_info['roles'] as $k=>$v){
            if($v == 31){
                unset($user_info['roles'][$k]);break;
            }
        }

        $data['roles'] = implode($user_info['roles'],',');

        $result = M('user')->where(array(
            'id' => $user_id
        ))->save($data);
        if($result){
            $json['status'] = true;
            $json['info'] = '已删除管理员的角色！';
        }else{
            $json['status'] = false;
            $json['info'] = '数据处理失败！';
        }
    }

}
