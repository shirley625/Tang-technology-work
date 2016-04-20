<?php
namespace Home\Model;
use Think\Model;
class QuestionCategoryModel extends Model {

    public function get_question_category(){

        $navs = $this->where(array(
                    'status'=>array('eq',1)
                ))->order('rank desc')->field('pid,id,name')->select();

        $arr = array();
        foreach($navs as $k => $v){
            if( !$v['pid'] ){
                $children = array();
                foreach( $navs as $n ){
                    if( $v['id'] == $n['pid'] ){
                        $children[] = $n;
                    }
                }
                $v['children'] = $children;
                $arr[] = $v;
            }
        }
        return $arr;
    }
}