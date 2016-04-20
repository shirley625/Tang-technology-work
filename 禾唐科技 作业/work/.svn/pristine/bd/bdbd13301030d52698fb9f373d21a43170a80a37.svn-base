<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends BaseModel {

    public function get_article_category(){
//        dump(ss_lanid());
        $navs = $this->where(array(
            'status'=>array('eq',1),
            'nav_show' => array('eq',0),
            'switch' =>array('eq',1),
            'language_id'=>array('eq',ss_lanid())
        ))->order('rank desc')->field('pid,id,name,language_id')->select();

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
    /* Carmen */
    public function getSubNav(){
        return $this->where(array('status'=>1,'switch'=>1,'nav_show'=>1,'language_id'=>ss_lanid()))->order('rank desc')->limit(5)
               ->select();
    }

}