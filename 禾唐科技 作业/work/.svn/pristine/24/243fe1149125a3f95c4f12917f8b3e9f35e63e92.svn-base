<?php
namespace Home\Controller;
use Home\Controller\BaseController;
use Think\Controller;
class GoodCourseController extends BaseController{
  public function _initialize(){
    parent::_initialize();
  }
  protected function common(){
        $course_id = I('course_id');
        //dump($course_id);
        if(!$course_id) $this->error('no');
        //dump($course_id);
        $one_course = D('GoodCourse')->get_one_course($course_id);
        return $one_course;
  }
  public function course(){
          $good_course_category = D('GoodCourse')->get_good_course();
          $this->assign('good_course',$good_course_category);
//          dump($good_course_category['college']);
          $this->display();
      }
      public function lesson(){
        $this->assign('one_course',$this->common());
        $this->display();
      }
    public function contact(){
        $course_id = I('course_id');
        if(!$course_id) $this->error('no');

        $one_course=D('GoodCourse')->get_one_course($course_id);
       // dump($one_course);
        $this->assign('one_course',$one_course);
        $this->display();
    }
      public function teachers(){
          $course_id = I('course_id');
          //dump($course_id);
         // if(!$course_id) $this->error('no');
          $one_course = D('GoodCourse')->get_one_course($course_id);
          $incharge_name = $one_course['incharge_id'];
          
          $lecturer_ids_arr = explode(',',$one_course['lecturer_ids']);
          $count = count($lecturer_ids_arr);
  //        dump($lecturer_ids_arr);
  //        dump($count);
  //        dump($incharge_name);

          //$course_id = $one_course['id'];
          $this->assign('lecturer_ids_arr',$lecturer_ids_arr)
              ->assign('count',$count)
              ->assign('course_name',$one_course['name'])
              ->assign('incharge_name',$incharge_name)
              ->assign('one_course',$one_course);
          $this->display();
      }
    /**
     *
     */
    public function homework(){
        $course_id = I('course_id');
        if(!$course_id) $this->error('no');
        $one_course = D('GoodCourse')->get_one_course($course_id);
        $homeWork=D('GoodCourse')->get_homework($course_id);
        $this->assign('one_course',$one_course)->assign('homeWork',$homeWork);
        $this->display();
     }
    public function vedio(){
      $course_id = I('course_id');
      if(!$course_id) $this->error('no');
      $one_course = D('GoodCourse')->get_one_course($course_id); 
      $this->assign('one_course',$one_course);
      $this->display('vedio');
      $this->display('audio');
      }
    public function audio(){
      $course_id = I('course_id');
      if(!$course_id) $this->error('no');
      $one_course = D('GoodCourse')->get_one_course($course_id);
      $audio = D('GoodCourse')->get_course_audio($course_id);   
      $this->assign('one_course',$one_course)->assign('audio',$audio);     
      $this->display();
     }
  
    public function resources(){
         $this->assign('one_course',$this->common());
        $this->display();
    }
  


    /*张领*/
     public function syllabus(){

         // dump($one_course);
        $this->assign('one_course',$this->common());
        $this->display();
    }   
    public function calendar(){
       // dump($this->common());
          $this->assign('one_course',$this->common());
        $this->display();
    } 
    public function video_watch(){
             $this->assign('one_course',$this->common());
        $this->display();
        
    }
    public function courseware(){
        $course_id = I('course_id');
        //dump($course_id);
        if(!$course_id) $this->error('no');
        //dump($course_id);
        $one_course = D('GoodCourse')->get_one_course($course_id);
        // dump($one_course);
        $m=M('frame_file');
        $file['id']=$one_course['courseware'];      
        $a=$m->where($file)->select();
//        dump($a);
//        dump($one_course);
//        $this->assign('a',$a);
        $this->assign('one_course',$one_course);
        $this->display();
    }


}

?>
