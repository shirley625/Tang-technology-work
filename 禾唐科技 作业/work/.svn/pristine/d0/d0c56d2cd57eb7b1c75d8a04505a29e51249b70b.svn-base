<?php
namespace Home\Model;
use Think\Model;
class GoodCourseModel extends Model {

    public function get_good_course_category(){
        return $this->where(array(
            'status'=>array('eq',1),
            'is_publish' =>array('eq',1)
        ))->field('id,name')->select();
    }

/*    public function get_good_course(){
        $good_course = $this
            ->where(array('status' => array('eq',1),'is_publish' => array('eq',1)))
			->field('id,img,name,intro,description,img,incharge_id,lecturer_ids,hit,create_time,level')
			->select();

//        dump($good_course);
        foreach($good_course as $v){
            if(!$v['img']){
                $imgs = false;
            }
            else{
                $imgs[] = $v['img'];
            }
        }
        $imgInfo = M('frame_file')
            ->where(array('status'=>1,'id'=>array(IN,$imgs?$imgs:array(0))))
            ->field('savename,savepath')
            ->select();

//        dump($imgInfo);
        $good_course_arr = array();
        foreach($good_course as $k => $v ){
            $v['incharge_id'] = $this->id_to_username($v['incharge_id']);
            $v['lecturer_ids'] = $this->id_to_username($v['lecturer_ids']);
            $v['create_time'] = date('Y-m-d',$v['create_time']);
            foreach($imgInfo as $v1){
                $v['savepath']=$v1['savepath'];
                $v['savename']=$v1['savename'];
            }
            if(!$v['savepath'] || !$v['savename']){
                $v['img_url'] = 'goodcourse.png';
            }else{
                $v['img_url'] = $v['savepath'].$v['savename'];
            }
            $v['intro'] = $v['intro'];
            if($v['level'] == 'national'){
                $good_course_arr['national']['name'] = '国家级精品课程';
                $good_course_arr['national']['children'][] = $v;
            }else if($v['level'] == 'province'){
                $good_course_arr['province']['name'] = '省级精品课程';
                $good_course_arr['province']['children'][] = $v;
            }else{
                $good_course_arr['college']['name'] = '院级精品课程';
                $good_course_arr['college']['children'][] = $v;
            }
        }
//        dump($good_course_arr['college']);
        return $good_course_arr;
    }*/
    public function get_good_course(){
            $good_course = $this
                ->where(array('status' => array('eq',1),'is_publish' => array('eq',1)))
                ->field('id,img,name,intro,description,img,incharge_id,lecturer_ids,hit,create_time,level')
                ->select();

            foreach($good_course as $v){
                if(!$v['img']){
                    $imgs[] = 0;
                }
                else{
                    $imgs[] = $v['img'];
                }
            }
            $imgInfo = M('frame_file')
                ->where(array('status'=>1,'id'=>array(IN,$imgs)))
                ->field('savename,savepath')
                ->select();

            $good_course_arr = array();
            foreach($good_course as $k => $v ){
                $v['incharge_id'] = $this->id_to_username($v['incharge_id']);
                $v['lecturer_ids'] = $this->id_to_username($v['lecturer_ids']);
                $v['create_time'] = date('Y-m-d',$v['create_time']);
                foreach($imgInfo as $v1){
                    $v['savepath']=$v1['savepath'];
                    $v['savename']=$v1['savename'];
                }
                if(!$v['img']){
                    $v['img_url'] = 'goodcourse.png';
                }else{
                    $v['img_url'] = $v['savepath'].$v['savename'];
                }
                $v['intro'] = $v['intro'];
                if($v['level'] == 'national'){
                    $good_course_arr['national']['name'] = '国家级精品课程';
                    $good_course_arr['national']['children'][] = $v;
                }else if($v['level'] == 'province'){
                    $good_course_arr['province']['name'] = '省级精品课程';
                    $good_course_arr['province']['children'][] = $v;
                }else{
                    $good_course_arr['college']['name'] = '校级精品课程';
                    $good_course_arr['college']['children'][] = $v;
                }
            }
    //        dump($good_course_arr['college']);
            return $good_course_arr;
        }


    public function id_to_username($str){
        if(!$str) return false;
        $name_arr = M('user')->where(array(
            'id' => array(IN,$str)
        ))->getField('name',true);
        return implode(',',$name_arr);
    }

    public function get_one_course($id){
        if(!$id) return false;
        $this->where(array('id'=>$id))->setInc('hit');   //点击量 +1
        $course = $this->where(array(
            'id' => $id,
            'status' => 1,
            'is_public' => 1
        ))->find();
        $course['intro'] = htmlspecialchars_decode($course['intro']);
        $course['incharge_id'] = $this->id_to_username($course['incharge_id']);
        $course['lecturer_ids'] = $this->id_to_username($course['lecturer_ids']);
        $course['create_time'] = date('Y-m-d',$course['create_time']);
        $course['intro_audio'] = htmlspecialchars_decode($course['intro_audio']);
        $course['resources'] = htmlspecialchars_decode($course['resources']);
        return $course;
    }

    public function get_course_audio($course_id){     
         $audio=$this->where(array('id'=>$course_id))->getField('audio');    
         $audio_arr=M('frame_file')->where(array('id'=>$audio))->field('name,savepath,savename,ext')->find(); 
         return $audio_arr;

    }
     
       public function arrToStr($arr) {
        $str = '';
        foreach ( $arr as $key => $value ) {
            $str .= $value . ',';
        }
        $str = rtrim ( $str, "," );
        return $str;
    }
       public function get_contact($course_id){ 
        $teacher_id=$this->where(array('id'=>$course_id))->field('lecturer_ids')->find();   
        $teacher_id['lecturer_ids']= explode(",", $teacher_id['lecturer_ids']);     
        $cont=M('user')->where(array('id'=>array('IN', $teacher_id['lecturer_ids'])))->field('id,name,qq,email,phone')->select();
          
        foreach ($cont as $key => $v) {
           $v['phone']=val_decrypt($v['phone']);
           $arr[]=$v;
          
        }
         return $arr;   
       }
       public function contact($course_id){
         $teacher_id=$this->where(array('id'=>$course_id))->field('incharge_id')->find();   
         $contact=M('user')->where(array('id'=>$teacher_id['incharge_id']))->field('id,name,qq,email,phone')->find(); 
         $contact['phone']=val_decrypt($contact['phone']);
          return  $contact;
   }
        public function get_homework($course_id){
            $homework_id=$this->where(array('id'=>$course_id))->getField('homework');
            $homework=M('frame_file')->where(array('id'=>$homework_id))->field('name,savename,savepath')->find();     
            return $homework;
        }


}