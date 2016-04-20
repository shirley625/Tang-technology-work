<?php
namespace BasisInfo\Model;
use Common\Model\HyAllModel;

/**
 * 文章分类管理模型
 *
 * @author 
 */
class DepartmentModel extends HyAllModel {
	
	/**
	 * @overrides
	 */
	protected function initTableName(){
 		return 'department';
	}
	
	/**
	 * @overrides
	 */
	protected function initInfoOptions() {
		return array (
				'title' => '部门基本信息',
				'subtitle' => '管理所有部门信息',
				'pagetitle' => '部门信息'
		);
	}
	/**
	 * @overrides
	 */
	protected function initSqlOptions() {
		return array (
				'associate' => array (
// 						'user|user_id|id|name AS teacher_name,sex,qq,email||left'
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
								'title'=>'新增',
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
						'title' => '部门名称',
						'list' => array(
								
								),
						'form' => array (
								'type' => 'textarea',
								'validate' => array (
										'required' => true,
										'minlength' => 2 ,
										'maxlength' => 15
								),
								'tip'=>'输入2-15长度名称'
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
 
	
	protected function callback_getName($id){
		return $this->where(array(
				'id'=>$id
		))->getField('id');
	}
}