<?php
namespace Home\Controller;
use Home\Model\GoodCourseModel;
use Home\Model\QuestionCategoryModel;
use Home\Model\QuestionsModel;
use System\Model\HyAlertModel;
use Think\Controller;
class QuestionController extends BaseController {
    protected $qc_mode;
    protected $gc_mode;
    protected $q_mode;

    public function askQuestion(){
        if(!ss_h_uid() || ss_h_uid() == '' ){
            $this->redirect('User/login');
        }
        $this->gc_mode = new GoodCourseModel();
        $this->qc_mode = new QuestionCategoryModel();

        $good_course_category = $this->gc_mode->get_good_course_category();
        $ques_category = $this->qc_mode->get_question_category();
        //dump($ques_category);
        //dump($good_course_category);
        $this->assign('good_course_category',$good_course_category);
        $this->assign('ques_category',$ques_category);

        $course = D('GoodCourse')->get_one_course(I('course_id'));

        $this->assign('course_id',I('course_id'));
        $this->assign('course_name',$course['name']);

    	$this->display();
    }
    public function questionList(){
    	$mq = D('Questions');

        $course_id = I('course_id') ? I('course_id') : false;
        $type = $course_id ? 1 : 0;

    	$page=D('details')->articlePage( $mq->getCount(null,$type,$course_id) , C('QUESTION_SHOW_NUM'));

        $all_question = D('Questions')->getQuestion(null,$type,$course_id);
        $this->assign('page',$page);
        $this->assign('all_question',$all_question);
        $this->assign('session_id',ss_h_uid());
        $this->assign('course_id',I('course_id'));
    	$this->display();
    }
    public function myQuestion(){
    	$mq = D('Questions');

        $course_id = I('course_id') ? I('course_id') : false;
        $type = $course_id ? 1 : 0;

        $my_question = $mq->getQuestion(ss_h_uid(),$type,$course_id);
       // dump($my_question);

        $page=D('details')->articlePage($mq->getCount(ss_h_uid(),$type,$course_id), C('QUESTION_SHOW_NUM'));
       	$this->assign('page',$page);
        $this->assign('course_id',I('course_id'));
        $this->assign('my_question',$my_question);

    	$this->display();
    }

    public function ajax_add_question(){
        $json['status'] = false;
        $json['info'] = '';
        $type_id = I('type_id');
        $ques_category_id = I('ques_category_id');
        $ques_course_category_id = I('ques_course_category_id');
        $category_id = $ques_category_id ? $ques_category_id : $ques_course_category_id;
        $is_open = I('is_open');
        $title = I('title');
        $content = (I('content'));

        //后台数据检查
        if($type_id==='' || $category_id ==='' || $is_open===''){
            $json['info'] = '数据非法！';
            $this->ajaxReturn($json);
        }
        if(strlen($title)>50 || strlen($title)<2 || strlen($content)>300 || strlen($content)<4 ){
            $json['info'] = '数据非法！';
            $this->ajaxReturn($json);
        }

        $result = D('Questions')->add_question($type_id,$category_id,$role_id = 21,$title,$content,$is_open);

        $result_alert = $this->setAlert($result,$type_id,$ques_category_id,$ques_course_category_id);//消息提醒

        if($result && $result_alert){
            $json['status'] = true;
            $json['info'] = '提交成功';
        }else{
            $json['info'] = '提交失败';
        }
        $this->ajaxReturn($json);
    }

    /**
     * 系统通知接口
     * @param string $category 提醒的类别，不超过6个字，简要分类
     * @param string $message 提醒内容 不要超过50个字
     * @param string $icon 图标 label-***,fa-***  e.g. label-success,fa-user 逗号分隔两个样式，前面的样式为颜色，后面的样式为图标
     * @param string $url 系统链接 U方法参数形式 e.g. Student/all
     * @param array|stringIds $toUsers 提醒接受者userId数组或逗号分隔的字符串
     * @param string $context 提醒上下文，用于提醒的撤销使用 e.g. auditStudent_121 推荐把提醒类型和相关主键拼成一个字符串传入
     * @return boolean
     */
    public function setAlert($id,$type_id,$ques_category_id,$ques_course_category_id){
        if(!$id) return false;
        if(!$type_id){
            $user_id = M('question_category')->where(array(
                'id' => $ques_category_id,
                'status' => array('eq',1)
            ))->getField('incharge_id');
        }else{
            $user_id = M('good_course')->where(array(
                'id' => $ques_course_category_id,
                'status' => array('eq',1)
            ))->getField('incharge_id');
        }

        if(!$user_id) return false;

        $toUsers=','.$user_id.',';

        $category='学生提问';
        $message=session('userId').'于'.date('Y-m-d H:i:s').'发起了提问,请及时回复！';
        $icon='label-success,fa-user';
        $url='QuestionCategory/QuestionsAnswer/all';
        $context = $id;
        $ha=new HyAlertModel();
        $ha->sysAlert($category,$message,$icon,$url,$toUsers,$context);
        //dump($activity_id);
        return $ha;
    }

}