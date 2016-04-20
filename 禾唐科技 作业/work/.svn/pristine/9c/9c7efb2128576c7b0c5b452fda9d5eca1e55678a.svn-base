<?php
namespace QuestionCategory\Model;
use System\Model\HyAlertModel;

/**
 * 教工提问管理模型
 * 角色：教工
 * @author 
 */
class QuestionsTeacherModel extends QuestionsModel {
	
	
	/**
	 * @overrides
	 * 
	 */
	protected function initInfoOptions() {
		return array (
				'title' => '教工提问',
				'subtitle' =>'教工可于此进行提问'
		);
	}
	/**
	 * @overrides
	 */
	protected function initSqlOptions() {
		return array (
				'associate' => array (
						'question_category|category_id|id|name||left',
	
				),
				'where' => array (
						'status'=>array('eq',1),
						'type_id' => array('eq',0),
						'role_id' => array('eq',22),
                        'ask_id'=>array('eq',ss_uid()),
						
				)
		);
	}
	
	protected function initPageOptions() {
		return array (
				'checkbox'	=> true,
				'deleteType'=> 'status|9',
				'actions' 	=> array (),
				'buttons'	=> array(
                    'add' => array(
                            'title'=>'提问',
                            'icon'=>'fa-plus'
                    )
				),
// 				'initJS'=>'QuestionXhj'
		);
	}
	
	 protected function initFieldsOptions() {
	 	return array (
	 			'title' => array (
                    'title' => '问题标题',
                    'list' =>array(
                        'callback' => array('tplReplace',C('TPL_DETAIL_BTN')),
                    ),
                    'form' => array (
                            'type' => 'text',
                            'validate' => array (
                                    'required' => true,
                            ),
                    )
	 			),
	 			'type_id'=>array(
	 				'form'=>array(
	 						'fill'=>array(
	 							'add'=>array('value',0)
	 					)
	 				)
	 			),
	 			'category_id'=>array(
	 					'title'=>'问题分类',
	 					'list'=>array(
	 							'callback'=>array('getTypeName'),
                                'search'=>array(
                                    'type'=>'select',
                                    'select'=>array(
                                        'optgroup'=>true
                                    )
                                )
	 					),
		 				'form'=>array(
		 					'type'=>'select',
                            'select'=>array(
                                'optgroup'=>true
                            )
		 				)	
	 			),
	 			'role_id'=>array(
	 					'form'=>array(
		 					'fill'=>array(
		 							'add'=>array('value',22),
		 					),
	 						
	 				)
	 			),
	 			
	 			'content' => array (
	 					'form'=>array(
	 							'title'=>'问题详情',
	 							'type' => 'textarea',
	 							'validate' => array (
	 									'maxlength' => 255
	 							),
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
				'name' => array(
						'title' => '类别',
						'list' => array(
								'hidden' => true
						),
						
				),
				
				
				'ans_id' => array (
						'form'=>array(
							'fill'=>array(
									'add'=>array('getAnsId','{:category_id}','{#}')
							)
					)
				),
	 			'is_open' => array (
	 					'form' => array (
	 							'fill'=>array(
	 									'add'=>array('value',0)
	 							)
	 					)
	 			),
	 			'is_publish' =>array(
	 					'form' => array (
	 							'fill'=>array(
	 									'add'=>array('value',0)
	 							)
	 					)
	 					
	 			),
	 			'status'=> array (
	 					'title' => '状态',
	 					'list' => array (
	 							'hidden'=>true
	 					)
	 			),
	 			'create_time'=>array(			
	 					'form'=>array(
	 						'fill'=>array(
	 								'add'=>array('value',time())
	 								
	 						)
	 					)
	 			)
		);
	 }
	 protected function getOptions_id(){
	 	return M('question_category')->where(array(
	 			'pid'=>0
	 	))->getField('id,name');
	 }
     protected function getOptions_category_id(){
        $arr=M('question_category')->where(array('status'=>1))->getField('id,pid,name');
        foreach($arr as $k=>$v){
            if(!$v['pid']) {
                foreach($arr as $k1=>$v1){
                    if($v['id']==$v1['pid'])
                        $arr2[$v['name']][$k1]=$v1['name'];
                }
            }
        }
        return $arr2;
     }
	 protected function getOptions_ans_id(){
	 	
	 	$teacher_id_arr=M('teacher')->where(array(
				
		))->getField('user_id',true);
		
		$te_id_str =  implode(',', $teacher_id_arr);
		
		$te_id_str=rtrim($te_id_str,',');
		
		return M('user')->where(array(
				'id'=>array(IN,$te_id_str)
		))->getField('id,name');
	 }
	 protected function callback_getAnsId($category_id){
	 	return M('question_category')->where(array(
	 			'id'=>$category_id
	 	))->getField('incharge_id');
	 	
	 	
	 }
	 protected function callback_getcTime($create_time){
	 	$time = $create_time;
	 	if($time){
	 		return date("Y-m-d H:i:s",$time) ; 
	 	}else{
	 		return '';
	 	}
	 }
	 protected function callback_getaTime($ans_time){
	 	$time = $ans_time;
	 	if($time){
	 		return date("Y-m-d H:i:s",$time) ;
	 	}else{
	 		return '';
	 	}
	 }
	 protected function callback_ans_id($ans_id){
	 	return M('user')->where(array(
	 			'id'=>$ans_id
	 	))->getField('name');
	 }
	
	 protected function callback_getTypeName($category_id){
	 	return M('question_category')->where(array(
	 			'id'=>$category_id
	 	))->getField('name');
	 }
	 
	 protected function callback_getCharge($category_id){	 	
	 	return M('question_category')->where(array(
	 			'id'=>$category_id
	 	))->getField('incharge_id');
	 	
	 }
	 protected function callback_getAskName($ask_id){
	 	$name=M('user')->where(array(
	 			'id'=>$ask_id
	 	))->getField('name');
	 	return $name;
	 }
	 public function detail($pk) {
		
	 	$detail = $this->where ( array (
				'id' => $pk
		) )->find();
		$ask_name = M('user')->where(array('id'=>$detail['ask_id']))->getField('name');
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
    public function _after_insert($data,$options){

        $this->setAlert( $data['id'] , I('category_id') );

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
    public function setAlert($id,$category_id){

        $user_id = M('question_category')->where(array(
            'id' => $category_id,
            'status' => array('eq',1)
        ))->getField('incharge_id');

        if(!$user_id) return false;

        $toUsers=','.$user_id.',';

        $category='教师提问';
        $message=session('userName').'于'.date('Y-m-d H:i:s').'发起了提问,请及时回复！';
        $icon='label-success,fa-user';
        $url='QuestionCategory/QuestionsAnswer/all';
        $context = $id;
        $ha=new HyAlertModel();
        $ha->sysAlert($category,$message,$icon,$url,$toUsers,$context);
        //dump($activity_id);
        return $ha;
    }

}
