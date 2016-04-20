<?php
namespace Goods\Model;
use Common\Model\HyAllModel;

/**
 * 商品分类管理模型
 *
 * @author ZSY
 */
class GoodsCategoryModel extends HyAllModel {
	
	/**
	 * @overrides
	 */
	
	protected function initTableName(){
		return 'category';
	}
	
	/**
	 * @overrides
	 */
	protected function initInfoOptions() {
		
		return array (
				'title' => '商品分类',
				'subtitle' => '管理商品分类详情'
		);
		
	}
	/**
	 * @overrides
	 */
	protected function initSqlOptions() {
		
		return array (
				
				'where' => array (
						'status'=>array('eq',1),
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
				'order'		=> 'rank desc',
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
				'name' => array (
						'title' => '商品分类',
						'list'=>array(
								'width' => '300',
								'search' => array (
										'type' => 'select',
								)
						),
						'form' => array (
								'type' => 'text',
						)
				),
				'rank' => array (
						'title' => '权重',
						'list'=>array(
								'search'=>array(
										'type' => 'text',
										'query'	=> 'gt'
								)
						),
						'form' => array (
								'type' => 'text',
						)
				),
				'status' => array (
						'title' => '状态',
						'list' => array (
								'width' => '50',
								'callback' => array('status')
						),
						'form' => array (
								'title'		=>	'状态',
								'type' => 'select',
						)
				)
		);
	}
	protected function getOptions_name() {
		return $this->getField('name,name as name1');
	}
	public function _after_insert($data, $options){
	
		//dump($data);
		$id=$data['id'];
		$time=time();
		$this->where(array('id'=>$id))->data(array('create_time'=>$time))->save();
	}
}