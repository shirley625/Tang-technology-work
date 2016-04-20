<?php
namespace Home\Model;
use Think\Model;
class QuestionsModel extends Model {

    //学生前台提问添加到数据表
    public function add_question($type_id,$category_id,$role_id = 21,$title,$content,$is_open){

        $data['type_id'] = $type_id;
        $data['category_id'] = $category_id;
        $data['role_id'] = 21;
        $data['title'] = $title;
        $data['content'] = $content;
        $data['ask_id'] = ss_h_uid();  //登录人的 id
        $data['is_open'] = $is_open;
        $data['create_time'] = time();
        $data['status'] = 1;
        $result = $this->data($data)
            ->field('type_id,category_id,role_id,title,content,ask_id,is_open,create_time,status')->add();
        return $result;
    }

    //防止恶意提交
    public function add_check($type_id,$category_id,$role_id = 21,$title,$content,$is_open,$tag){

    }


    //获得问题(自己，全部公开的)
    //参数：user_id type course_id
    public function getQuestion($user_id,$type,$course_id){

        if($user_id){
            $myQuestion = $this
                ->where(array(
                    'ask_id'=>array('eq',$user_id),
                    'status'=>array('lt',9),
                    'role_id' => 21,
                    'type' => $type ? $type :array('gt',0),
                    'category_id' => $course_id ? $course_id :array('gt',0)
                ))->order('create_time desc')
                ->page($_GET['p'],C('QUESTION_SHOW_NUM'))
                ->select();
        }else {
            $myQuestion = $this
                ->where(array(
                    'status' => array('lt', 9),
                    'role_id' => 21,
                    'is_open' => array('eq', 1),
                    'is_publish' => array('eq', 1),
                    'type' => $type ? $type :array('gt',0),
                    'category_id' => $course_id ? $course_id :array('gt',0)
                ))->order('create_time desc')
                ->page($_GET['p'], C('QUESTION_SHOW_NUM'))
                ->select();
        }
        $arr=array();
        foreach ($myQuestion as $k=>$v){
            $ask = $v['title'];
            $is_open = $v['is_open'];
            $publish = $v['is_publish'];
            $answer = $v['answer'];
            if ($ask&&(!$answer)){
                $status = "已提问，等待回答";
            }else if($ask&&$answer&&(!$is_open)){
                $status = "已回答，该回答不会公布";
            }else if($ask&&$answer&&$is_open&&($publish==null)){
                $status = "已回答，等待该回答公布";
            }else if($ask&&$answer&&$is_open&&$publish){
                $status = "该回答已发布";
            }else if($ask&&$answer&&$is_open&&(!$publish)){
                $status = "已回答，回答用户不予公布";
            };
            $tag_str = $v['tag'];
            $tag_arr =  explode(',', $tag_str);
            $children=array();
            foreach ($tag_arr as $k=>$n){
                $children[]['tag']=$n;
            }
            $v['children']=$children;
            $v['statusText'] = $status;
          //  dump($status);
            $arr[]=$v;
        }
        foreach($arr as &$v){
            if(0==$v['is_open']) $v['is_open'] = '不公开';
            else $v['is_open'] = '公开';
            $v['create_str_time'] = date('Y-m-d',$v['create_time']);
            $v['content'] = "<div class='content'>".($v['content'])."</div>";
            $v['ask_id'] = M('user')->where(array('id'=>$v['ask_id']))->getField('user_no');
        }
        // dump($arr);
        return $arr;
    }


    public function getCount($user_id,$type,$course_id){
        if($user_id){
            return	$this->where(array(
                'status'=>array('lt',9),
                'ask_id'=>array('eq',$user_id),
                'role_id' => 21,
                'type' => $type ? $type :array('gt',0),
                'category_id' => $course_id ? $course_id :array('gt',0)
            ))->count();
        }else{
            return	$this->where(array(
                'status'=>array('lt',9),
                'role_id' => 21,
                'is_open'=>array('eq',1),
                'is_publish'=>array('eq',1),
                'type' => $type ? $type :array('gt',0),
                'category_id' => $course_id ? $course_id :array('gt',0)
            ))->count();
        }
    }
}

