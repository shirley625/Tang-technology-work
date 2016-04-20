<?php
namespace BasisInfo\Model;
use Common\Model\HyAllModel;

/**
 * 文章分类管理模型
 *
 * @author 
 */
class LanguageModel extends HyAllModel {
	
	/**
	 * @overrides
	 */
	protected function initTableName(){
 		return 'language';
	}
	
	/**
	 * @overrides
	 */
	protected function initInfoOptions() {
		return array (
				'title' => '语言切换',
				'subtitle' => '管理语言信息',
				'pagetitle' => '语言管理'
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
                        'pid' => array('neq',0)
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
								'title'=>'新增语言',
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
                'pid' => array(
                    'list' => array(
                        'hidden' => true
                    ),
                    'form' => array (
                        'fill'=>array(
                            'both' => array('value',1)
                        )
                    )
                ),
				'language' => array(
						'title' => '语言',
						'list' => array(
							 
						),
						'form' => array (
								'type' => 'text',
								'validate' => array (
										'required' => true,
								),
								
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
}