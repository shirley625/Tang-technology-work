<?php
namespace BasisInfo\Model;
use Common\Model\HyAllModel;

/**
 *
 *
 * @author 
 */
class ClassModel extends HyAllModel {
	
	/**
	 * @overrides
	 */
	protected function initTableName(){
 		return 'class';
	}
	
	/**
	 * @overrides
	 */
	protected function initInfoOptions() {
		return array (
				'title' => '班级基本信息',
				'subtitle' => '管理所有班级信息',
				'pagetitle' => '班级信息'
		);
	}
	/**
	 * @overrides
	 */
	protected function initSqlOptions() {
		return array (
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
				),
                'tips'=>array(
                    'add'=>'请按格式填写年份!',
                    'edit'=>'请按格式填写年份!'
                )
		);
	}
	/**
	 * @overrides
	 */
	protected function initFieldsOptions() {
		return array (
				'name' => array(
						'title' => '班级名称',
						'list' => array(
                            'callback'=>array('tplReplace',C('TPL_DETAIL_BTN')),
								'search' => array (
										'type'=>'text',
										'query' => 'like'
								)
						),
						'form' => array (
								'type' => 'text',
                                'validate' => array (
                                    'required' => true,
                                ),
                                'tip'=>'录入年级和班级，示例：13级国际教育1班'
						)
				),
				'grade' => array (
						'title' => '入学年份(级)',
						'list'=>array(
						),
						'form' => array (
							'type' => 'text',
                            'validate' => array (
                                'required' => true,
                                'regex'=>'^2\d{3}$'
                            ),
                            'tip'=>'例如：2013'
						)
				),
				'graduate' => array (
						'title' => '毕业年份',
						'list'=>array(

						),
						'form' => array (
								'type' => 'text',
                                'validate' => array (
                                    'required' => true,
                                    'regex'=>'^2\d{3}$'
                                ),
                             'tip'=>'例如：2017'
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

    public function detail($pk){
        $where=array($this->getPk()=>$pk);
        $arr = $this->where($where)->find();
        $total = M('student')->where(array(
            'class_id'=>$pk,
            'status' => 1
        ))->count();

        return array('table'=>array(
            'base'=>array(
                'title'=>'班级信息',
                'icon'=>'fa-users',
                'style'=>'green',
                'value'=>array(
                    '名称：'=>$arr['name'],
                    '年级 ：'=>$arr['grade'],
                    '毕业年份：'=>$arr['graduate'],
                    '备注：'=>$arr['remark'],
                )
            ),
            'student'=>array(
                'title'=>'学生信息',
                'icon'=>'fa-pencil',
                'style'=>'purple-plum',
                'value'=>array(
                    '总人数：'=>$total.'人',
                )
            )
        ));
    }
}