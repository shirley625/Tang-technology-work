<?php
namespace International\Model;
use International\Model\InternationalModel;
use System\Model\HomkaiServiceModel;

/**
 * 留学生管理模型超级管理员角色
 *
 * @author
 */
class InternationalSModel extends InternationalModel {

	protected function initPageOptions() {
        return array_merge(parent::initFieldsOptions(),array (
				'checkbox'	=> true,
				'deleteType'=> 'status|9',
				'actions' 	=> array (
						'edit' => array (
								'title' => '编辑',
								'max' => 1
						),
						'delete' => array (
								'title' => '删除',
								// 是否需要确认
								'confirm' => true
						)
				),
				'buttons'	=> array(
						'add'=>array(
								'title'=>'新增',
								'icon'=>'fa-plus'
						)
				),
				'initJS'=>'InteQwf'
		));
	}
	/**
	 * @overrides
	 */
	protected function initFieldsOptions() {

        return array_merge(parent::initFieldsOptions(),array (
            'stu_id' => array (
                'title' => '姓名',
                'list'=>array(
                    'hidden'=>true
                ),
                'form' => array (
                    'type' => 'select',
                    'validate' => array (
                        'required' => true
                    ),
                    'tip' => '请先选择班级'
                ),
            ),
            'course_id' => array (
                'title' => '课程',
                'list'=>array(
                    'hidden'=>true
                ),
                'form' => array (
                    'type' => 'select',
                    'validate' => array (
                        'required' => true
                    ),
                )
            ),
            'year' => array (
                'title' => '学年',
                'list'=>array(
                ),
                'form' => array (
                    'type' => 'text',
                    'validate' => array (
                        'required' => true,
                        'regex'=>'^2\d{0,3}$'
                    ),
                    'tip' => '如:2013'
                )
            ),
            'term' => array (
                'title' => '学期',
                'list' => array (
                    'callback'=>array('value','{:term}'),
                    'search'=>array(
                        'title'=>'选定学期',
                        'type'=>'select',
                    )
                ),
                'form' => array (
                    'type' => 'select',
                    'validate' => array (
                        'required' => true,
                    )
                )
            )
		));
	}


	protected function getOptions_stu_id(){
		$arr = M('user')->where(array(
				'status'=>1
		))->getField('id,name');
		return $arr;
	}

	protected function getOptions_course_id(){
		return M('exam_course')->where(array(
				'status'=>1
		))->getField('id,name');
	}

	public function ajax_select_studentViaClass(&$json){
		$id=I('id');
		$idArr=M('student')->where(array(
				'class_id'=>$id,
				'status'=>1
		))->getField('user_id',true);
		$idStr = implode(',',$idArr);
		$data=$userIdArr=M('user')->where(array(
				'id' =>array(IN,$idStr)
		))->select();
        foreach($data as $k=>$v){
            $data[$k]['name_user_no'] = $v['name']."(".$v['user_no'].")";
        }
		if(!$data) return $json;
		$json['status'] = true;
		$json['data'] = md_arr_2_asc_arr($data,'id','name_user_no');
	}
}