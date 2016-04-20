<?php

namespace GoodCourse\Model;

use Common\Model\HyAllModel;

/**
 * 精品课程管理模型-教工角色-查看课程
 *
 * @author
 *
 */
class CourseViewModel extends HyAllModel {
	
	/**
	 * @overrides
	 */
	protected function initTableName() {
		return 'good_course';
	}
	
	/**
	 * @overrides
	 */
	protected function initInfoOptions() {
		return array (
				'title' => '课程列表',
				'subtitle' => '查看所有精品课程信息' 
		);
	}
	/**
	 * @overrides
	 */
	protected function initSqlOptions() {
		return array (
				'associate' => array (
						'teacher|incharge_id|user_id|user_id||left',
						'user|teacher.user_id|id|name AS incharge_name||left',
				),
				'where' => array (
					   'status' => array ('eq',1),
                )
		);
	}
	/**
	 * @overrides
	 */
	protected function initPageOptions() {
		return array (
				'checkbox' => true,
				'deltype' => 'status|9',
				'actions' => array (),
				'buttons' => array (),
                'initJS' => array(
                    'UEditor'=>json_encode(
                        array(
                            'fullscreen', 'source', '|', 'undo', 'redo', '|',
                            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                            'directionalityltr', 'directionalityrtl', 'indent', '|',
                            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                            'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
                            'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                            'print', 'preview', 'searchreplace', 'help', 'drafts'
                        )
                    ),
                    'Course'
                ),
            'formSize'=>'full'
		);
	}
	/**
	 * @overrides
	 */
	protected function initFieldsOptions() {
		return array (
				'id' => array (
						'title' => '课程名称',
						'list' => array (
								'callback' => array (
										'tplReplace',
										'{callback}' => array (
												'getName' 
										),
										C ( 'TPL_DETAIL_BTN' ),
										'{#}' 
								),
								'search' => array (
										'type' => 'select' 
								) 
						) 
				),
				'name' => array (
						'title' => '课程名称',
						'list' => array (
								'hidden' => true 
						),
						'form' => array (
								'type' => 'text',
								'validate' => array (
										'required' => true 
								) 
						) 
				),
                'description'=>array(
                    'title'=>'课程描述',
                    'list'=>array(

                    ),
                ),
				'lecturer_ids' => array (
						'title' => '主讲老师',
						'list' => array (),
				),
				'incharge_id' => array (
						'title' => '课程负责人',
						'list' => array (
								'callback' => array (
										'value',
										'{:incharge_name}' 
								),
								'search' => array (
										'type' => 'select' 
								) 
						),
						
				),
                'create_time' => array (
                    'list'=>array(
                        'title'=>'发布时间',
                        'callback'=>array('dataTotime')
                    ),
                ),
				'is_publish' => array (
						'title' => '审核结果',
						'list' => array (
								'width' => '30' 
						) 
				)
		);
	}
    protected  function callback_dataTotime($time){
        return to_time($time);
    }
	protected function getOptions_id() {
		return $this->where ( array (
				'status' => 1 
		) )->getField ( 'id,name' );
	}
	protected function getOptions_incharge_id() {
		$teacher_id_arr = M ( 'teacher' )->getField ( 'user_id', true );
		$teacher_id_arr = implode ( ",", $teacher_id_arr );
		$user_id = M ( 'user' )->where ( array (
				'id' => array ('IN',$teacher_id_arr )
		) )->getField ( 'id,name' );
		return $user_id;
	}

}
											
				
					    					
