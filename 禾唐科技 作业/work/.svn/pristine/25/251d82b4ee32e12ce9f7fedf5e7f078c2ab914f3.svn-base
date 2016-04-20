<?php
namespace QuestionCategory\Model;
use Common\Model\HyAllModel;

/**
 * 职工交流管理模型
 * 角色：职工
 * @author 
 */
class QuestionsModel extends HyAllModel {
	
	/**
	 * @overrides 
	 */
	protected function initTableName(){
 		return 'questions';
	}
	
	/**
	 * @overrides
	 */
	protected function initInfoOptions() {
		return array (
				'title' => '职工交流记录',
				'subtitle' =>'所有教工的提问记录列表'
		);
	}
	/**
	 * @overrides
	 */
	protected function initSqlOptions() {

		return array (
				'associate' => array (
						'question_category|category_id|id|name as category_id_text||left',
                        'user|ask_id|id|name as ask_id_text',
				),
				'where' => array (
						'status'=>array('eq',1),
						'type_id' => array('eq',0),//互动问题
                        'role_id'=>array('eq',22),
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
				'actions' 	=> array (),
				'buttons'	=> array(),
				'initJS'=>'QuestionXhj'
		);
	}
	/**
	 * @overrides
	 */
	protected function initFieldsOptions() {
		return array (
				'category_id' => array (
                    'list'=>array(
                        'title' => '问题分类',
                        'callback'=>array('value','{:category_id_text}'),
                        'search'=>array(
                            'title'=>'问题分类',
                            'type'=>'select',
                            'select'=>array(
                                'optgroup'=>true
                            )
                        )
                    )
                ),

				'title' => array (
                    'list'=>array(
                        'title' => '问题',
                            'callback'=>array('tplReplace',C('TPL_DETAIL_BTN'))
                    )
				),

				'ask_id' => array (
                    'list' => array (
                        'title' => '提问用户',
                        'callback' => array('value','{:ask_id_text}')
                    )
				),

				'ans_id' => array (
                    'list' => array (
                        'title' => '回答用户',
                        'callback' => array('answer')
                    )

				),
                'create_time'=>array(
                    'list'=>array(
                        'title'=>'提问时间',
                        'callback'=>array('dateToTime')
                    )
                ),
				'question_status'=> array (
                    'list' => array (
                        'title' => '问题状态',
                        'callback' => array('show_status','{:ans_id}','{#}'),
                    )
				),
                'status'=>array(
                    'list'=>array(
                        'title'=>'状态',
                        'callback'=>array('status')
                    )
                ),

		);
	}
    protected function callback_dateToTime($time){
        return date('Y-m-d H:i',$time);
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

	protected function callback_answer($ans_id){
        if(!$ans_id) return '暂未答复';
		return M('user')->where(array('status'=>1,'id' =>$ans_id))->getField('name');
	}
	
	protected function callback_form_id(){
		$user_id = ss_uid();
		return M('user')->where(array('id'=>$user_id))->getField('name');
	}
	
	protected function callback_getName($id){
		return $this->where(array(
				'id'=>$id
		))->getField('type_id');
	}
	
	
	protected function ajax_answer(&$json){
		$id = act_decrypt($en = I('pk'));
		$GLOBALS['ajaxQuery'] = 'answer';
		$GLOBALS['ajaxPk'] = $id;
		if($id) $json['val'] = $this->edit($id);
		if($json['status'] = !!$json['val']){
			$json['token'] = token_builder($en);
		}
		$json['info'] = ($json['status'] ? '请求成功！' : ($this->getError() ?: '要请求的数据不可访问！'));
		if($json['status'] && $this->pageOptions['editFields'])
			$json['columns'] = $this->packColumns();
	}
	
	protected function callback_show_status($ans_id){
        if(!$ans_id){
            return '已提问待答复';
        }
        else if($ans_id){
            return '已答复';
        }
	}
    public function detail($pk){
        $where=array('status'=>1,'id'=>$pk);
        $arr=$this->where($where)->field('title,content,create_time,ans_time,ans_id,answer')->find(['hy'=>true]);
//        dump($arr);
       $answer= M('user')->where(array('status'=>1,'id'=>$arr['ans_id']))->getField('name');
        return array(
            'table'=>array(
                'ask_info'=>array(
                    'title'=>'提问信息',
                    'icon'=>'fa-list-ul',
                    'style'=>'blue',
                    'value'=>array(
                        '问题标题:' => $arr['title'],
                        '问题分类'=>$arr['category_id_text'],
                        '问题详情:'=>$arr['content'],
                        '提问用户:'=> $arr['ask_id_text'],
                        '问题标签'=>$arr['tag'],
                        '提问时间:'=>date("Y-m-d H:i",$arr['create_time'])
                    )
                ),
                'ans_info'=>array(
                    'title'=>'答复信息',
                    'icon'=>'fa-compress',
                    'style'=>'green',
                    'value'=>array(
                        '答复人:' => $answer,
                        '答复时间'=>date("Y-m-d H:i",$arr['ans_time'])
                    )
                ),
                'ans_content'=>array(
                    'title'=>'答复内容',
                    'icon'=>' fa-check-square-o',
                    'style'=>'purple',
                    'cols'=>'0,12',
                    'value'=>array(
                        ''=>$arr['answer']
                    )
                )
            )
        );
    }
}




