<?php
namespace QuestionCategory\Model;
use System\Model\HyAlertModel;

/**
 * 问题反馈管理模型
 *
 * @author
 */
class QuestionsAnswerModel extends QuestionsModel {


    /**
     * @overrides
     */
    protected function initInfoOptions() {
        return array (
            'title' => '教工交流平台',
            'subtitle' => ''
        );
    }
    /**
     * @overrides
     */
    protected function initSqlOptions() {
        return array (
            'associate' => array (
                'good_course|category_id|id|name||left'
            ),
            'where' => array (
                'status'=>array('lt',9),
                'category_id' => array( 'IN', $this->get_category( ss_uid() ))
            )
        );
    }

    protected function initPageOptions() {
        return array (
            'checkbox'	=> true,
            'deleteType'=> 'status|9',
            'actions' 	=> array (
                'edit' => array (
                    'title' => '回答问题'
                ),
            ),
            'buttons'	=> array(),
            'initJS'=>array(
                'QuestionXhj',
                'UMEditor'
            )
        );
    }

    protected function initFieldsOptions() {
        return array (
            'category_id'=>array(
                'title'=>'问题分类',
                'list'=>array(
                    'callback'=>array('getCategory_name'),
                    'search'=>array(
                        'type'=>'select',
                        'select'=>array(
                            'optgroup'=>true
                        )
                    )
                )
            ),
            'title'=>array(
                'title'=>'问题标题',
                'list'=>array(
                    'callback' => array ('tplReplace','{callback}' => array ('value','{:title}'),C ( 'TPL_DETAIL_BTN' ),'{#}'),
                )
            ),
            'is_publish'=>array(
                'form'=>array(
                    'title'=>'是否公布',
                    'type'=>'select'
                )
            ),
            'answer'=>array(
                'form'=>array(
                    'title'=>'我的回答',
                    'type'=>"textarea",
                    'attr'=>'style="height:400px;width:400px"',
                    /* 	'style'=>'make-umeditor' */
                    'regex'=>''
                )
            ),
            'is_open'=>array(
                'form'=>array(
                    'type'=>'select'
                )
            ),

            'ans_id'=>array(
                'form'=>array(
                    'fill'=>array(
                        'add'=>	array('getCharge','{:category_id}','{#}')

                    )
                )
            ),
            'ans_time'=>array(
                'form'=>array(
                    'fill'=>array(
                        'edit'=>array('value',time())
                    )
                )
            ),
            'ask_id' => array (
                'list'=>array(
                    'title'=>'提问用户',
                    'callback'=>array('getAskName'),

                ),
                'form' => array (
                    'fill'=>array(
                        'add'=>array('value',ss_uid())
                    )
                )
            ),
            'ask_role'=>array(
                'list'=>array(
                    'title'=>'提问用户角色',
                    'callback'=>array('getRole','{:ask_id}','{#}')
                )
            ),
            'create_time'=>array(
                'title'=>'提问时间 ',
                'list'=>array(
                    'callback'=>array('getcTime')
                )
            )
        );
    }


    protected function getOptions_is_publish(){
            return array(
                '0'=>'不公布',
                '1'=>'公布'
            );
    }
    protected function callback_getCategory_name($category_id){
        return M('question_category')->where(array('id'=>$category_id))->getField('name');
    }
    protected function callback_getcTime($create_time){
        return date("Y-m-d H:i:s",$create_time);
    }
    protected function callback_getRole($ask_id){
        $roles_str = M('user')->where(array(
            'id'=>$ask_id
        ))->getField('roles');
        $roles_arr = explode(',', $roles_str);
        $str = '';
        foreach($roles_arr as $k=>$v){
            if($v=='21'){
                $str = $str.' 学生';
            }else if($v=='22'){
                $str = $str.' 老师';
            }else if($v=='31'){
                $str = $str.' 管理员';
            }
        }

        return $str;

    }
    protected function callback_getAskName($ask_id){
        $name=M('user')->where(array(
            'id'=>$ask_id
        ))->getField('user_no');
        return $name;
    }
    protected function get_category($id){

        $id_arr = M('question_category')->where(array(
            'incharge_id' => $id
        ))->getField('id',true);

        if(!$id_arr) return '0';

        $id_str = implode(',', $id_arr);

        return $id_str;
    }
    public function detail($pk) {

        $detail = $this->where ( array (
            'id' => $pk
        ) )->find();
        $ask_name = M('user')->where(array('id'=>$detail['ask_id']))->getField('user_no');
        $ans_name = M('user')->where(array('id'=>$detail['ans_id']))->getField('name');
        $atime = $detail['ans_time'];
        if($atime){
            $atime = date("Y-m-d H:i:s",$detail['create_time']);
        }else{
            $atime = '还未回答';
        }
        $answer =  $detail['answer'];
        if (!$answer) $answer = "还未回复";
        return array (
            'table'=>array(
                'name'=>array(
                    'title'=>'提问信息',
                    'icon' =>'fa-list-alt',
                    'style'=>'blue',
                    // 	 							'cols'=>'0,12',
                    'value'=>array(
                        '提问用户:'=> $ask_name,
                        '问题标题:' => $detail['title'],
                        '问题详情:'=>$detail['content'],
                        '问题标签'=>$detail['tag'],
                        '提问时间:'=>date("Y-m-d H:i:s",$detail['create_time']),

                    )
                ),
                'base1'=>array(
                    'title' => '回复信息',
                    'icon' => 'fa-list-alt',
                    'style' => 'green',
                    'value' => array (
                        '问题负责人:'=>$ans_name,
                        '回复时间:'=>$atime,
                    )
                ),
                'base2'=>array(
                    'title' => '问题回复',
                    'icon' => 'fa-list-alt',
                    'style' => 'green',
                    'cols' => '0,12',
                    'value' => array (
                        '' => $answer
                    )
                ),

            ),

        );

    }

    public function _after_update($data,$options){
        $this->setAlert( $data['id'] );
    }

    /**
     * 系统通知接口
     * @param string $category 提醒的类别，不超过6个字，简要分类
     * @param string $message 提醒内容 不要超过50个字
     * @param string $icon 图标 label-***,fa-***  e.g. label-success,fa-user 逗号分隔两个样式，前面的样式为颜色，后面的样式为图标
     * @param string $url 系统链接 U方法参数形式 e.g. Student/all
     * @param array|stringIds $toUsers 提醒接受者userId数组或逗号分隔的字符串
     * @param string $context 提醒上下文，用于提醒的撤销使用 e.g. auditStudent_121 推荐把提醒类型和相关主键拼成一个字符串传入
     * @return boolean
     */
    public function setAlert($id){

        $user_id = M('questions')->where(array(
            'id' => $id,
            'status' => array('eq',1)
        ))->getField('ask_id');

        if(!$user_id) return false;

        $toUsers=','.$user_id.',';

        $category='教师回答';
        $message=session('userName').'于'.date('Y-m-d H:i:s').'回答了你的问题,请及时查看！';
        $icon='label-success,fa-user';
        $url='QuestionCategory/QuestionsTeacher/all';
        $context = $id;
        $ha=new HyAlertModel();
        $ha->sysAlert($category,$message,$icon,$url,$toUsers,$context);
        //dump($activity_id);
        return $ha;
    }

}
