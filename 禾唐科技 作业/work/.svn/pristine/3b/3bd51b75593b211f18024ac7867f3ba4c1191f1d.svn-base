<?php
namespace QuestionCategory\Model;
use Common\Model\HyAllModel;

/**
 *精品课程问题管理
 * 教工角色
 *
 * @author 
 */
class QuestionsGoodModel extends HyAllModel{
	
	
	/**
	 * @overrides
	 */
    protected function initTableName(){
        return 'questions';
    }
	protected function initInfoOptions() {
		return array (
				'title' => '精品课程问题',
				'subtitle' => array(

				)
		);
	}
	/**
	 * @overrides
	 */
    protected function initSqlOptions() {
		return array (
				'associate' => array (
						'good_course|category_id|id|name,incharge_id,lecturer_ids||left',
                        'user|ask_id|id|user_no as ask_id_text',
				),
				'where' => array (
						'status'=>array('lt',9),
						'type_id' => array('eq',1),
				)
		);
	}
    protected function initPageOptions() {
        return array (
            'checkbox'	=> true,
            'deleteType'=> 'status|9',
            'actions' 	=> array (),
            'buttons'	=> array(),
            'actions' 	=> array (
                'edit' => array (
                    'title' => '回答问题'
                ),
            ),
            'initJS'=>'QuestionXhj'
        );
    }
	protected function initFieldsOptions() {
		return array (
                    'type_id' => array (
                            'title' => '课程类型',
                            'list'=>array(
                                    'hidden' =>true,
                                    'width' => '30',
                                    'callback'=>array('value','{:name}'),

                            ),
                    ),
                    'category_id' => array (
                        'title' => '课程',
                        'list'=>array(
// 										'hidden' =>true,
                                'width' => '30',
                                'callback'=>array('value','{:name}'),
                                'search'=>array(
                                    'title'=>'课程',
                                    'type'=>'text',
                                    'query'=>'like',
                                    'sql'=>"good_course.name like '%{:category_id}%'"
                                )

                        )
                    ),
                    'title' => array (
                        'list'=>array(
                            'title' => '问题',
                            'callback'=>array('tplReplace',C('TPL_DETAIL_BTN')),
                        )
                    ),
                    'ask_id' => array (
                        'list' => array (
                            'title' => '提问用户',
                            'callback' => array('value','{:ask_id_text}'),

                        )
                    ),
                    'ans_id' => array (
                        'list' => array (
                            'title' => '回答用户',
                            'callback' => array('answer'),
                        ),
                        'form' =>array(
                            'fill' => array(
                                'edit' => array('fill_ans_id')
                            )
                        )
                    ),
                    'create_time'=>array(
                        'list'=>array(
                            'title'=>'提问时间',
                            'callback'=>array('dateToTime')
                        )
                    ),
                    'status'=>array(
                        'list'=>array(
                            'title'=>'状态',
                            'callback'=>array('status'),
                        )
                    ),
                    'is_publish'=>array(
                        'list' => array(
                            'title' => '问题状态',
                            'callback' => array('show_status'),
                        ),
                        'form'=>array(
                            'title'=>'是否公布',
                            'type'=>'select',
                            'options' => array(
                                '0' => '不公布',
                                '1' => '公布'
                            )
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
		);
	}


    protected function callback_dateToTime($time){
        return date('Y-m-d H:i',$time);
    }
    protected function callback_fill_ans_id(){
        return ss_uid();
    }

    protected function callback_answer($ans_id){
        if(!$ans_id) return '暂未答复';
        return M('user')->where(array('status'=>1,'id' =>$ans_id))->getField('name');
    }
    protected function callback_show_status($is_publish){

        if($is_publish == '1'){
            return '<p style="color:#2F8051">已审核已发布</p>';
        }else if($is_publish == '0'){
            return '<p style="color:#FFB41B">已审核未发布</p>';
        }else{
            return '<p style="color:#800D12">已提交未审核</p>';
        }
    }
    protected function getOptions_is_publish(){
        return array(
            '0'=>'不公布',
            '1'=>'公布'
        );
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
}