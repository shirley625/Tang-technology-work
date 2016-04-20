<?php
namespace BasisInfo\Model;
use Common\Model\HyAllModel;

/**
 *
 *
 * @author 
 */
class CourseModel extends HyAllModel {
	
	/**
	 * @overrides
	 */
	protected function initTableName(){
 		return 'exam_course';
	}
	
	/**
	 * @overrides
	 */
	protected function initInfoOptions() {
		return array (
				'title' => '课程基本信息',
				'subtitle' => '管理所有课程信息',
				'pagetitle' => '课程信息'
		);
	}
	/**
	 * @overrides
	 */
	protected function initSqlOptions() {
		return array (
				'associate' => array (
					 
				),
				'where' => array (
						'status'=>array('lt',9),
				)
		);
	}
	/**
	 * @overrides
	 */
	protected function initPageOptions() {
		return array (
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
								'title'=>'新增课程',
								'icon'=>'fa-plus'
						)
				)
		);
	}
	/**
	 * @overrides
	 */
	protected function initFieldsOptions() {
		return array (
				 
				'name' => array(
						'title' => '课程名',
						'list' => array(
								'search' => array (
										'type'=>'text',
										'query' => 'like',
								)
						),
						'form' => array (
								'type' => 'text',
								'validate' => array (
										'required' => true,
                                        'minlength' => 2,
                                        'maxlength' => 50
								),
								'tip'=>'输入名称'
						)
				),
				'credit' => array (
						'title' => '学分',
						'list'=>array(
						 ),
						'form' => array (
								'type' => 'text',
								'validate' => array (
										'required' => true,
                                        'number' => true
								),
                                'tip'=>'输入课程学分'
						)
				),
				'status' => array (
						'title' => '状态',
						'list' => array (
								'width' => '30',
								'callback' => array('status')
						),
						'form' => array (
								'type' => 'select',
						)
				)
		);
	}
	protected function getOptions_name(){
		return $this->where(array(
				'status'=>1
		))->getField('id,name');
	}
}