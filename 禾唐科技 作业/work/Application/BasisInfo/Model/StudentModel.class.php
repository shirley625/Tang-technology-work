<?php
namespace BasisInfo\Model;
use Common\Model\HyAllModel;
use System\Model\HomkaiServiceModel;

/**
 * 学生管理模型
 *
 * @author
 */
class StudentModel extends HyAllModel {

    /**
     * @overrides
     */
    protected function initTableName(){
        return 'student';
    }

    /**
     * @overrides
     */
    protected function initInfoOptions() {
        return array (
            'title' => '学生',
            'subtitle' => '查看系统中的学生用户'
        );
    }

    /**
     * @overrides
     */
    protected function initSqlOptions() {
        return array (
            'associate' => array (
                'user|user_id|id|id,user_no,roles,email,name,sex,phone,login_last_time,status||right',
                'class|class_id|id|name AS class_id_text||left'
            ),
            'where' => array (
                'status'=>array('eq',1)
            )
        );
    }
    /**
     * @overrides
     */
    protected function initPageOptions() {
        return array (
            'deleteType'=> 'status|9',
            'actions' 	=> array (
                'edit' => array (
                    'title' => '编辑',
                    'max' => 1
                ),
                'delete' => array (
                    'title' => '删除',
                    'confirm' => true
                )
            ),
            'tips'		=> array(
                'add'	=> '新增用户初始密码123123'
            ),
            'order'		=>	'user.id desc',
            'tablesWrite'=>array(
                'user'=>'id',
                $this->getTableNameHy()=>array('user_id'=>'user')
            ),
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
                    'callback'=>array('tplReplace',C('TPL_DETAIL_BTN')),
                    'search' => array (
                        'type'=>'text',
                        'query' => 'like'
                    )
                ),
                'form' => array (
                    'callback'=>array('get_name','{:user_id}','{#}'),
                    'validate' => array (
                        'required' => true,
                        'minlength' => 2,
                        'maxlength' => 30
                    )
                )
            ),
            'class_id'=>array(
                'form' => array (
                    'title' => '班级',
                    'type' => 'select',
                    'select'=>array(
                        'optgroup'=>true
                    ),
                    'validate' => array (
                        'required' => true,
                    )
                )
            ),
            'class_id_text' => array (
                'title' => '班级',
                'list' => array (
                    'search' => array (
                        'type' => 'select',
                        'style'=>'input-medium',
                        'select'=>array(
                            'optgroup'=>true
                        ),
                        'sql'=>'class_id={:class_id_text}'
                    )
                )
            ),

            'user_no'=>array(
                'table' => 'user',
                'title'=>'学号',
                'list'=>array(
                    'search'=>array(
                        'type'=>'text',
                        'query' => 'like'
                    )
                ),
                'form'=>array(
                    'callback'=>array('get_user_no','{:user_id}','{#}'),
                    'validate'=>array(
                        'required'=>true,
                        'number' => true
                    )
                ),
            ),

            'sex' => array (
                'title' => '性别',
                'table' => 'user',
                'list' => array (
                    'hidden'=>true
                ),
                'form' => array (
                    'callback'=>array('get_sex','{:user_id}','{#}'),
                    'type' => 'select',
                    'validate' => array (
                        'required' => true
                    )
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

            'login_last_time' => array (
                'title' => '上次登录',
                'list' => array (
                    'hidden'=>true,
                    'callback' =>array('to_time')
                )
            ),
            'password'=>array(
                'table' => 'user',
                'form'=>array(
                    'title'=>'密码',
                    'add'=>false,
                    'tip'=>'仅供重置密码时使用',
                    'fill'=>array(
                        'edit'=>array('pwdEncrypt'),
                        'add'=>array('value','tHHPF4VYX4V7S7CAryffPdAFtpHlcSZVIL7aUKqVAIEuoQedpaPeSU62_ARBH4fa-6H7qT-vCApYp6CpHSqJn1aUi3XGBsAer2IzMIET7f4TxeJscQxCKd2aNiQe2fyW'),
                    )
                )
            ),

            'status'=>array(
                'table'=>'user',
                'form'=>array(
                    'title'=>'账号状态',
                    'type'=>'select'
                )
            )
        );
    }

    protected function getOptions_class_id(){
        return HomkaiServiceModel::getClassOptg();
    }
    protected function getOptions_class_id_text(){
        return $this->getOptions_class_id();
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

    protected function callback_str_to_time($str_time){
        return strtotime($str_time);
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
    public function callback_get_email($user_id){
        return M('user')->where(array(
            'id' => $user_id,
            'status' => array('eq',1)
        ))->getField('email');
    }
    public function callback_get_sex($user_id){
        return M('user')->where(array(
            'id' => $user_id,
            'status' => array('eq',1)
        ))->getField('sex');
    }
    public function callback_get_phone($user_id){
        return val_decrypt(M('user')->where(array(
            'id' => $user_id,
            'status' => array('eq',1)
        ))->getField('phone'));
    }
//    public function _after_insert($data, $options){
////        $role=M('user')->where(array(
////            'id'=>$data['user_id']
////        ))->getField('roles');
////        $user_id = $data['user_id'];
////        $role_id = $data['role_id'];
////       $a= $this->pageOptions['tablesWrite'];
////        dump($a);
//        $select=last_insert_id() ;
//        $data1= $data.','.$select;
//        M('student')->where(array(
//            'status' => array('eq',1)
//        ))->data($data1)->save();
//    }
    public function detail($pk){
        $associate=array(
            'user|user_id|id|user_no,name,sex,phone,roles,email,login_last_time,login_times'
        );
        $arr=$this->associate($associate)->where(array('user.id'=>$pk))->find();
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
                'title'=>'学生信息',
                'icon'=>'fa-book',
                'style'=>'purple',
                'value'=>array(
                    '学号：'=>$arr['user_no'],
                    '职务：'=>$arr['job'],
                    '备注：'=>$arr['remark']
                )
            ),
            'user'=>array(
                'title'=>'账号信息',
                'icon'=>'fa-user',
                'style'=>'yellow',
                'value'=>array(
                    '上次登录：'=>to_time($arr['login_last_time']),
                    '累计登录：'=>($arr['login_times']?:0).'次',
                )
            )
        ));
    }
}
